<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyReservationRequest;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use App\Models\Clinic;
use App\Models\Doctor;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Traits\PaymentTrait;
use App\Models\CenterServicesPackageUser;
use App\Models\Payment;
use Illuminate\Support\Facades\Gate;
use RealRashid\SweetAlert\Facades\Alert;

class ReservationController extends Controller
{
    use PaymentTrait;

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

        return view('admin.reservations.partials.ranges',compact('range','date','reservations'));
    }

    public function index()
    {
        abort_if(Gate::denies('reservation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reservations = Reservation::with(['user', 'doctor', 'clinic','payments'])->get();

        return view('admin.reservations.index', compact('reservations'));
    }

    public function create()
    {
        abort_if(Gate::denies('reservation_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::where('user_type','patient')->get()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $doctors = Doctor::with('user')->get()->pluck('user.name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $clinics = Clinic::pluck('clinic_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.reservations.create', compact('users', 'doctors', 'clinics'));
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
        ]);


        Alert::success('تم بنجاح', 'تم إضافة الحجز بنجاح ');

        return redirect()->route('admin.reservations.index');
    }

    public function edit(Reservation $reservation)
    {
        abort_if(Gate::denies('reservation_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::where('user_type','patient')->get()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $doctors = Doctor::with('user')->get()->pluck('user.name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $clinics = Clinic::pluck('clinic_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $reservation->load('user', 'doctor', 'clinic','payments.user');

        $patientPackages = CenterServicesPackageUser::with('package','payments')->where('user_id',$reservation->user_id)->where(function($query){
            $query->where('remaining_sessions','>',0)->orWhere('remaining_free_sessions','>',0);
        })->orderBy('id','desc')->get();

        return view('admin.reservations.edit', compact('users', 'doctors', 'clinics', 'reservation','patientPackages'));
    }

    public function update(UpdateReservationRequest $request, Reservation $reservation)
    {
        $validated_request = $request->all();

        $valid = $this->package_payment($validated_request,$reservation);

        if(!$valid){
            return redirect()->route('admin.reservations.edit',$reservation->id);
        }

        $this->store_payment($validated_request,'App\Models\Reservation',$reservation->id);

        Alert::success('تم بنجاح', 'تم الدفع بنجاح ');

        return redirect()->route('admin.reservations.edit',$reservation->id);
    }

    public function show(Reservation $reservation)
    {
        abort_if(Gate::denies('reservation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reservation->load('user', 'doctor', 'clinic');

        return view('admin.reservations.show', compact('reservation'));
    }

    public function destroy(Reservation $reservation)
    {
        abort_if(Gate::denies('reservation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reservation->delete();

        Alert::success('تم بنجاح', 'تم حذف الحجز بنجاح ');

        return back();
    }

    public function massDestroy(MassDestroyReservationRequest $request)
    {
        Reservation::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function update_status($id,Request $request){

        $reservation = Reservation::findOrfail($id);
    
        $reservation->update([
            'statuse'=>$request->statuse,
        ]);
        Alert::success('تم بنجاح', 'تم التحديث بنجاح ');

        return redirect()->route('admin.reservations.edit',$reservation->id);
    }
}
