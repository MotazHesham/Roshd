<?php

namespace App\Http\Requests;

use App\Models\CenterServicesPackage;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCenterServicesPackageRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('center_services_package_edit');
    }

    public function rules()
    {
        return [

            'name' => [
                'string',
                'required',
            ],
            'attend_type' => [
                'required',
            ],
            'doctor_type' => [
                'required',
            ],
            'package_value' => [
                'required',
            ],
            'sessions' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'free_sessions' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
