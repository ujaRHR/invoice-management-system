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
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'failed to create the invoice',
                ], 400);
            }
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'something went wrong!'
            ], 500);
        }
    }

    public function updateInvoice(Request $request)
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

            $updated = Invoice::where('cust_id', $cust_id)
                ->where('invoice_number', $request->input('invoice_number'))
                ->update($validatedData);

            if ($updated) {
                return response()->json([
                    'success' => true,
                    'message' => 'invoice updated successfully',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'failed to update the invoice',
                ], 400);
            }
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'something went wrong!',
            ], 500);
        }
    }

    public function updateStatus(Request $request)
    {
        $request->validate([
            'invoice_number' => 'required|integer|digits_between:1,8',
            'status' => 'required|string|max:10'
        ]);

        $cust_id = $request->header('id');
        $invoice_number = $request->input('invoice_number');
        $status = $request->input('status');

        try {
            $invoice = Invoice::where('cust_id', $cust_id)
                ->where('invoice_number', $invoice_number)
                ->first();

            if (!$invoice) {
                return response()->json([
                    'success' => false,
                    'message' => 'invoice not found',
                ], 404);
            }

            if ($invoice->status === 'paid') {
                return response()->json([
                    'success' => false,
                    'message' => "status can't be updated as it's already paid",
                ], 400);
            }

            $updated = $invoice->update(['status' => $status]);

            if ($updated) {
                return response()->json([
                    'success' => true,
                    'message' => 'status updated successfully',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'failed to update the status',
                ], 400);
            }
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'something went wrong!',
                // 'error' => $e->getMessage(),
            ], 500);
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
                ], 400);
            }
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'something went wrong!',
            ], 500);
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
                ],200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'no invoice was found'
                ],400);
            }
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'something went wrong!'
            ],500);
        }
    }

    public function shareInvoice($invoice_number)
    {
        try {
            $invoice = Invoice::where('invoice_number', $invoice_number)->with([
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

            return view('pages.invoices.share-invoice', ['invoice' => $invoice]);
        } catch (Exception $e) {
            return response()->json(['invoice_number' => $invoice_number]);
        }
    }
}
