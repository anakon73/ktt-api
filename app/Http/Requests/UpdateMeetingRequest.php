<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMeetingRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'date' => 'nullable|date',
            'leading' => 'nullable|string',
            'speech_title' => 'nullable|string',
            'lead_wt' => 'nullable|string',
            'reader' => 'nullable|string',
            'closing_prayer' => 'nullable|string',
            'special_program' => 'nullable|string',
            'status_id' => 'nullable|exists:meeting_statuses,id',
            'service_id' => 'nullable|exists:services,id',
            'address_id' => 'nullable|exists:addresses,id',
            'ministry_meeting_id' => 'nullable|exists:ministry_meetings,id',
        ];
    }
}
