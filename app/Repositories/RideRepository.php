<?php

namespace App\Repositories;

use App\Models\Ride;

class RideRepository implements RideInterface
{
    public function listRides()
    {
        // Retrieve a list of all rides
        return Ride::all();
    }

    public function createRide(array $data)
    {
        // Create a new ride in the database
        return Ride::create($data);
    }

    public function getRide($id)
    {
        // Retrieve a ride by ID
        return Ride::find($id);
    }

    public function updateRide($id, array $data)
    {
        // Update ride details
        $ride = Ride::findOrFail($id);
        $ride->update($data);

        return $ride;
    }

    public function deleteRide($id)
    {
        // Delete a ride by ID
        $ride = Ride::findOrFail($id);
        $ride->delete();

        return true;
    }

    // Implement other methods for ride-related operations
}