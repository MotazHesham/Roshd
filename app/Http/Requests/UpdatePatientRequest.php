<?php

namespace App\Http\Requests;

use App\Models\Patient;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePatientRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('patient_edit');
    }

    public function rules()
    {
        return [

            'name' => [
                'string',
                'required',
            ],
            'email' => [
                'nullable',
                'unique:users,email,'. request()->user_id,
            ],
            'phone' => [
                'string',
                'required',
                'unique:users,phone,'. request()->user_id,
            ],  
        ];
    }
}
