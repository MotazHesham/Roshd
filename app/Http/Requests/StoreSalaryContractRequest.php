<?php

namespace App\Http\Requests;

use App\Models\SalaryContract;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSalaryContractRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('salary_contract_create');
    }

    public function rules()
    {
        return [
            'contract_number' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'duration' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'work_hours' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'mechanism' => [
                'required',
            ],
            'salary' => [
                'numeric',
                'required',
            ],
            'doctor_id' => [
                'required',
                'integer',
            ],
            'allowances.*' => [
                'integer',
            ],
            'allowances' => [
                'array',
            ],
        ];
    }
}
