<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\BookingService;
use App\Http\Requests\BookingRequest;

class BookingController extends Controller
{
    protected $bookingService;

    public function __construct(BookingService $bookingService)
    {
        $this->bookingService = $bookingService;
    }

    public function index()
    {
        // Retrieve a list of all bookings
        $bookings = $this->bookingService->listBookings();

        return response()->json(['bookings' => $bookings]);
    }

    public function store(BookingRequest $request)
    {
        // Create a new booking
        $booking = $this->bookingService->createBooking($request->all());

        return response()->json(['booking' => $booking], 201);
    }

    public function show($id)
    {
        // Retrieve a booking by ID
        $booking = $this->bookingService->getBooking($id);

        if (!$booking) {
            return response()->json(['message' => 'Booking not found'], 404);
        }

        return response()->json(['booking' => $booking]);
    }

    public function update(BookingRequest $request, $id)
    {
        // Update booking details
        $booking = $this->bookingService->updateBooking($id, $request->all());

        if (!$booking) {
            return response()->json(['message' => 'Booking not found'], 404);
        }

        return response()->json(['booking' => $booking]);
    }

    public function destroy($id)
    {
        // Delete a booking by ID
        $result = $this->bookingService->deleteBooking($id);

        if (!$result) {
            return response()->json(['message' => 'Booking not found'], 404);
        }

        return response()->json(['message' => 'Booking deleted']);
    }
}