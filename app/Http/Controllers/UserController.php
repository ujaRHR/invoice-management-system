<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Exception;
use App\Helper\JWTToken;


class UserController extends Controller
{
    public function customerSignup(Request $request)
    {
        try {
            Customer::create([
                'username' => $request->input('username'),
                'fullname' => $request->input('fullname'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'user_type' => $request->input('user_type'),
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
                'country' => $request->input('country'),
                'language' => $request->input('language'),
                'is_verified' => $request->input('is_verified'),
                'password_reset_token' => $request->input('password_reset_token'),
                'password_reset_expires' => $request->input('password_reset_expires')
            ]);

            return response()->json([
                'success' => true,
                'message' => 'User Created successfully'
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to Create User'
            ], 500);
        }
    }

    public function customerLogin(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        try {
            $customer = Customer::where('email', $email)->first();

            if (!Hash::check($password, $customer->password)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid Credentials'
                ], 401);
            }

            $token = JWTToken::createToken($customer->id, $customer->email);

            return response()->json([
                'success' => true,
                'message' => 'User Logged in Successfully',
            ], 200)->cookie('token', $token, 24 * 60 * 60);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'User Login Failed'
            ], 500);
        }
    }

    public function getCustomers(Request $request)
    {
        $cust_id = $request->input('cust_id');

        $customer = Customer::select('username', 'fullname', 'email', 'user_type', 'phone', 'address', 'country', 'language', 'is_verified', 'created_at')
            ->where('id', $cust_id)
            ->get();

        if ($customer->isNotEmpty()) {
            return response()->json([
                'success' => true,
                'message' => 'Customer information fetched successfully',
                'customers' => $customer,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'No customer information was fetched',
            ], 404);
        }
    }
}
