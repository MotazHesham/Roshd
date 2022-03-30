<?php

namespace App\Http\Requests;

use App\Models\Student;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreStudentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('student_create');
    }

    public function rules()
    {
        return [
            'hours' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'specialization_id' => [
                'required',
                'integer',
            ],
            'user_id' => [
                'integer',
            ],
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
