<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateServiceRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'date' => 'required|date',
            'scene' => 'nullable|string',
            'microphones' => 'nullable|string',
            'voiceover_zoom' => 'nullable|string',
            'administrator' => 'nullable|string',
        ];
    }
}
