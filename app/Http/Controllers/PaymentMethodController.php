<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use Exception;

class PaymentMethodController extends Controller
{
    public function createMethod(Request $request)
    {
        $cust_id = $request->header('id');

        try {
            $validatedData = $request->validate([
                'method_type' => 'required|string|max:55',
                'provider' => 'required|string|max:100',
                'account_details' => 'required|string|max:255',
                'is_default' => 'required|string'
            ]);

            $validatedData['cust_id'] = $cust_id;

            $created = PaymentMethod::create($validatedData);

            if ($created) {
                return response()->json([
                    'success' => true,
                    'message' => 'payment method added successfully',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'failed to add payment method',
                ], 400);
            }
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'something went wrong',
            ], 500);
        }
    }

    public function updateMethod(Request $request)
    {
        $method_id = $request->input('id');

        try {
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
                    'message' => 'payment method updated successfully',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'failed to update the payment method',
                ], 400);
            }
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'something went wrong',
            ], 500);
        }
    }

    public function deleteMethod(Request $request)
    {
        $method_id = $request->input('id');

        try {
            $deleted = PaymentMethod::where('id', $method_id)->delete();

            if ($deleted) {
                return response()->json([
                    'success' => true,
                    'message' => 'payment method deleted successfully',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'failed to delete the payment method',
                ], 400);
            }
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'something went wrong',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function getMethods(Request $request)
    {
        $cust_id = $request->header('id');

        try {
            $methods = PaymentMethod::where('cust_id', $cust_id)->get();

            if ($methods->isNotEmpty()) {
                return response()->json([
                    'success' => true,
                    'message' => 'payment methods fetched successfully',
                    'methods' => $methods,
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'no payment methods found',
                ], 400);
            }
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'something went wrong',
            ], 500);
        }
    }

    public function methodInfo(Request $request)
    {
        $method_id = $request->input('id');
        try {
            $method = PaymentMethod::where('id', $method_id)->first();

            if ($method) {
                return response()->json([
                    'success' => true,
                    'message' => 'payment methods fetched successfully',
                    'method' => $method,
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'no payment method was found',
                ], 400);
            }
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'something went wrong',
            ], 500);
        }
    }
}
