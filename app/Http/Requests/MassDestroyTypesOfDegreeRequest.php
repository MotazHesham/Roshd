<?php

namespace App\Http\Requests;

use App\Models\TypesOfDegree;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTypesOfDegreeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('types_of_degree_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:types_of_degrees,id',
        ];
    }
}
