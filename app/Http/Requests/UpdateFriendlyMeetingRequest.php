<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFriendlyMeetingRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'date' => 'nullable|date',
            'address' => 'nullable|string',
            'address_url' => 'nullable|url',
            'description' => 'nullable|string',
            'inviting' => 'nullable|string',
        ];
    }
}
