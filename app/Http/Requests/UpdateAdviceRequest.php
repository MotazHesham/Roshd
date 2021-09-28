<?php

namespace App\Http\Requests;

use App\Models\Advice;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAdviceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('advice_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'email' => [
                'required',
                'unique:advice,email,' . request()->route('advice')->id,
            ],
            'advice_type' => [
                'required',
            ],
            'description' => [
                'required',
            ],
        ];
    }
}
