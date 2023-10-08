<?php

namespace App\Repositories;

use App\Models\Booking;

class BookingRepository implements BookingInterface
{
    public function listBookings()
    {
        // Retrieve a list of all bookings
        return Booking::all();
    }

    public function createBooking(array $data)
    {
        // Create a new booking in the database
        return Booking::create($data);
    }

    public function getBooking($id)
    {
        // Retrieve a booking by ID
        return Booking::find($id);
    }

    public function updateBooking($id, array $data)
    {
        // Update booking details
        $booking = Booking::findOrFail($id);
        $booking->update($data);

        return $booking;
    }

    public function deleteBooking($id)
    {
        // Delete a booking by ID
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return true;
    }

    // Implement other methods for booking-related operations
}