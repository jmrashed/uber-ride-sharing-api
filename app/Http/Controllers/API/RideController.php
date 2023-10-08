<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\RideService;
use App\Http\Requests\RideRequest;

class RideController extends Controller
{
    protected $rideService;

    public function __construct(RideService $rideService)
    {
        $this->rideService = $rideService;
    }

    public function index()
    {
        // Retrieve a list of all rides
        $rides = $this->rideService->listRides();

        return response()->json(['rides' => $rides]);
    }

    public function store(RideRequest $request)
    {
        // Create a new ride
        $ride = $this->rideService->createRide($request->all());

        return response()->json(['ride' => $ride], 201);
    }

    public function show($id)
    {
        // Retrieve a ride by ID
        $ride = $this->rideService->getRide($id);

        if (!$ride) {
            return response()->json(['message' => 'Ride not found'], 404);
        }

        return response()->json(['ride' => $ride]);
    }

    public function update(RideRequest $request, $id)
    {
        // Update ride details
        $ride = $this->rideService->updateRide($id, $request->all());

        if (!$ride) {
            return response()->json(['message' => 'Ride not found'], 404);
        }

        return response()->json(['ride' => $ride]);
    }

    public function destroy($id)
    {
        // Delete a ride by ID
        $result = $this->rideService->deleteRide($id);

        if (!$result) {
            return response()->json(['message' => 'Ride not found'], 404);
        }

        return response()->json(['message' => 'Ride deleted']);
    }
}