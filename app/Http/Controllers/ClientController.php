<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Exception;
use Illuminate\Http\JsonResponse;

class ClientController extends Controller
{
    public function createClient(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'cust_id' => 'required',
                'fullname' => 'required|string|max:255',
                'email'    => 'required|email|max:100',
                'company'  => 'nullable|string|max:255',
                'country'  => 'required|string|max:100',
            ]);

            Client::create($validatedData);

            return response()->json([
                'success' => true,
                'message' => 'Client Created Successfully'
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to Create New Client'
            ], 422);
        }
    }

    public function updateClient(Request $request)
    {
        $client_id = $request->input('id');

        $validatedData = $request->validate([
            'fullname' => 'required|string|max:255',
            'email'    => 'required|email|max:100',
            'company'  => 'nullable|string|max:255',
            'country'  => 'required|string|max:100',
        ]);

        try {
            Client::where('id', $client_id)->update($validatedData);

            return response()->json([
                'success' => true,
                'message' => 'User updated successfully',
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update the user'
            ], 500);
        }
    }

    public function deleteClient(Request $request)
    {
        $client_id = $request->input('id');
        $deleted = Client::where('id', $client_id)->delete();

        if ($deleted) {
            return response()->json([
                'success' => true,
                'message' => 'Client Deleted Successfully',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to Delete Client',
            ], 500);
        }
    }
}
