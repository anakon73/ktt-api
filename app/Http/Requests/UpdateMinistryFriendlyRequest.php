<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMinistryFriendlyRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'with_friendly' => 'sometimes|boolean',

            'ministry.date' => 'required|date',
            'ministry.leader' => 'nullable|string',
            'ministry.address' => 'nullable|string',
            'ministry.address_url' => 'nullable|url',

            'friendly.date' => 'required_if:with_friendly,true|date',
            'friendly.address' => 'required_if:with_friendly,true|string',
            'friendly.address_url' => 'required_if:with_friendly,true|url',
            'friendly.description' => 'required_if:with_friendly,true|string',
            'friendly.inviting' => 'required_if:with_friendly,true|string',
        ];
    }
}
