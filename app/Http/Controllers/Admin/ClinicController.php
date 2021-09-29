<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyClinicRequest;
use App\Http\Requests\StoreClinicRequest;
use App\Http\Requests\UpdateClinicRequest;
use App\Models\Clinic;
use App\Models\Specialization;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Alert;

class ClinicController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('clinic_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clinics = Clinic::with(['specializations'])->get();

        return view('admin.clinics.index', compact('clinics'));
    }

    public function create()
    {
        abort_if(Gate::denies('clinic_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $specializations = Specialization::pluck('name', 'id');

        return view('admin.clinics.create', compact('specializations'));
    }

    public function store(StoreClinicRequest $request)
    {
        $clinic = Clinic::create($request->all());
        $clinic->specializations()->sync($request->input('specializations', []));

    
    Alert::success('تم إضافة العيادة بنجاح', 'تم بنجاح ');
        return redirect()->route('admin.clinics.index');
    }

    public function edit(Clinic $clinic)
    {
        abort_if(Gate::denies('clinic_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $specializations = Specialization::pluck('name', 'id');

        $clinic->load('specializations');

        return view('admin.clinics.edit', compact('specializations', 'clinic'));
    }

    public function update(UpdateClinicRequest $request, Clinic $clinic)
    {
        $clinic->update($request->all());
        $clinic->specializations()->sync($request->input('specializations', []));

        Alert::success('تم تعديل العيادة بنجاح', 'تم بنجاح ');

        return redirect()->route('admin.clinics.index');
    }

    public function show(Clinic $clinic)
    {
        abort_if(Gate::denies('clinic_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clinic->load('specializations');

        return view('admin.clinics.show', compact('clinic'));
    }

    public function destroy(Clinic $clinic)
    {
        abort_if(Gate::denies('clinic_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clinic->delete();

    
    Alert::success('تم حذف العيادة بنجاح', 'تم بنجاح ');

        return back();
    }

    public function massDestroy(MassDestroyClinicRequest $request)
    {
        Clinic::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
