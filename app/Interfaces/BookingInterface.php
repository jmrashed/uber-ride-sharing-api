<?php

namespace App\Repositories;

interface BookingInterface
{
    public function listBookings();

    public function createBooking(array $data);

    public function getBooking($id);

    public function updateBooking($id, array $data);

    public function deleteBooking($id);

    // Define other methods for booking-related operations
}