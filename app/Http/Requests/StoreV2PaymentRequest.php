<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreV2PaymentRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('payment_store');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'amount' => [
                'required',
            ],
            'payment_type' => [
                'string',
                'required',
            ],
            'transfer_name' => [
                'string',
                'nullable',
            ],
            'payment_status' => [
                'string',
                'nullable',
            ],
            'reference_number' => [
                'string',
                'nullable',
            ],
            'last_4_digits' => [
                'string',
                'nullable',
            ],
        ];
    }
}
