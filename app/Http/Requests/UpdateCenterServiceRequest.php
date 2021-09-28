<?php

namespace App\Http\Requests;

use App\Models\CenterService;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCenterServiceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('center_service_edit');
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
