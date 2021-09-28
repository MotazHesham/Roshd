<?php

namespace App\Http\Requests;

use App\Models\PrecentageContract;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPrecentageContractRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('precentage_contract_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:precentage_contracts,id',
        ];
    }
}
