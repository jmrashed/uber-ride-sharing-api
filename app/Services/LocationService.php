<?php

namespace App\Services;

use App\Repositories\LocationRepository;

class LocationService
{
    protected $locationRepository;

    public function __construct(LocationRepository $locationRepository)
    {
        $this->locationRepository = $locationRepository;
    }

    public function listLocations()
    {
        // Retrieve a list of all locations
        return $this->locationRepository->listLocations();
    }

    public function createLocation(array $data)
    {
        // Create a new location
        return $this->locationRepository->createLocation($data);
    }

    public function getLocation($id)
    {
        // Retrieve a location by ID
        return $this->locationRepository->getLocation($id);
    }

    public function updateLocation($id, array $data)
    {
        // Update location details
        return $this->locationRepository->updateLocation($id, $data);
    }

    public function deleteLocation($id)
    {
        // Delete a location by ID
        return $this->locationRepository->deleteLocation($id);
    }

    // Add more service methods for location-related operations
}