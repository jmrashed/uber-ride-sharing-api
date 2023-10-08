<?php

namespace App\Services;

use App\Repositories\BookingRepository;

class BookingService
{
    protected $bookingRepository;

    public function __construct(BookingRepository $bookingRepository)
    {
        $this->bookingRepository = $bookingRepository;
    }

    public function listBookings()
    {
        // Retrieve a list of all bookings
        return $this->bookingRepository->listBookings();
    }

    public function createBooking(array $data)
    {
        // Create a new booking
        return $this->bookingRepository->createBooking($data);
    }

    public function getBooking($id)
    {
        // Retrieve a booking by ID
        return $this->bookingRepository->getBooking($id);
    }

    public function updateBooking($id, array $data)
    {
        // Update booking details
        return $this->bookingRepository->updateBooking($id, $data);
    }

    public function deleteBooking($id)
    {
        // Delete a booking by ID
        return $this->bookingRepository->deleteBooking($id);
    }

    // Add more service methods for booking-related operations
}
