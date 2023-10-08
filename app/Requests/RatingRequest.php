<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RatingRequest extends FormRequest
{
    public function authorize()
    {
        return true; // You can define authorization logic here if needed
    }

    public function rules()
    {
        return [
            'rated_by' => 'required|exists:users,id',
            'rated_user' => 'required|exists:users,id',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'nullable|string',
            // Define additional validation rules as needed
        ];
    }
}
