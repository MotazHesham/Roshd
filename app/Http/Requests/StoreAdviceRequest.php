<?php

namespace App\Http\Requests;

use App\Models\Advice;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAdviceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
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
                'unique:advice',
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
