<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Exception;

class ServiceController extends Controller
{
    public function createService(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'cust_id' => 'required|integer',
                'service_name' => 'required|string|max:255',
                'base_price' => 'required|numeric|max:100000',
            ]);

            $created = Service::create($validatedData);

            if ($created) {
                return response()->json([
                    'success' => true,
                    'message' => 'service created successfully',
                ], 201);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'failed to create new service',
                ], 404);
            }
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'something went wrong',
            ], 400);
        }
    }

    public function updateService(Request $request)
    {
        $service_id = $request->input('id');

        try {
            $validatedData = $request->validate([
                'service_name' => 'required|string|max:255',
                'base_price' => 'required|numeric|max:100000',
            ]);

            $updated = Service::where('id', $service_id)->update($validatedData);

            if ($updated) {
                return response()->json([
                    'success' => true,
                    'message' => 'service updated successfully',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'failed to update the service',
                ], 400);
            }
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'something went wrong',
            ], 400);
        }
    }

    public function deleteService(Request $request)
    {
        $service_id = $request->input('id');

        try {
            $deleted = Service::where('id', $service_id)->delete();

            if ($deleted) {
                return response()->json([
                    'success' => true,
                    'message' => 'service deleted successfully',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'failed to delete the service',
                ], 400);
            }
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'something went wrong',
            ], 400);
        }
    }

    public function getServices(Request $request)
    {
        $cust_id = $request->input('cust_id');

        try {
            $services = Service::where('cust_id', $cust_id)->get();

            if ($services->isNotEmpty()) {
                return response()->json([
                    'success' => true,
                    'message' => 'services fetched successfully',
                    'services' => $services,
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'No services were found',
                ], 404);
            }
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'something went wrong',
            ], 400);
        }
    }

    public function serviceInfo(Request $request)
    {
        $service_id = $request->input('id');

        try {
            $service = Service::where('id', $service_id)->first();

            if ($service) {
                return response()->json([
                    'success' => true,
                    'message' => 'service fetched successfully',
                    'service' => $service,
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'no service was found',
                ], 404);
            }
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'something went wrong',
            ], 400);
        }
    }
}
