<?php

namespace App\Http\Requests;

use App\Models\Setting;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSettingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('setting_edit');
    }

    public function rules()
    {
        return [
            'site_name' => [
                'string',
                'required',
            ],
            'phone' => [
                'string',
                'required',
            ],
            'address' => [
                'string',
                'required',
            ],
            'logo' => [
                'required',
            ],
            'facebook' => [
                'string',
                'nullable',
            ],
            'twitter' => [
                'string',
                'nullable',
            ],
            'instagram' => [
                'string',
                'nullable',
            ],
            'you_tube' => [
                'string',
                'nullable',
            ],
            'about_rosd' => [
                'required',
            ],
            'familly_advice' => [
                'required',
            ],
            'individual_advice' => [
                'required',
            ],
            'el_gadaly_elsloky' => [
                'required',
            ],
            'el_maarefe_elsloky' => [
                'required',
            ],
            'art_therapy' => [
                'required',
            ],
            'play_therapy' => [
                'required',
            ],
            'message' => [
                'required',
            ],
            'vision' => [
                'required',
            ],
            'services' => [
                'required',
            ],
            'why' => [
                'required',
            ],
            'income_category_reservation_id' => [
                'required',
            ],
            'income_category_package_id' => [
                'required',
            ],
            'income_category_group_id' => [
                'required',
            ],
        ];
    }
}
