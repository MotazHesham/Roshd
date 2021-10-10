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
use Carbon\Carbon;

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

        $days = doctor::WORK_DAYS_SELECT;

        return view('admin.doctors.create', compact('users', 'specializations', 'clinics','days'));
    }

    public function store(StoreDoctorRequest $request)
    { 
        $data = $request->validated(); 
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'user_type' => 'doctor',
        ]);

        if ($request->input('photo', false)) {
            $user->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $user->id]);
        }

        $doctor = Doctor::create ([
            'years_experience'=>$request->years_experience, 
            'cost'=>$request->cost, 
            'user_id'=>$user->id,
            'specialization_id'=> $request->specialization_id, 
        ]);

        //change datetime format that match database
        foreach($data['work_days'] as $key => $row){
            if($data['work_days'][$key]['start_time'] ?? 0 && data['work_days'][$key]['end_time'] ?? 0){ 
                $data['work_days'][$key]['start_time'] = Carbon::createFromFormat(config('panel.time_format'), $data['work_days'][$key]['start_time'])->format('H:i:s');
                $data['work_days'][$key]['end_time'] = Carbon::createFromFormat(config('panel.time_format'), $data['work_days'][$key]['end_time'])->format('H:i:s');
                $data['work_days'][$key]['day'] = $key;  
                $doctor->clinics()->attach( [ $request->clinic_id => $data['work_days'][$key] ]);
            }
        } 

        Alert::success('تم بنجاح', 'تم إضافة الإستشاري بنجاح ');

        return redirect()->route('admin.doctors.index');
    }

    public function edit(Doctor $doctor)
    {
        abort_if(Gate::denies('doctor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $users = User::pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $specializations = Specialization::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $clinics = Clinic::pluck('clinic_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $doctor->load('user', 'specialization', 'clinics');  
        
        
        $days = collect(doctor::WORK_DAYS_SELECT)->map(function($day) use ($doctor) {
            $check = $doctor->clinics()->wherePivot('day', $day['day'])->first();
            $day['value'] = $check ? 1 : null;
            $day['start_time'] = $check ? $check->pivot->start_time : null; 
            $day['start_time'] = $day['start_time'] ? Carbon::createFromFormat('H:i:s', $day['start_time'])->format(config('panel.time_format')) : null; 
            $day['end_time'] = $check ? $check->pivot->end_time : null; 
            $day['end_time'] = $day['end_time'] ? Carbon::createFromFormat('H:i:s', $day['end_time'])->format(config('panel.time_format')) : null; 
            return $day;
        });
        
        return view('admin.doctors.edit', compact('users', 'specializations', 'clinics', 'doctor','days'));

    }

    public function update(UpdateDoctorRequest $request, Doctor $doctor)
    {
        
        $data = $request->validated(); 
        
        $doctor->update ([
            'years_experience'=>$request->years_experience, 
            'cost'=>$request->cost, 
            'specialization_id'=> $request->specialization_id, 
        ]);

        $user = User::find($doctor->user_id);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'user_type' => 'doctor',
        ]);

        if ($request->input('photo', false)) {
            if (!$user->photo || $request->input('photo') !== $user->photo->file_name) {
                if ($user->photo) {
                    $user->photo->delete();
                }
                $user->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
            }
        } elseif ($user->photo) {
            $user->photo->delete();
        }

        $doctor->clinics()->detach($request->clinic_id);
        //change datetime format that match database
        foreach($data['work_days'] as $key => $row){
            if($data['work_days'][$key]['start_time'] ?? 0 && data['work_days'][$key]['end_time'] ?? 0){ 
                $data['work_days'][$key]['start_time'] = Carbon::createFromFormat(config('panel.time_format'), $data['work_days'][$key]['start_time'])->format('H:i:s');
                $data['work_days'][$key]['end_time'] = Carbon::createFromFormat(config('panel.time_format'), $data['work_days'][$key]['end_time'])->format('H:i:s');
                $data['work_days'][$key]['day'] = $key;  
                $doctor->clinics()->attach( [ $request->clinic_id => $data['work_days'][$key] ]);
            }
        } 

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
