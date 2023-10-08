<?php

namespace App\Repositories;

interface TripInterface
{
    public function listTrips();

    public function createTrip(array $data);

    public function getTrip($id);

    public function updateTrip($id, array $data);

    public function deleteTrip($id);

    // Define other methods for trip-related operations
}