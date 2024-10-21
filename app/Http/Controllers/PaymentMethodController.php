<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentMethod;


class PaymentMethodController extends Controller
{
    public function createMethod(Request $request)
    {
        $validatedData = $request->validate([
            'cust_id' => 'required|integer',
            'method_type' => 'required|string|max:55',
            'provider' => 'required|string|max:100',
            'account_details' => 'required|string|max:255',
            'is_default' => 'required|string'
        ]);

        $created = PaymentMethod::create($validatedData);

        if ($created) {
            return response()->json([
                'success' => true,
                'message' => 'Payment Method Added Successfully',
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to Add Payment Method',
            ], 500);
        }
    }

    public function updateMethod(Request $request)
    {
        $method_id = $request->input('id');

        $validatedData = $request->validate([
            'method_type' => 'required|string|max:55',
            'provider' => 'required|string|max:100',
            'account_details' => 'required|string|max:255',
            'is_default' => 'required|string'
        ]);

        $updated = PaymentMethod::where('id', $method_id)->update($validatedData);

        if ($updated) {
            return response()->json([
                'success' => true,
                'message' => 'Payment Method Updated Successfully',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to Update the Payment Method',
            ], 500);
        }
    }

    public function deleteMethod(Request $request)
    {
        $method_id = $request->input('id');
        $deleted = PaymentMethod::where('id', $method_id)->delete();

        if ($deleted) {
            return response()->json([
                'success' => true,
                'message' => 'Payment Method Deleted Successfully',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to Delete the Payment Method',
            ], 404);
        }
    }

    public function getMethods(Request $request)
    {
        $cust_id = $request->input('cust_id');

        $methods = PaymentMethod::where('cust_id', $cust_id)->get();

        if ($methods->isNotEmpty()) {
            return response()->json([
                'success' => true,
                'message' => 'Payment Methods fetched successfully',
                'services' => $methods,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'No payment methods found',
            ], 404);
        }
    }
}
