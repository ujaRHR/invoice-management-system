<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Exception;

class ServiceController extends Controller
{
    public function createService(Request $request)
    {
        $validatedData = $request->validate([
            'cust_id' => 'required|integer',
            'service_name' => 'required|string|max:255',
            'base_price' => 'required|numeric|max:100000',
        ]);

        $created = Service::create($validatedData);

        if ($created) {
            return response()->json([
                'success' => true,
                'message' => 'Service created successfully',
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create new service',
            ], 500);
        }
    }

    public function updateService(Request $request)
    {
        $service_id = $request->input('id');

        $validatedData = $request->validate([
            'service_name' => 'required|string|max:255',
            'base_price' => 'required|numeric|max:100000',
        ]);

        $updated = Service::where('id', $service_id)->update($validatedData);

        if ($updated) {
            return response()->json([
                'success' => true,
                'message' => 'Service Updated Successfully',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to Update the Service',
            ], 500);
        }
    }

    public function deleteService(Request $request)
    {
        $service_id = $request->input('id');
        $deleted = Service::where('id', $service_id)->delete();

        if ($deleted) {
            return response()->json([
                'success' => true,
                'message' => 'Service deleted successfully',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete the service',
            ], 404);
        }
    }

    public function getServices(Request $request)
    {
        $cust_id = $request->input('cust_id');

        $services = Service::where('cust_id', $cust_id)->get();

        if ($services->isNotEmpty()) {
            return response()->json([
                'success' => true,
                'message' => 'Services fetched successfully',
                'services' => $services,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'No services found',
            ], 404);
        }
    }
}
