<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\MassDestroyReservationRequest;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use App\Models\Clinic;
use App\Models\Doctor;
use App\Models\Reservation;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;
use Alert;
use Auth;

class ReservationController extends Controller
{
    //
    public function ranges(Request $request){

        $date = $request->date; 
        $reservations = Reservation::where('doctor_id',$request->doctor_id)->where('reservation_date',$date)->get()->pluck(['reservation_time'])->toArray();
        if(!$reservations){
            $reservations = [];
        }
        $day = date('D',strtotime($date));

        $doctor = Doctor::findOrFail($request->doctor_id);
        $doctor->load(['clinics']);

        $doctor_clinic = $doctor->clinics()->wherePivot('day',$day)->first();


        if($doctor_clinic){
            $range = range(strtotime($doctor_clinic->pivot->start_time),strtotime($doctor_clinic->pivot->end_time),15*60); 
        }else{
            $range = null;
        }
        
        return view('frontend.reservations.partials.ranges',compact('range','date','reservations'));
    }
    public function index()
    {

        $reservations = Reservation::with(['user', 'doctor', 'clinic'])->where('user_id',Auth::id())->get();

        return view('frontend.reservations.index', compact('reservations'));
    }

    public function create()
    {

        $doctors = Doctor::with('user')->get()->pluck('user.name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $clinics = Clinic::pluck('clinic_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.reservations.create', compact( 'doctors', 'clinics'));
    }
    
    public function store(StoreReservationRequest $request)
    {
        
        $doctor = Doctor::findOrFail($request->doctor_id); 
        $date = date(config('panel.date_format'),strtotime($request->choosen_date));
        $clinic_id = $doctor->clinics()->wherePivot('doctor_id',$request->doctor_id)->first()->pivot->clinic_id ?? 0; 

        $reservations = Reservation::where('doctor_id',$request->doctor_id)
                                    ->where('reservation_date',$request->choosen_date)
                                    ->where('reservation_time',date('H:i:s',strtotime($request->choosen_time)))
                                    ->first();
        if($reservations){
            Alert::error('لم يتم الحجز','تم حجز الموعد من قبل شخص اخر');
            return back();
        }
        
        $reservation = Reservation::create([
            'reservation_date' => $date,
            'reservation_time' => $request->choosen_time,
            'statuse' => 'pending',
            'cost' => $doctor->cost,
            'doctor_id' => $request->doctor_id,
            'clinic_id' => $clinic_id,
            'user_id' => $request->user_id,
            'payment_status' => 'not_paid',
        ]);

        Alert::success('تم بنجاح', 'تم إضافة الحجز بنجاح ');

        return redirect()->route('frontend.home');
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
