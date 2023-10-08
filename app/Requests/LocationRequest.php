<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocationRequest extends FormRequest
{
    public function authorize()
    {
        return true; // You can define authorization logic here if needed
    }

    public function rules()
    {
        return [
            'name' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            // Define additional validation rules as needed
        ];
    }
}