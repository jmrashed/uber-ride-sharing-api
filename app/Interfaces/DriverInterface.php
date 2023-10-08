<?php

namespace App\Interfaces;

interface DriverInterface
{
    public function create(array $data);

    public function updateLocation($id, array $data);

    public function getDriver($id);

    public function updateDriver($id, array $data);

    public function deleteDriver($id);

    public function listDrivers();

    // Define other methods for driver-related operations
}
