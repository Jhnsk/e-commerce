<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'delivery_type' => 'required|in:delivery,pickup',
            'address' => 'nullable|string|max:255',
            'reference' => 'nullable|string|max:255',
            'payment_method' => 'required|string',
            'note' => 'nullable|string',
        ];
    }
}
