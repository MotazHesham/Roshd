<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTypesOfDegreeRequest;
use App\Http\Requests\StoreTypesOfDegreeRequest;
use App\Http\Requests\UpdateTypesOfDegreeRequest;
use App\Models\TypesOfDegree;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TypesOfDegreesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('types_of_degree_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $typesOfDegrees = TypesOfDegree::all();

        return view('admin.typesOfDegrees.index', compact('typesOfDegrees'));
    }

    public function create()
    {
        abort_if(Gate::denies('types_of_degree_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.typesOfDegrees.create');
    }

    public function store(StoreTypesOfDegreeRequest $request)
    {
        $typesOfDegree = TypesOfDegree::create($request->all());

        return redirect()->route('admin.types-of-degrees.index');
    }

    public function edit(TypesOfDegree $typesOfDegree)
    {
        abort_if(Gate::denies('types_of_degree_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.typesOfDegrees.edit', compact('typesOfDegree'));
    }

    public function update(UpdateTypesOfDegreeRequest $request, TypesOfDegree $typesOfDegree)
    {
        $typesOfDegree->update($request->all());

        return redirect()->route('admin.types-of-degrees.index');
    }

    public function show(TypesOfDegree $typesOfDegree)
    {
        abort_if(Gate::denies('types_of_degree_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.typesOfDegrees.show', compact('typesOfDegree'));
    }

    public function destroy(TypesOfDegree $typesOfDegree)
    {
        abort_if(Gate::denies('types_of_degree_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $typesOfDegree->delete();

        return back();
    }

    public function massDestroy(MassDestroyTypesOfDegreeRequest $request)
    {
        TypesOfDegree::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
