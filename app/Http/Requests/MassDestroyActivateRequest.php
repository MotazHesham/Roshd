<?php

namespace App\Http\Requests;

use App\Models\Activate;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyActivateRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('activate_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:activates,id',
        ];
    }
}
