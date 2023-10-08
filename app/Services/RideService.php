<?php

namespace App\Services;

use App\Repositories\RideRepository;

class RideService
{
    protected $rideRepository;

    public function __construct(RideRepository $rideRepository)
    {
        $this->rideRepository = $rideRepository;
    }

    public function listRides()
    {
        // Retrieve a list of all rides
        return $this->rideRepository->listRides();
    }

    public function createRide(array $data)
    {
        // Create a new ride
        return $this->rideRepository->createRide($data);
    }

    public function getRide($id)
    {
        // Retrieve a ride by ID
        return $this->rideRepository->getRide($id);
    }

    public function updateRide($id, array $data)
    {
        // Update ride details
        return $this->rideRepository->updateRide($id, $data);
    }

    public function deleteRide($id)
    {
        // Delete a ride by ID
        return $this->rideRepository->deleteRide($id);
    }

    // Add more service methods for ride-related operations
}
