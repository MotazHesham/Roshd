<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAdviceRequest;
use App\Http\Requests\StoreAdviceRequest;
use App\Http\Requests\UpdateAdviceRequest;
use App\Models\Advice;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Alert;

class AdviceController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('advice_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $advice = Advice::all();

        return view('admin.advice.index', compact('advice'));
    }

    public function create()
    {
        abort_if(Gate::denies('advice_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.advice.create');
    }

    public function store(StoreAdviceRequest $request)
    {
        $advice = Advice::create($request->all());

    Alert::success('تم بنجاح', 'تم إضافة الأستشارة بنجاح ');

        return redirect()->route('admin.advice.index');
    }

    public function edit(Advice $advice)
    {
        abort_if(Gate::denies('advice_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.advice.edit', compact('advice'));
    }

    public function update(UpdateAdviceRequest $request, Advice $advice)
    {
        $advice->update($request->all());

        return redirect()->route('admin.advice.index');
    }

    public function show(Advice $advice)
    {
        abort_if(Gate::denies('advice_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.advice.show', compact('advice'));
    }

    public function destroy(Advice $advice)
    {
        abort_if(Gate::denies('advice_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $advice->delete();

        return back();
    }

    public function massDestroy(MassDestroyAdviceRequest $request)
    {
        Advice::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
