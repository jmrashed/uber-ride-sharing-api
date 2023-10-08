<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\TripService;
use App\Http\Requests\TripRequest;

class TripController extends Controller
{
    protected $tripService;

    public function __construct(TripService $tripService)
    {
        $this->tripService = $tripService;
    }

    public function index()
    {
        // Retrieve a list of all trips
        $trips = $this->tripService->listTrips();

        return response()->json(['trips' => $trips]);
    }

    public function store(TripRequest $request)
    {
        // Create a new trip
        $trip = $this->tripService->createTrip($request->all());

        return response()->json(['trip' => $trip], 201);
    }

    public function show($id)
    {
        // Retrieve a trip by ID
        $trip = $this->tripService->getTrip($id);

        if (!$trip) {
            return response()->json(['message' => 'Trip not found'], 404);
        }

        return response()->json(['trip' => $trip]);
    }

    public function update(TripRequest $request, $id)
    {
        // Update trip details
        $trip = $this->tripService->updateTrip($id, $request->all());

        if (!$trip) {
            return response()->json(['message' => 'Trip not found'], 404);
        }

        return response()->json(['trip' => $trip]);
    }

    public function destroy($id)
    {
        // Delete a trip by ID
        $result = $this->tripService->deleteTrip($id);

        if (!$result) {
            return response()->json(['message' => 'Trip not found'], 404);
        }

        return response()->json(['message' => 'Trip deleted']);
    }
}