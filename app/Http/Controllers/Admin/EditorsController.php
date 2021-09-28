<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEditorRequest;
use App\Http\Requests\StoreEditorRequest;
use App\Http\Requests\UpdateEditorRequest;
use App\Models\Editor;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EditorsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('editor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $editors = Editor::with(['user'])->get();

        return view('admin.editors.index', compact('editors'));
    }

    public function create()
    {
        abort_if(Gate::denies('editor_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.editors.create', compact('users'));
    }

    public function store(StoreEditorRequest $request)
    {
        $editor = Editor::create($request->all());

        return redirect()->route('admin.editors.index');
    }

    public function edit(Editor $editor)
    {
        abort_if(Gate::denies('editor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $editor->load('user');

        return view('admin.editors.edit', compact('users', 'editor'));
    }

    public function update(UpdateEditorRequest $request, Editor $editor)
    {
        $editor->update($request->all());

        return redirect()->route('admin.editors.index');
    }

    public function show(Editor $editor)
    {
        abort_if(Gate::denies('editor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $editor->load('user');

        return view('admin.editors.show', compact('editor'));
    }

    public function destroy(Editor $editor)
    {
        abort_if(Gate::denies('editor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $editor->delete();

        return back();
    }

    public function massDestroy(MassDestroyEditorRequest $request)
    {
        Editor::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
