<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;

class SystemCalendarController extends Controller
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
        $events = [];
        foreach ($this->sources as $source) {
            foreach ($source['model']::all() as $model) {
                $crudFieldValue = $model->getAttributes()[$source['date_field']];

                if (!$crudFieldValue) {
                    continue;
                }

                $events[] = [
                    'title' => trim($source['prefix'] . ' ' . $model->{$source['field']} . ' ' . $source['suffix']),
                    'start' => $crudFieldValue,
                    'url'   => route($source['route'], $model->id),
                ];
            }
        }

        return view('admin.calendar.calendar', compact('events'));
    }
}
