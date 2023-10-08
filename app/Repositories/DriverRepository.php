<?php

namespace App\Repositories;

use App\Models\Driver;
use App\Interfaces\DriverInterface;

class DriverRepository implements DriverInterface
{
    public function create(array $data)
    {
        // Create a new driver in the database
        return Driver::create($data);
    }

    public function updateLocation($id, array $data)
    {
        // Update the driver's location
        $driver = Driver::findOrFail($id);
        $driver->update($data);

        return $driver;
    }

    public function getDriver($id)
    {
        // Retrieve a driver by ID
        return Driver::find($id);
    }

    public function updateDriver($id, array $data)
    {
        // Update driver details
        $driver = Driver::findOrFail($id);
        $driver->update($data);

        return $driver;
    }

    public function deleteDriver($id)
    {
        // Delete a driver by ID
        $driver = Driver::findOrFail($id);
        $driver->delete();

        return true;
    }

    public function listDrivers()
    {
        // Retrieve a list of all drivers
        return Driver::all();
    }

    // Implement other methods for driver-related operations
    public function findByUserId($userId)
    {
        // Retrieve a driver by their associated user ID
        return Driver::where('user_id', $userId)->first();
    }

    public function changeDriverStatus($id, $status)
    {
        // Change the driver's status (online or offline)
        $driver = Driver::findOrFail($id);
        $driver->update(['driver_status' => $status]);

        return $driver;
    }

    public function getDriverByLicensePlate($licensePlate)
    {
        // Retrieve a driver by their license plate
        return Driver::where('license_plate', $licensePlate)->first();
    }

    public function searchDrivers($criteria)
    {
        // Perform a search for drivers based on certain criteria
        // You can customize this method to implement specific search logic
        return Driver::where('car_make', 'LIKE', '%' . $criteria . '%')
            ->orWhere('car_model', 'LIKE', '%' . $criteria . '%')
            ->orWhere('current_latitude', 'LIKE', '%' . $criteria . '%')
            ->orWhere('current_longitude', 'LIKE', '%' . $criteria . '%')
            ->get();
    }
}