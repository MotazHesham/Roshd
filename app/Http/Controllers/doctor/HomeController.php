<?php

namespace App\Http\Controllers\doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Doctor;
use Auth;

class HomeController extends Controller
{
    public $sources = [
        [
            'model'      => '\App\Models\Reservation',
            'date_field' => 'reservation_date',
            'field'      => 'id',
            'prefix'     => 'حجز',
            'suffix'     => '',
            'route'      => 'admin.reservations.edit',
        ],
        [
            'model'      => '\App\Models\Reservation',
            'date_field' => 'delay_date',
            'field'      => 'id',
            'prefix'     => 'تأجيل',
            'suffix'     => '',
            'route'      => 'admin.reservations.edit',
        ],
    ];

    public function index()
    {
        $doctor = Doctor::where('user_id',Auth::id())->first();
        $events = [];
        foreach ($this->sources as $source) {
            foreach ($source['model']::where('doctor_id',$doctor->id)->get() as $model) {
                $crudFieldValue = $model->getAttributes()[$source['date_field']];

                if (!$crudFieldValue) {
                    continue;
                }

                $events[] = [
                    'title' => trim($source['prefix'] . ' ' . $model->user->name . ' ' . $source['suffix']),
                    'start' => $crudFieldValue,
                    'url'   => route($source['route'], $model->id),
                ];
            }
        }

        return view('doctor.home', compact('events'));
    }
}
