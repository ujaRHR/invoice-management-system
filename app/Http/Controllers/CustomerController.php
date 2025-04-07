<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\CustomerProfile;
use Illuminate\Support\Facades\Hash;
use Exception;
use App\Helper\JWTToken;


class CustomerController extends Controller
{
    public function customerSignup(Request $request)
    {
        try {
            $customer = Customer::create([
                'username' => $request->input('username'),
                'fullname' => $request->input('fullname'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'user_type' => $request->input('user_type'),
                'password_reset_token' => $request->input('password_reset_token'),
                'password_reset_expires' => $request->input('password_reset_expires')
            ]);

            CustomerProfile::create([
                'cust_id' => $customer->id,
                'profile_picture' => null,
                'bio' => null,
                'phone' => null,
                'gender' => null,
                'dob' => null,
                'address' => null,
                'country' => null,
                'website' => null,
                'linkedin' => null,
                'twitter' => null,
                'language' => null,
                'timezone' => null,
                'status' => 'active',
                'is_verified' => 0,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'customer created successfully'
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'something went wrong'
            ], 500);
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
        $cust_id = $request->header('id');

        try {
            $customer = Customer::select('id', 'username', 'fullname', 'email', 'user_type')
                ->where('id', $cust_id)
                ->with('profile')
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
            ], 500);
        }
    }

    public function updateCustomerProfile(Request $request)
    {
        $cust_id = $request->header('id');

        try {
            $updateData = $request->only([
                "profile_picture",
                "bio",
                "phone",
                "gender",
                "dob",
                "address",
                "country",
                "website",
                "linkedin",
                "twitter",
                "language",
                "timezone",
            ]);

            $update = CustomerProfile::where('cust_id', $cust_id)->update($updateData);

            if ($update) {
                return response()->json([
                    'success' => true,
                    'message' => 'customer updated successfully'
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'failed to update the customer'
                ], 400);
            }
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'something went wrong!',
            ], 500);
        }
    }
}
