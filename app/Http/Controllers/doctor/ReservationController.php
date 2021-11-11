<?php

namespace App\Http\Controllers\doctor;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyReservationRequest;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use App\Models\Clinic;
use App\Models\Doctor;
use App\Models\Reservation;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Alert;

class ReservationController extends Controller
{ 

    public function index()
    { 

        $reservations = Reservation::with(['user', 'doctor', 'clinic'])->get();

        return view('doctor.reservations.index', compact('reservations'));
    }  

    public function edit(Reservation $reservation)
    { 

        $reservation->load('user', 'doctor', 'clinic');

        return view('doctor.reservations.edit', compact('reservation'));
    }

    public function update(Request $request, Reservation $reservation)
    {
        $reservation->update($request->all());

        Alert::success('تم بنجاح', 'تم  تعديل الحجز بنجاح ');

        return redirect()->route('doctor.reservations.index');
    }

    public function show(Reservation $reservation)
    { 

        $reservation->load('user', 'doctor', 'clinic');

        return view('doctor.reservations.show', compact('reservation'));
    }

    public function destroy(Reservation $reservation)
    { 

        $reservation->delete();

        Alert::success('تم بنجاح', 'تم حذف الحجز بنجاح ');

        return back();
    }

    public function massDestroy(MassDestroyReservationRequest $request)
    {
        Reservation::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
