<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEducationRequest;
use App\Http\Requests\StoreEducationRequest;
use App\Http\Requests\UpdateEducationRequest;
use App\Models\Doctor;
use App\Models\TypesOfDegree;
use App\Models\Education;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Alert;

class EducationController extends Controller
{
    public function index()
    { 
  
        $education = Education::with(['doctor', 'degree'])->get();

        return view('admin.education.index', compact('education'));
    }

    public function create($doctor_id)
    { 
       // $doctors = Doctor::with('user')->get()->pluck('user.email', 'id')->prepend(trans('global.pleaseSelect'), '');
 
        $doctor=Doctor::findOrfail($doctor_id);
        $doctor->load('user');
        $degrees = TypesOfDegree::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.education.create', compact('doctor','degrees'));
    }

    public function store(StoreEducationRequest $request)
    {
        
        $education = Education::create($request->all());


    Alert::success('تم بنجاح', 'تم إضافة الدرجة العلمية بنجاح ');

    return redirect()->route('admin.doctors.show',$request->doctor_id);
    }

    public function edit(Education $education)
    { 

        $doctors = Doctor::with('user')->get()->pluck('user.email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $degrees = TypesOfDegree::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $education->load('doctor', 'degree');

        return view('admin.education.edit', compact('degrees', 'doctors', 'education'));
    }

    public function update(UpdateEducationRequest $request, Education $education)
    {
        $education->update($request->all());


    Alert::success('تم بنجاح', 'تم تعديل الدرجة العلمية بنجاح ');

    return redirect()->route('admin.doctors.show',$request->doctor_id);
    }

    public function show(Education $education)
    { 

        $education->load('doctor', 'degree');

        return view('admin.education.show', compact('education'));
    }

    public function destroy(Education $education)
    { 

        $education->delete();

    Alert::success('تم بنجاح', 'تم حذف الدرجة العلمية بنجاح ');

        return back();
    }

    public function massDestroy(MassDestroyEducationRequest $request)
    {
        Education::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
