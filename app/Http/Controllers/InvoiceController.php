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
                ], 400);
            }
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'failed to create the invoice',
                'error' => $e->getMessage()
            ], 400);
        }
    }
}
