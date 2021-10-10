<?php

namespace App\Http\Requests;

use App\Models\Activate;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateActivateRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('activate_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'description' => [
                'required',
            ],
            'video' => [
                'required',
            ],
            'images' => [
                'array',
            ],
        ];
    }
}
