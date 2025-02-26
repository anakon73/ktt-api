<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMeetingServiceRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'date' => 'required|date',

            'service.scene' => 'nullable|string',
            'service.microphones' => 'nullable|string',
            'service.voiceover_zoom' => 'nullable|string',
            'service.administrator' => 'nullable|string',

            'meeting.leading' => 'required|string',
            'meeting.speaker' => 'nullable|string',
            'meeting.speech_title' => 'nullable|string',
            'meeting.lead_wt' => 'nullable|string',
            'meeting.reader' => 'nullable|string',
            'meeting.closing_prayer' => 'nullable|string',
            'meeting.special_program' => 'nullable|string',
            'meeting.status_id' => 'required|exists:meeting_statuses,id',
            'meeting.address_id' => 'nullable|exists:addresses,id',
            'meeting.ministry_meeting_id' => 'nullable|exists:ministry_meetings,id',
        ];
    }
}
