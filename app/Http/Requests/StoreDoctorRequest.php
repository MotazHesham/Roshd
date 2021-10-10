<?php

namespace App\Http\Requests;

use App\Models\Doctor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDoctorRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('doctor_create');
    }

    public function rules()
    {
        return [
            'years_experience' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'user_id' => [
                'integer',
            ],
            'specialization_id' => [
                'required',
                'integer',
            ],  
            'name' => [
                'string',
                'required',
            ],
            'email' => [
                'required',
                'unique:users',
            ],
            'password' => [
                'required',
            ], 
            'phone' => [
                'string',
                'required',
            ],
            'work_days.*' => [
                'array',
            ],
            'work_days'   => [
                'required',
                'array',
            ],
            'cost' => [
                'required',
            ],
        ];
    }
}
