<?php

namespace App\Repositories;

use App\Models\Location;

class LocationRepository implements LocationInterface
{
    public function listLocations()
    {
        // Retrieve a list of all locations
        return Location::all();
    }

    public function createLocation(array $data)
    {
        // Create a new location in the database
        return Location::create($data);
    }

    public function getLocation($id)
    {
        // Retrieve a location by ID
        return Location::find($id);
    }

    public function updateLocation($id, array $data)
    {
        // Update location details
        $location = Location::findOrFail($id);
        $location->update($data);

        return $location;
    }

    public function deleteLocation($id)
    {
        // Delete a location by ID
        $location = Location::findOrFail($id);
        $location->delete();

        return true;
    }

    // Implement other methods for location-related operations
}