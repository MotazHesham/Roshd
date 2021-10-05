<?php

namespace App\Http\Requests;

use App\Models\Editor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateEditorRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('editor_edit');
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
                'unique:users,email,'. request()->user_id,
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
