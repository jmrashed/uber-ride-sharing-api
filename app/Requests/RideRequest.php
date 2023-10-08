<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RideRequest extends FormRequest
{
    public function authorize()
    {
        return true; // You can define authorization logic here if needed
    }

    public function rules()
    {
        return [
            'driver_id' => 'required|exists:users,id',
            'origin' => 'required|string',
            'destination' => 'required|string',
            'departure_time' => 'required|date',
            'seats_available' => 'required|integer|min:1',
            'fare' => 'required|numeric|min:0.01',
            // Define additional validation rules as needed
        ];
    }
}