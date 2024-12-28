<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use Exception;

class InvoiceController extends Controller
{
    public function createInvoice(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'cust_id' => 'required|integer',
                'client_id' => 'required|integer',
                'invoice_number' => 'required|integer',
                'service_id' => 'required|integer',
                'quantity' => 'required|integer',
                'unit_price' => 'required|numeric',
                'issue_date' => 'required|string:max:255',
                'due_date' => 'required|string|max:255',
                'amount' => 'required|numeric',
                'tax' => 'required|numeric',
                'total_amount' => 'required|numeric',
                'status' => 'required|string',
                'payment_method' => 'required|integer',
                'notes' => 'nullable|string|max:255'
            ]);

            $created = Invoice::create($validatedData);

            if ($created) {
                return response()->json([
                    'success' => true,
                    'message' => 'invoice created successfully',
                ], 201);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'failed to create the invoice',
                ], 404);
            }
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'something went wrong'
            ], 400);
        }
    }

    public function updateInvoice(Request $request)
    {
        $invoice_number = $request->input('invoice_number');
        $status = $request->input('status');

        try {
            $updated = Invoice::where('invoice_number', $invoice_number)->update([
                'status' => $status
            ]);
            if ($updated) {
                return response()->json([
                    'success' => true,
                    'message' => 'invoice updated successfully',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'failed to update the invoice',
                ], 404);
            }
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'something went wrong',
            ], 400);
        }
    }

    public function deleteInvoice(Request $request)
    {
        $invoice_number = $request->input('invoice_number');

        try {
            $deleted = Invoice::where('invoice_number', $invoice_number)->delete();

            if ($deleted) {
                return response()->json([
                    'success' => true,
                    'message' => 'invoice deleted successfully',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'failed to delete the invoice',
                ], 404);
            }
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'something went wrong',
            ], 400);
        }
    }

    public function getInvoices(Request $request)
    {
        $cust_id = $request->input('cust_id');

        try {
            $invoices = Invoice::where('cust_id', $cust_id)->get();

            if ($invoices) {
                return response()->json([
                    'success' => true,
                    'message' => 'invoices fetched successfully',
                    'invoices' => $invoices
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'no invoices was found'
                ], 404);
            }
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'something went wrong'
            ]);
        }
    }

    public function invoiceInfo(Request $request)
    {
        $invoice_number = $request->input('invoice_number');

        try {
            $invoice = Invoice::where('invoice_number', $invoice_number)->first();

            if ($invoice) {
                return response()->json([
                    'success' => true,
                    'message' => 'invoice fetched successfully',
                    'invoice' => $invoice
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'no invoice was found'
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'something went wrong'
            ]);
        }
    }
}
