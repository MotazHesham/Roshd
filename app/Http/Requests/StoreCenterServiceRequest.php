<?php

namespace App\Http\Requests;

use App\Models\CenterService;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCenterServiceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('center_service_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'price' => [
                'numeric',
                'required',
            ],
        ];
    }
}
