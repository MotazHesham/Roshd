<?php

namespace App\Http\Requests;

use App\Models\Experience;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateExperienceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('experience_edit');
    }

    public function rules()
    {
        return [
            'job_title' => [
                'string',
                'required',
            ],
            'work_place' => [
                'string',
                'required',
            ],
            'description' => [
                'required',
            ],
            'sart_work' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'end_work' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'doctor_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
