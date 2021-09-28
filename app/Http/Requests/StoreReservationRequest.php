<?php

namespace App\Http\Requests;

use App\Models\Reservation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreReservationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('reservation_create');
    }

    public function rules()
    {
        return [
            'reservation_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'statuse' => [
                'required',
            ],
            'delay_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'cost' => [
                'required',
            ],
            'user_id' => [
                'required',
                'integer',
            ],
            'doctor_id' => [
                'required',
                'integer',
            ],
            'clinic_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
