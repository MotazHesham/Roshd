<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEducationRequest;
use App\Http\Requests\StoreEducationRequest;
use App\Http\Requests\UpdateEducationRequest;
use App\Models\Doctor;
use App\Models\Education;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Alert;

class EducationController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('education_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $education = Education::with(['doctor'])->get();

        return view('admin.education.index', compact('education'));
    }

    public function create()
    {
        abort_if(Gate::denies('education_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $doctors = Doctor::with('user')->get()->pluck('user.email', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.education.create', compact('doctors'));
    }

    public function store(StoreEducationRequest $request)
    {
        $education = Education::create($request->all());


    Alert::success('تم بنجاح', 'تم إضافة الدرجة العلمية بنجاح ');

        return redirect()->route('admin.education.index');
    }

    public function edit(Education $education)
    {
        abort_if(Gate::denies('education_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $doctors = Doctor::with('user')->get()->pluck('user.email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $education->load('doctor');

        return view('admin.education.edit', compact('doctors', 'education'));
    }

    public function update(UpdateEducationRequest $request, Education $education)
    {
        $education->update($request->all());


    Alert::success('تم بنجاح', 'تم تعديل الدرجة العلمية بنجاح ');

        return redirect()->route('admin.education.index');
    }

    public function show(Education $education)
    {
        abort_if(Gate::denies('education_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $education->load('doctor');

        return view('admin.education.show', compact('education'));
    }

    public function destroy(Education $education)
    {
        abort_if(Gate::denies('education_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
