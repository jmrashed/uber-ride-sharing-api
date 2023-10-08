<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TripRequest extends FormRequest
{
    public function authorize()
    {
        return true; // You can define authorization logic here if needed
    }

    public function rules()
    {
        return [
            'passenger_id' => 'required|exists:users,id',
            'driver_id' => 'required|exists:users,id',
            'start_latitude' => 'required|numeric',
            'start_longitude' => 'required|numeric',
            'end_latitude' => 'required|numeric',
            'end_longitude' => 'required|numeric',
            'start_time' => 'required|date',
            'end_time' => 'nullable|date',
            'fare_amount' => 'required|numeric|min:0.01',
            'trip_status' => 'required|in:scheduled,in_progress,completed,canceled',
            // Define additional validation rules as needed
        ];
    }
}