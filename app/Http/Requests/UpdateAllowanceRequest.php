<?php

namespace App\Http\Requests;

use App\Models\Allowance;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAllowanceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('allowance_edit');
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
