<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Services\DriverService;
use App\Http\Controllers\Controller;
use App\Http\Requests\DriverRequest;

class DriverController extends Controller
{
    protected $driverService;

    public function __construct(DriverService $driverService)
    {
        $this->driverService = $driverService;
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $this->validate($request, [
            'user_id' => 'required|exists:users,id',
            'car_make' => 'required|string',
            'car_model' => 'required|string',
            'car_year' => 'required|integer',
            'license_plate' => 'required|string|unique:drivers',
        ]);

        // Create a new driver
        $driver = $this->driverService->registerDriver($request->all());

        // Return a response
        return response()->json(['driver' => $driver], 201);
    }

    public function updateLocation(Request $request, $id)
    {
        // Validate the incoming request data
        $this->validate($request, [
            'current_latitude' => 'required|numeric',
            'current_longitude' => 'required|numeric',
        ]);

        // Update the driver's location
        $driver = $this->driverService->updateLocation($id, $request->only('current_latitude', 'current_longitude'));

        // Return a response
        return response()->json(['driver' => $driver]);
    }

    public function show($id)
    {
        // Retrieve a driver by ID
        $driver = $this->driverService->getDriver($id);

        if (!$driver) {
            return response()->json(['message' => 'Driver not found'], 404);
        }

        return response()->json(['driver' => $driver]);
    }

    public function update(DriverRequest  $request, $id)
    {
     
        // Update driver details
        $driver = $this->driverService->updateDriver($id, $request->all());

        if (!$driver) {
            return response()->json(['message' => 'Driver not found'], 404);
        }

        return response()->json(['driver' => $driver]);
    }

    public function destroy($id)
    {
        // Delete a driver by ID
        $result = $this->driverService->deleteDriver($id);

        if (!$result) {
            return response()->json(['message' => 'Driver not found'], 404);
        }

        return response()->json(['message' => 'Driver deleted']);
    }

    public function index()
    {
        // Retrieve a list of all drivers
        $drivers = $this->driverService->listDrivers();

        return response()->json(['drivers' => $drivers]);
    }

    // Add more controller methods for driver-related actions
}