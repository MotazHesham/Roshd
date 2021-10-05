<?php

namespace App\Http\Requests;

use App\Models\Editor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreEditorRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('editor_create');
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
                'unique:users',
            ],
            'password' => [
                'required',
            ],
            'roles.*' => [
                'integer',
            ],
            'phone' => [
                'string',
                'required',
            ],


            'city' => [
                'string',
                'required',
            ],
            'work' => [
                'string',
                'nullable',
            ],
            'user_id' => [
                
                'integer',
            ],
        ];
    }
}
