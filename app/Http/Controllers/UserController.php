<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Exception;

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
                'message' => 'User created successfully'
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'User creation failed'
            ], 500);
        }
    }

    public function customerLogin(Request $request)
    {
        $username = $request->input('username');
        $email = $request->input('email');
        $password = $request->input('password');

        try {
            $customer = Customer::where('email', $email)->first();
            $hashed_password = $customer->password;

            if (Hash::check($password, $hashed_password)) {
                $customer_email = $email;
                $token = JWTToken::createToken($customer_id, $customer_email);
            }

            return response()->json([
                'success' => true,
                'message' => 'User logged in successfully'
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'User login failed'
            ], 200);
        }
    }
}
