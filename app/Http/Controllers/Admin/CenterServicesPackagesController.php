<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCenterServicesPackageRequest;
use App\Http\Requests\StoreCenterServicesPackageRequest;
use App\Http\Requests\UpdateCenterServicesPackageRequest;
use App\Models\CenterServicesPackage;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CenterServicesPackagesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('center_services_package_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $centerServicesPackages = CenterServicesPackage::all();

        return view('admin.centerServicesPackages.index', compact('centerServicesPackages'));
    }

    public function create()
    {
        abort_if(Gate::denies('center_services_package_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.centerServicesPackages.create');
    }

    public function store(StoreCenterServicesPackageRequest $request)
    {
        $centerServicesPackage = CenterServicesPackage::create($request->all());

        return redirect()->route('admin.center-services-packages.index');
    }

    public function edit(CenterServicesPackage $centerServicesPackage)
    {
        abort_if(Gate::denies('center_services_package_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.centerServicesPackages.edit', compact('centerServicesPackage'));
    }

    public function update(UpdateCenterServicesPackageRequest $request, CenterServicesPackage $centerServicesPackage)
    {
        $centerServicesPackage->update($request->all());

        return redirect()->route('admin.center-services-packages.index');
    }

    public function show(CenterServicesPackage $centerServicesPackage)
    {
        abort_if(Gate::denies('center_services_package_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.centerServicesPackages.show', compact('centerServicesPackage'));
    }

    public function destroy(CenterServicesPackage $centerServicesPackage)
    {
        abort_if(Gate::denies('center_services_package_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $centerServicesPackage->delete();

        return back();
    }

    public function massDestroy(MassDestroyCenterServicesPackageRequest $request)
    {
        CenterServicesPackage::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
