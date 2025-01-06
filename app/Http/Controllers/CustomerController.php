<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Exception;
use App\Helper\JWTToken;


class CustomerController extends Controller
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
                'message' => 'customer created successfully'
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'something went wrong'
            ], 400);
        }
    }

    public function customerLogin(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        try {
            $customer = Customer::where('email', $email)->first();

            if ($customer) {
                if (!Hash::check($password, $customer->password)) {
                    return response()->json([
                        'success' => false,
                        'message' => 'invalid credentials, try again'
                    ], 401);
                } else {
                    $token = JWTToken::createToken($customer->id, $customer->email);

                    return response()->json([
                        'success' => true,
                        'message' => 'customer logged in successfully',
                    ], 200)->cookie('token', $token, 24 * 60 * 60);
                }
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'user not found!'
                ], 401);
            }
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'something went wrong!',
            ], 500);
        }
    }

    public function getCustomer(Request $request)
    {
        $cust_id = $request->input('cust_id');

        try {
            $customer = Customer::select('username', 'fullname', 'email', 'user_type', 'phone', 'address', 'country', 'language', 'is_verified', 'created_at')
                ->where('id', $cust_id)
                ->first();

            if ($customer) {
                return response()->json([
                    'success' => true,
                    'message' => 'customer information fetched successfully',
                    'customer' => $customer,
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'customer was not found'
                ], 400);
            }
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'something went wrong'
            ], 400);
        }
    }
}
