<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMinistryMeetingRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'date' => 'nullable|date',
            'leader' => 'nullable|string',
            'address_id' => 'nullable|exists:addresses,id',
            'friendly_meeting_id' => 'nullable|exists:friendly_meetings,id',
        ];
    }
}
