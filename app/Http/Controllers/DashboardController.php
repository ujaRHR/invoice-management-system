<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\PaymentMethod;
use App\Models\Service;
use Exception;

class DashboardController extends Controller
{
    public function dashboardPage(Request $request)
    {
        $customer_id = $request->header('id');

        try {
            $customer = Customer::where('id', $customer_id)->first();
            return view('pages.dashboard', ['customer' => $customer]);
        } catch (Exception $e) {
            return view('pages.404');
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
}
