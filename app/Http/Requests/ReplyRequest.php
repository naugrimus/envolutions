<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReplyRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'reply' => [
                'required',
                'string',
            ],
            'internal' => [
                'boolean',
                'nullable',
            ],
        ];
    }
}
