<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
{
    public function authorize()
    {
        return true; // You can define authorization logic here if needed
    }

    public function rules()
    {
        return [
            'user_id' => 'required|exists:users,id',
            'ride_id' => 'required|exists:rides,id',
            'passenger_count' => 'required|integer|min:1',
            // Define additional validation rules as needed
        ];
    }
}