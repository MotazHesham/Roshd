<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignupUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
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
                'required',
                'unique:users',
                'size:10',
                'regex:/(05)[0-9]{8}/',
            ],
            'user_type' => [
                'required'
            ],
        ];
    }
}
