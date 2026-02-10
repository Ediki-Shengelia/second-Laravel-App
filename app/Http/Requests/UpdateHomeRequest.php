<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHomeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'location' => 'nullable|min:5|max:255',
            'price' => 'nullable|numeric|min:5000',
            'type' => 'nullable|string',
            'phone_number' => 'nullable|string|min:9|max:20',
            'owner' => 'nullable|string',
            'area' => 'nullable|numeric|min:25',
            'description' => 'nullable|min:20'
        ];
    }
}
