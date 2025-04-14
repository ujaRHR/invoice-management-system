<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\PaymentMethod;
use App\Models\Service;
use Exception;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboardPage(Request $request)
    {
        $customer_id = $request->header('id');

        try {
            $customer = Customer::where('id', $customer_id)
                ->with('profile')
                ->first();

            $total_paid_invoices = Invoice::where('cust_id', $customer_id)
                ->where('status', 'paid')
                ->whereMonth('updated_at', now()->month)
                ->whereYear('updated_at', now()->year)
                ->sum('total_amount');

            $top_services = Invoice::select('services.service_name', DB::raw('SUM(invoices.total_amount) as total_amount'))
                ->join('services', 'invoices.service_id', '=', 'services.id')
                ->where('status', 'paid')
                ->groupBy('services.id', 'services.service_name')
                ->orderByDesc('total_amount')
                ->limit(5)
                ->get();

            $top_clients = Invoice::select('clients.fullname', 'clients.email', DB::raw('SUM(invoices.total_amount) as total_amount'))
                ->join('clients', 'invoices.client_id', '=', 'clients.id')
                ->groupBy('clients.id', 'clients.fullname')
                ->where('status', 'paid')
                ->orderByDesc('total_amount')
                ->limit(5)
                ->get();

            $clients = Client::where('cust_id', $customer_id)->count();

            return view('pages.dashboard', [
                'customer' => $customer,
                'total_paid_invoices' => $total_paid_invoices,
                'top_services' => $top_services,
                'top_clients' => $top_clients,
                'clients' => $clients
            ]);
        } catch (Exception $e) {
            return view('pages.404');
            // return response()->json([
            //     'error' => $e->getMessage()
            // ]);
        }
    }

    public function clientPage(Request $request)
    {
        $customer_id = $request->header('id');

        try {
            $customer = Customer::where('id', $customer_id)->first();
            $clients = Client::where('cust_id', $customer_id)->get();
            return view('pages.clients', ['customer' => $customer, 'clients' => $clients]);
        } catch (Exception $e) {
            return view('pages.clients');
        }
    }

    public function servicePage(Request $request)
    {
        $customer_id = $request->header('id');

        try {
            $customer = Customer::where('id', $customer_id)->first();
            $services = Service::where('cust_id', $customer_id)->get();
            return view('pages.services', ['customer' => $customer, 'services' => $services]);
        } catch (Exception $e) {
            return view('pages.services');
        }
    }

    public function paymentMethodsPage(Request $request)
    {
        $customer_id = $request->header('id');

        try {
            $customer = Customer::where('id', $customer_id)->first();
            $methods = PaymentMethod::where('cust_id', $customer_id)->get();
            return view('pages.payment-methods', ['customer' => $customer, 'methods' => $methods]);
        } catch (Exception $e) {
            return view('pages.payment-methods');
        }
    }

    public function invoicePage(Request $request)
    {
        $customer_id = $request->header('id');
        try {
            $customer = Customer::where('id', $customer_id)->first();
            $invoices = Invoice::where('cust_id', $customer_id)->get();
            return view('pages.invoices.invoices', ['customer' => $customer, 'invoices' => $invoices]);
        } catch (Exception $e) {
            return view('pages.invoices.invoices');
        }
    }

    public function createInvoicePage(Request $request)
    {
        $customer_id = $request->header('id');
        try {
            $customer = Customer::where('id', $customer_id)->first();
            return view('pages.invoices.create-invoice', ['customer' => $customer]);
        } catch (Exception $e) {
            return view('pages.invoices.create-invoice');
        }
    }

    public function editInvoicePage(Request $request, $invoice_number)
    {
        $customer_id = $request->header('id');
        try {
            $customer = Customer::where('id', $customer_id)->first();
            $invoice = Invoice::where('cust_id', $customer_id)
                ->where('invoice_number', $invoice_number)
                ->with([
                    'customer' => function ($query) {
                        $query->select('id', 'fullname');
                    },
                    'client' => function ($query) {
                        $query->select('id', 'fullname', 'email', 'company', 'country');
                    },
                    'service' => function ($query) {
                        $query->select('id', 'service_name');
                    },
                    'paymentMethod' => function ($query) {
                        $query->select('id', 'method_type', 'provider', 'account_details');
                    }
                ])->first();

            return view('pages.invoices.edit-invoice', ['customer' => $customer, 'invoice' => $invoice]);
        } catch (Exception $e) {
            return view('pages.invoices.edit-invoice');
        }
    }

    public function customerProfile(Request $request)
    {
        $customer_id = $request->header('id');

        try {
            $customer = Customer::where('id', $customer_id)->first();

            return view('pages.profile.profile', [
                'customer' => $customer,
            ]);
        } catch (Exception $e) {
            return view('pages.404');
            // return response()->json([
            //     'error' => $e->getMessage()
            // ]);
        }
    }
}
