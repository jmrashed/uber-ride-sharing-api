<?php

namespace App\Repositories;

use App\Models\Trip;

class TripRepository implements TripInterface
{
    public function listTrips()
    {
        // Retrieve a list of all trips
        return Trip::all();
    }

    public function createTrip(array $data)
    {
        // Create a new trip in the database
        return Trip::create($data);
    }

    public function getTrip($id)
    {
        // Retrieve a trip by ID
        return Trip::find($id);
    }

    public function updateTrip($id, array $data)
    {
        // Update trip details
        $trip = Trip::findOrFail($id);
        $trip->update($data);

        return $trip;
    }

    public function deleteTrip($id)
    {
        // Delete a trip by ID
        $trip = Trip::findOrFail($id);
        $trip->delete();

        return true;
    }

    // Implement other methods for trip-related operations
}