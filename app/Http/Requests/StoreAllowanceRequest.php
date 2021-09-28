<?php

namespace App\Http\Requests;

use App\Models\Allowance;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAllowanceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('allowance_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'value' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
