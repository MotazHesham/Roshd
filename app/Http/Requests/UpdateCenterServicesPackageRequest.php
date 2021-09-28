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
            'package_content' => [
                'required',
            ],
            'start_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'end_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'package_value' => [
                'required',
            ],
        ];
    }
}
