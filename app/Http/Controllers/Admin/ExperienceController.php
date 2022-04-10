<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyExperienceRequest;
use App\Http\Requests\StoreExperienceRequest;
use App\Http\Requests\UpdateExperienceRequest;
use App\Models\Doctor;
use App\Models\Experience;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Alert;

class ExperienceController extends Controller
{
    public function index()
    { 

        $experiences = Experience::with(['doctor'])->get();

        return view('admin.experiences.index', compact('experiences'));
    }

    public function create($doctor_id)
    { 
       // $doctors = Doctor::with('user')->get()->pluck('user.email', 'id')->prepend(trans('global.pleaseSelect'), '');
 
        $doctor=Doctor::findOrfail($doctor_id);
        $doctor->load('user');

        return view('admin.experiences.create', compact('doctor'));
    }

    public function store(StoreExperienceRequest $request)
    {
        $experience = Experience::create($request->all());


        Alert::success('تم بنجاح', 'تم  إضافة الخبرة العملية بنجاح ');

        return redirect()->route('admin.doctors.show',$request->doctor_id);
    }

    public function edit(Experience $experience)
    { 

        $doctors = Doctor::with('user')->get()->pluck('user.email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $experience->load('doctor');

        return view('admin.experiences.edit', compact('doctors', 'experience'));
    }

    public function update(UpdateExperienceRequest $request, Experience $experience)
    {
        $experience->update($request->all());


        Alert::success('تم بنجاح', 'تم تعديل الخبرة العملية بنجاح ');

        return redirect()->route('admin.doctors.show',$request->doctor_id);
    }

    public function show(Experience $experience)
    { 

        $experience->load('doctor');

        return view('admin.experiences.show', compact('experience'));
    }

    public function destroy(Experience $experience)
    { 

        $experience->delete();


    Alert::success('تم بنجاح', 'تم حذف الخبرة العملية بنجاح ');

        return back();
    }

    public function massDestroy(MassDestroyExperienceRequest $request)
    {
        Experience::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
