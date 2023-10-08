<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotificationRequest extends FormRequest
{
    public function authorize()
    {
        return true; // You can define authorization logic here if needed
    }

    public function rules()
    {
        return [
            'user_id' => 'required|exists:users,id',
            'message' => 'required|string',
            'is_read' => 'boolean',
            // Define additional validation rules as needed
        ];
    }
}