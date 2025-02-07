<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAnnouncementRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'announcement_url' => [
                'required',
                'string',
                'regex:/^https?:\/\/drive\.google\.com\/file\/d\/[a-zA-Z0-9_-]+\/view\?usp=sharing$/'
            ],
            'title' => [
                'required',
                'string',
                'max:255'
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'announcement_url.required' => 'Поле "announcement_url" є обов\'язковим.',
            'announcement_url.string' => 'Поле "announcement_url" повинно бути рядком.',
            'announcement_url.regex' => 'Посилання повинно бути коректним Google Drive URL у форматі "/view?usp=sharing".',
        ];
    }
}
