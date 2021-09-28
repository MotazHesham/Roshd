<?php

namespace App\Http\Requests;

use App\Models\CenterService;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCenterServiceRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('center_service_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:center_services,id',
        ];
    }
}
