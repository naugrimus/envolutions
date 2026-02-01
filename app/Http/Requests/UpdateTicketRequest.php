<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTicketRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'priority' => [
                'required',
                'string',
            ],
            'status' => [
                'required',
                'string',
            ],
            'user' => [
                'integer',
                'nullable',
            ]
        ];
    }
}
