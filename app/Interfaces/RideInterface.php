<?php

namespace App\Repositories;

interface RideInterface
{
    public function listRides();

    public function createRide(array $data);

    public function getRide($id);

    public function updateRide($id, array $data);

    public function deleteRide($id);

    // Define other methods for ride-related operations
}