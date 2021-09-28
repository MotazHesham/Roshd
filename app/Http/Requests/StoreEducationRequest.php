<?php

namespace App\Http\Requests;

use App\Models\Education;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreEducationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('education_create');
    }

    public function rules()
    {
        return [
            'start_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'end_date' => [
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
