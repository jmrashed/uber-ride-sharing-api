<?php

namespace App\Services;

use App\Repositories\TripRepository;

class TripService
{
    protected $tripRepository;

    public function __construct(TripRepository $tripRepository)
    {
        $this->tripRepository = $tripRepository;
    }

    public function listTrips()
    {
        // Retrieve a list of all trips
        return $this->tripRepository->listTrips();
    }

    public function createTrip(array $data)
    {
        // Create a new trip
        return $this->tripRepository->createTrip($data);
    }

    public function getTrip($id)
    {
        // Retrieve a trip by ID
        return $this->tripRepository->getTrip($id);
    }

    public function updateTrip($id, array $data)
    {
        // Update trip details
        return $this->tripRepository->updateTrip($id, $data);
    }

    public function deleteTrip($id)
    {
        // Delete a trip by ID
        return $this->tripRepository->deleteTrip($id);
    }

    // Add more service methods for trip-related operations
}