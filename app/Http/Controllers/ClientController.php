<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Exception;

class ClientController extends Controller
{
    public function createClient(Request $request)
    {

        try {
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
                    'message' => 'client created successfully',

                ], 201);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'failed to create new client'
                ], 400);
            }
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'failed to create new client'
            ], 400);
        }
    }

    public function updateClient(Request $request)
    {
        $client_id = $request->input('id');

        try {
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
                    'message' => 'client updated successfully'
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'failed to update the client'
                ], 400);
            }
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'failed to update the user'
            ], 400);
        }
    }

    public function deleteClient(Request $request)
    {
        $client_id = $request->input('id');

        try {
            $deleted = Client::where('id', $client_id)->delete();

            if ($deleted) {
                return response()->json([
                    'success' => true,
                    'message' => 'client deleted successfully',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'failed to delete client',
                ], 400);
            }
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'failed to delete client',
            ], 400);
        }
    }

    public function getClients(Request $request)
    {
        $cust_id = $request->header('id');

        try {
            $clients = Client::where('cust_id', $cust_id)->get();

            if ($clients) {
                return response()->json([
                    'success' => true,
                    'message' => 'clients fetched successfully',
                    'clients' => $clients
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'failed to fetch clients'
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'failed to fetch clients'
            ]);
        }
    }

    public function clientInfo(Request $request)
    {
        $client_id = $request->input('id');

        try {
            $client = Client::where('id', $client_id)->first();
            if ($client) {
                return response()->json([
                    'success' => true,
                    'message' => 'client fetched successfully',
                    'client' => $client
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'no client was found'
                ], 404);
            }
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'something went wrong'
            ], 400);
        }
    }
}
