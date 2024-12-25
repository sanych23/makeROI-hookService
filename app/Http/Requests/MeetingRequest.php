<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MeetingRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'meetingId' => ['required'],
            'eventType' => ['required']
        ];
    }
}
