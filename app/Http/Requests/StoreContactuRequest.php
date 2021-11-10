<?php

namespace App\Http\Requests;

use App\Models\Contactu;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreContactuRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'email' => [
                'required',
                'email'
            ],
            'phone' => [
                'required',
                'regex:/(05)[0-9]{8}/',
                'size:10'
            ],
            'message' => [
                'required',
            ],
        ];
    }
}
