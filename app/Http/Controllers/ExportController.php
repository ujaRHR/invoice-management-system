<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Invoice;
use App\Models\Service;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\Storage;

class ExportController extends Controller
{
    public function export(Request $request)
    {
        $customer_id = $request->header('id');
        $type = $request->input('data_type');

        return match ($type) {
            'clients' => $this->exportClients($customer_id),
            'invoices' => $this->exportInvoices($customer_id),
            'services' => $this->exportServices($customer_id),
            default => (
                response()->json(['error' => 'Invalid export type'], 400)
            )
        };
    }

    private function exportClients($customer_id)
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Clients');

        $sheet->fromArray(['ID', 'Full Name', 'Email', 'Company', 'Country'], null, 'A1');

        $clients = Client::where('cust_id', $customer_id)
            ->select('id', 'fullname', 'email', 'company', 'country')
            ->get();

        $row = 2;

        foreach ($clients as $client) {
            $sheet->setCellValue("A{$row}", $client->id);
            $sheet->setCellValue("B{$row}", $client->fullname);
            $sheet->setCellValue("C{$row}", $client->email);
            $sheet->setCellValue("C{$row}", $client->company);
            $sheet->setCellValue("C{$row}", $client->country);
            $row++;
        }

        return $this->downloadSheet($spreadsheet, 'clients.xlsx');
    }

    private function exportInvoices($customer_id)
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Invoices');

        $sheet->fromArray(['ID', 'Client ID', 'Amount', 'Status'], null, 'A1');

        $invoices = Invoice::all();
        $row = 2;

        foreach ($invoices as $invoice) {
            $sheet->setCellValue("A{$row}", $invoice->id);
            $sheet->setCellValue("B{$row}", $invoice->client_id);
            $sheet->setCellValue("C{$row}", $invoice->amount);
            $sheet->setCellValue("D{$row}", $invoice->status);
            $row++;
        }

        return $this->downloadSheet($spreadsheet, 'invoices.xlsx');
    }

    private function exportServices($customer_id)
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Services');

        $sheet->fromArray(['ID', 'Name', 'Price'], null, 'A1');

        $services = Service::all();
        $row = 2;

        foreach ($services as $service) {
            $sheet->setCellValue("A{$row}", $service->id);
            $sheet->setCellValue("B{$row}", $service->name);
            $sheet->setCellValue("C{$row}", $service->price);
            $row++;
        }

        return $this->downloadSheet($spreadsheet, 'services.xlsx');
    }

    private function downloadSheet($spreadsheet, $filename)
    {
        $writer = new Xlsx($spreadsheet);

        $temp_file = tempnam(sys_get_temp_dir(), 'export_');

        $writer->save($temp_file);

        return response()->download($temp_file, $filename)->deleteFileAfterSend(true);
    }
}
