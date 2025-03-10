<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use Exception;

class InvoiceController extends Controller
{
    public function createInvoice(Request $request)
    {
        $cust_id = $request->header('id');

        try {
            $validatedData = $request->validate([
                'client_id' => 'required|integer',
                'invoice_number' => 'required|integer',
                'service_id' => 'required|integer',
                'quantity' => 'required|integer|min:1',
                'unit_price' => 'required|numeric|min:0',
                'issue_date' => 'required|date|before_or_equal:due_date',
                'due_date' => 'required|date|after_or_equal:issue_date',
                'amount' => 'required|numeric|min:0',
                'tax' => 'required|numeric|min:0',
                'total_amount' => 'required|numeric|min:0',
                'status' => 'string|max:255',
                'payment_method' => 'required|integer',
                'notes' => 'nullable|string|max:255'
            ]);

            $validatedData['cust_id'] = $cust_id;

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
                ], 200);
            }
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'something went wrong!'
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
                ], 200);
            }
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'something went wrong!',
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
                ], 200);
            }
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'something went wrong!',
            ], 400);
        }
    }

    public function getInvoices(Request $request)
    {
        $cust_id = $request->header('id');

        try {
            $invoices = Invoice::where('cust_id', $cust_id)->with([
                'client' => function ($query) {
                    $query->select('id', 'fullname');
                },
                'service' => function ($query) {
                    $query->select('id', 'service_name');
                },
                'paymentMethod' => function ($query) {
                    $query->select('id', 'method_type', 'provider', 'account_details');
                }
            ])->get();

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
                ], 200);
            }
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'something went wrong!'
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
                'message' => 'something went wrong!'
            ]);
        }
    }
}
