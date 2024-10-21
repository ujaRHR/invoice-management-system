<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Exception;

class ClientController extends Controller
{
    public function createClient(Request $request)
    {
        $validatedData = $request->validate([
            'cust_id' => 'required|integer',
            'fullname' => 'required|string|max:255',
            'email'    => 'required|email|max:100',
            'company'  => 'nullable|string|max:255',
            'country'  => 'required|string|max:100',
        ]);

        $created = Client::create($validatedData);

        if ($created) {
            return response()->json([
                'success' => true,
                'message' => 'Client Created Successfully',

            ], 201);
        } else {
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

        $updated = Client::where('id', $client_id)->update($validatedData);

        if ($updated) {
            return response()->json([
                'success' => true,
                'message' => 'User updated successfully'
            ], 200);
        } else {
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

    public function getClients(Request $request)
    {
        $cust_id = $request->input('cust_id');

        $clients = Client::where('cust_id', $cust_id)->get();

        if ($clients) {
            return response()->json([
                'success' => true,
                'message' => 'Clients Fetched Successfully',
                'clients' => $clients
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to Fetch Clients'
            ]);
        }
    }
}
