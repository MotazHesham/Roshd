<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCenterServiceRequest;
use App\Http\Requests\StoreCenterServiceRequest;
use App\Http\Requests\UpdateCenterServiceRequest;
use App\Models\CenterService;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Alert;

class CenterServiceController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('center_service_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $centerServices = CenterService::all();

        return view('admin.centerServices.index', compact('centerServices'));
    }

    public function create()
    {
        abort_if(Gate::denies('center_service_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.centerServices.create');
    }

    public function store(StoreCenterServiceRequest $request)
    {
        $centerService = CenterService::create($request->all());

    
    Alert::success('تم إضافة الخدمة بنجاح', 'تم بنجاح ');

        return redirect()->route('admin.center-services.index');
    }

    public function edit(CenterService $centerService)
    {
        abort_if(Gate::denies('center_service_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.centerServices.edit', compact('centerService'));
    }

    public function update(UpdateCenterServiceRequest $request, CenterService $centerService)
    {
        $centerService->update($request->all());

    
    Alert::success('تم تعديل الخدمة بنجاح', 'تم بنجاح ');

        return redirect()->route('admin.center-services.index');
    }

    public function show(CenterService $centerService)
    {
        abort_if(Gate::denies('center_service_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.centerServices.show', compact('centerService'));
    }

    public function destroy(CenterService $centerService)
    {
        abort_if(Gate::denies('center_service_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $centerService->delete();

    
    Alert::success('تم حذف الخدمة بنجاح', 'تم بنجاح ');

        return back();
    }

    public function massDestroy(MassDestroyCenterServiceRequest $request)
    {
        CenterService::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
