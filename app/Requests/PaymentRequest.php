<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
{
    public function authorize()
    {
        return true; // You can define authorization logic here if needed
    }

    public function rules()
    {
        return [
            'trip_id' => 'required|exists:trips,id',
            'payment_method' => 'required|string',
            'total_amount' => 'required|numeric|min:0.01',
            'payment_status' => 'required|in:pending,paid',
            // Define additional validation rules as needed
        ];
    }
}
