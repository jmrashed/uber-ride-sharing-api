<?php

namespace App\Services;

use App\Repositories\DriverRepository;

class DriverService
{
    protected $driverRepository;

    public function __construct(DriverRepository $driverRepository)
    {
        $this->driverRepository = $driverRepository;
    }

    public function registerDriver(array $data)
    {
        // You can perform additional business logic here, e.g., verification, document checks, etc.
        return $this->driverRepository->create($data);
    }

    public function updateLocation($id, array $data)
    {
        // You can add validation and additional logic here
        return $this->driverRepository->updateLocation($id, $data);
    }

    public function getDriver($id)
    {
        // Retrieve a driver by ID
        return $this->driverRepository->getDriver($id);
    }

    public function updateDriver($id, array $data)
    {
        // Update driver details
        return $this->driverRepository->updateDriver($id, $data);
    }

    public function deleteDriver($id)
    {
        // Delete a driver by ID
        return $this->driverRepository->deleteDriver($id);
    }

    public function listDrivers()
    {
        // Retrieve a list of all drivers
        return $this->driverRepository->listDrivers();
    }

    // Add more service methods for driver-related operations
}
