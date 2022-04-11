<?php

namespace App\Http\Requests;

use App\Models\TypesOfDegree;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTypesOfDegreeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('types_of_degree_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}
