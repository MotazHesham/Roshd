<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDoctorRequest;
use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use App\Models\Doctor;
use App\Models\Clinic;
use App\Models\Specialization;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Alert;

class DoctorController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('doctor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $doctors = Doctor::with(['user', 'specialization'])->get();

        return view('admin.doctors.index', compact('doctors'));
    }

    public function create()
    {
        abort_if(Gate::denies('doctor_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $specializations = Specialization::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $clinics = Clinic::pluck('clinic_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.doctors.create', compact('users', 'specializations', 'clinics'));
    }

    public function store(StoreDoctorRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'user_type' => 'doctor',
        ]);
        Doctor::create ([
            'years_experience'=>$request->years_experience,
            'work_days'=>$request->work_days,
            'start_time'=>$request->start_time,
            'end_time'=>$request->end_time,
            'user_id'=>$user->id,
            'specialization_id'=> $request->specialization_id,
            'clinic_id'=>$request->clinic_id,
        ]);

        Alert::success('تم بنجاح', 'تم إضافة الإستشاري بنجاح ');

        return redirect()->route('admin.doctors.index');
    }

    public function edit(Doctor $doctor)
    {
        abort_if(Gate::denies('doctor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $users = User::pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $specializations = Specialization::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $clinics = Clinic::pluck('clinic_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $doctor->load('user', 'specialization', 'clinic');

        return view('admin.doctors.edit', compact('users', 'specializations', 'clinics', 'doctor'));
    
    }

    public function update(UpdateDoctorRequest $request, Doctor $doctor)
    {
        $doctor->update ([
            'years_experience'=>$request->years_experience,
            'work_days'=>$request->work_days,
            'start_time'=>$request->start_time,
            'end_time'=>$request->end_time,
            'specialization_id'=> $request->specialization_id,
            'clinic_id'=>$request->clinic_id,
        ]);
        $user = User::find($doctor->user_id);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'user_type' => 'doctor',
        ]);
       

        Alert::success('تم بنجاح', 'تم تعديل بيانات الإستشاري بنجاح ');

        return redirect()->route('admin.doctors.index');
    }

    public function show(Doctor $doctor)
    {
        abort_if(Gate::denies('doctor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $doctor->load('user', 'specialization', 'doctorSalaryContracts', 'doctorPrecentageContracts', 'doctorExperiences', 'doctorEducation');

        return view('admin.doctors.show', compact('doctor'));
    }

    public function destroy(Doctor $doctor)
    {
        abort_if(Gate::denies('doctor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $doctor->delete();

        Alert::success('تم بنجاح', 'تم حذف الإستشاري بنجاح ');

        return back();
    }

    public function massDestroy(MassDestroyDoctorRequest $request)
    {
        Doctor::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
