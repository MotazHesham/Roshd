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
        return true;
    }

    public function rules()
    {
        return [ 
            'user_id' => [
                'required',
                'integer',
            ],
            'doctor_id' => [
                'required',
                'integer',
            ], 
            'choosen_date' => [
                'required',
                'date_format:Y-m-d',
            ],
            'choosen_time' => [
                'required',
                'date_format:' . config('panel.time_format'),
            ],
        ];
    }

    public function messages(){
        return [
            'choosen_time.required' => 'يرجي اختيار معاد' ,
            'choosen_date.required' => '.' ,
        ];
    }
}
