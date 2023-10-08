<?php

namespace App\Repositories;

interface LocationInterface
{
    public function listLocations();

    public function createLocation(array $data);

    public function getLocation($id);

    public function updateLocation($id, array $data);

    public function deleteLocation($id);

    // Define other methods for location-related operations
}