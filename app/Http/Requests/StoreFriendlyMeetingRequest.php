<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFriendlyMeetingRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'date' => 'required|date',
            'address' => 'required|string',
            'address_url' => 'required|url',
            'description' => 'required|string',
            'inviting' => 'required|string',
        ];
    }
}
