<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPrecentageContractRequest;
use App\Http\Requests\StorePrecentageContractRequest;
use App\Http\Requests\UpdatePrecentageContractRequest;
use App\Models\Doctor;
use App\Models\PrecentageContract;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Alert;

class PrecentageContractController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('precentage_contract_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $precentageContracts = PrecentageContract::with(['doctor'])->get();

        return view('admin.precentageContracts.index', compact('precentageContracts'));
    }

    public function create()
    {
        abort_if(Gate::denies('precentage_contract_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $doctors = Doctor::with('user')->get()->pluck('user.email', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.precentageContracts.create', compact('doctors'));
    }

    public function store(StorePrecentageContractRequest $request)
    {
        $precentageContract = PrecentageContract::create($request->all());

        Alert::success('تم بنجاح', 'تم إضافة النسبة للأستشارى بنجاح ');

        return redirect()->route('admin.doctors.show',$request->doctor_id);
    }

    public function edit(PrecentageContract $precentageContract)
    {
        abort_if(Gate::denies('precentage_contract_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $doctors = Doctor::with('user')->get()->pluck('user.email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $precentageContract->load('doctor');

        return view('admin.precentageContracts.edit', compact('doctors', 'precentageContract'));
    }

    public function update(UpdatePrecentageContractRequest $request, PrecentageContract $precentageContract)
    {
        $precentageContract->update($request->all());

        Alert::success('تم بنجاح', 'تم  تعديل نسبةالأستشاري بنجاح ');

        return redirect()->route('admin.doctors.show',$request->doctor_id);
    }

    public function show(PrecentageContract $precentageContract)
    {
        abort_if(Gate::denies('precentage_contract_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $precentageContract->load('doctor');

        return view('admin.precentageContracts.show', compact('precentageContract'));
    }

    public function destroy(PrecentageContract $precentageContract)
    {
        abort_if(Gate::denies('precentage_contract_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $precentageContract->delete();

        Alert::success('تم بنجاح', 'تم  حذف نسبة الأستشاري بنجاح ');

        return back();
    }

    public function massDestroy(MassDestroyPrecentageContractRequest $request)
    {
        PrecentageContract::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
