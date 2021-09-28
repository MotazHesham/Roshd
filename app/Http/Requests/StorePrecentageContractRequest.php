<?php

namespace App\Http\Requests;

use App\Models\PrecentageContract;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePrecentageContractRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('precentage_contract_create');
    }

    public function rules()
    {
        return [
            'percentage' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'doctor_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
