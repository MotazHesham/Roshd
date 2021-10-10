<?php

namespace App\Http\Requests;

use App\Models\Doctor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDoctorRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('doctor_edit');
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
                'unique:users,email,' . request()->user_id,
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
