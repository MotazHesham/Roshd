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
            'user_id' => [
                'required',
                'integer',
            ],
            'specialization_id' => [
                'required',
                'integer',
            ],
            'start_time' => [
                'required',
                'date_format:' . config('panel.time_format'),
            ],
            'end_time' => [
                'required',
                'date_format:' . config('panel.time_format'),
            ],
            'clinic_id' => [
                'required',
                'integer',
            ],
            'work_days' => [
                'required',
                'array',
            ],
        ];
    }
}
