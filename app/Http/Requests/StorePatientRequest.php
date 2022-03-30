<?php

namespace App\Http\Requests;

use App\Models\Patient;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePatientRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('patient_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'email' => [
                'unique:users',
            ],
            'password' => [
                'required',
            ],
            'phone' => [
                'size:10',
                'regex:/(05)[0-9]{8}/',
                'required',
                'unique:users',
            ],
        ];
    }
}
