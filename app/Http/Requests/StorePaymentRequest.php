<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StorePaymentRequest extends FormRequest
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
            'paymentable_id' => [
                'required',
            ],
            'paymentable_type' => [
                'required',
            ],
            'user_id' => [
                'required',
            ],
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
