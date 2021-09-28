<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAllowanceRequest;
use App\Http\Requests\StoreAllowanceRequest;
use App\Http\Requests\UpdateAllowanceRequest;
use App\Models\Allowance;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AllowancesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('allowance_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $allowances = Allowance::all();

        return view('admin.allowances.index', compact('allowances'));
    }

    public function create()
    {
        abort_if(Gate::denies('allowance_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.allowances.create');
    }

    public function store(StoreAllowanceRequest $request)
    {
        $allowance = Allowance::create($request->all());

        return redirect()->route('admin.allowances.index');
    }

    public function edit(Allowance $allowance)
    {
        abort_if(Gate::denies('allowance_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.allowances.edit', compact('allowance'));
    }

    public function update(UpdateAllowanceRequest $request, Allowance $allowance)
    {
        $allowance->update($request->all());

        return redirect()->route('admin.allowances.index');
    }

    public function show(Allowance $allowance)
    {
        abort_if(Gate::denies('allowance_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.allowances.show', compact('allowance'));
    }

    public function destroy(Allowance $allowance)
    {
        abort_if(Gate::denies('allowance_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $allowance->delete();

        return back();
    }

    public function massDestroy(MassDestroyAllowanceRequest $request)
    {
        Allowance::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
