<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMinistryMeetingRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'date' => 'required|date',
            'leader' => 'nullable|string',
            'address' => 'nullable|string',
            'address_url' => 'nullable|url',
            'friendly_meeting_id' => 'nullable|exists:friendly_meetings,id',
        ];
    }
}
