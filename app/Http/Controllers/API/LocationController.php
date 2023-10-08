<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\LocationService;
use App\Http\Requests\LocationRequest;

class LocationController extends Controller
{
    protected $locationService;

    public function __construct(LocationService $locationService)
    {
        $this->locationService = $locationService;
    }

    public function index()
    {
        // Retrieve a list of all locations
        $locations = $this->locationService->listLocations();

        return response()->json(['locations' => $locations]);
    }

    public function store(LocationRequest $request)
    {
        // Create a new location
        $location = $this->locationService->createLocation($request->all());

        return response()->json(['location' => $location], 201);
    }

    public function show($id)
    {
        // Retrieve a location by ID
        $location = $this->locationService->getLocation($id);

        if (!$location) {
            return response()->json(['message' => 'Location not found'], 404);
        }

        return response()->json(['location' => $location]);
    }

    public function update(LocationRequest $request, $id)
    {
        // Update location details
        $location = $this->locationService->updateLocation($id, $request->all());

        if (!$location) {
            return response()->json(['message' => 'Location not found'], 404);
        }

        return response()->json(['location' => $location]);
    }

    public function destroy($id)
    {
        // Delete a location by ID
        $result = $this->locationService->deleteLocation($id);

        if (!$result) {
            return response()->json(['message' => 'Location not found'], 404);
        }

        return response()->json(['message' => 'Location deleted']);
    }
}