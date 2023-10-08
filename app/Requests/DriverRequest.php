<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DriverRequest extends FormRequest
{
    public function authorize()
    {
        return true; // You can define authorization logic here if needed
    }

    public function rules()
    {
        return [
            'user_id' => 'required|exists:users,id',
            'car_make' => 'required|string',
            'car_model' => 'required|string',
            'car_year' => 'required|integer',
            'license_plate' => 'required|string|unique:drivers',
            // Define additional validation rules as needed
        ];
    }
}
