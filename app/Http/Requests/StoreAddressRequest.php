<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAddressRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'address' => 'required|string',
            'address_url' => 'required|url'
        ];
    }
    public function messages(): array
    {
        return [
            'address_url.url' => 'The provided address URL is not valid. Please enter a valid URL.',
        ];
    }
}
