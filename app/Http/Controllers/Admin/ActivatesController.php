<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyActivateRequest;
use App\Http\Requests\StoreActivateRequest;
use App\Http\Requests\UpdateActivateRequest;
use App\Models\Activate;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ActivatesController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('activate_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $activates = Activate::with(['media'])->get();

        return view('admin.activates.index', compact('activates'));
    }

    public function create()
    {
        abort_if(Gate::denies('activate_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.activates.create');
    }

    public function store(StoreActivateRequest $request)
    {
        $activate = Activate::create($request->all());

        if ($request->input('photo', false)) {
            $activate->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        if ($request->input('video', false)) {
            $activate->addMedia(storage_path('tmp/uploads/' . basename($request->input('video'))))->toMediaCollection('video');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $activate->id]);
        }

        return redirect()->route('admin.activates.index');
    }

    public function edit(Activate $activate)
    {
        abort_if(Gate::denies('activate_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.activates.edit', compact('activate'));
    }

    public function update(UpdateActivateRequest $request, Activate $activate)
    {
        $activate->update($request->all());

        if ($request->input('photo', false)) {
            if (!$activate->photo || $request->input('photo') !== $activate->photo->file_name) {
                if ($activate->photo) {
                    $activate->photo->delete();
                }
                $activate->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
            }
        } elseif ($activate->photo) {
            $activate->photo->delete();
        }

        if ($request->input('video', false)) {
            if (!$activate->video || $request->input('video') !== $activate->video->file_name) {
                if ($activate->video) {
                    $activate->video->delete();
                }
                $activate->addMedia(storage_path('tmp/uploads/' . basename($request->input('video'))))->toMediaCollection('video');
            }
        } elseif ($activate->video) {
            $activate->video->delete();
        }

        return redirect()->route('admin.activates.index');
    }

    public function show(Activate $activate)
    {
        abort_if(Gate::denies('activate_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.activates.show', compact('activate'));
    }

    public function destroy(Activate $activate)
    {
        abort_if(Gate::denies('activate_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $activate->delete();

        return back();
    }

    public function massDestroy(MassDestroyActivateRequest $request)
    {
        Activate::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('activate_create') && Gate::denies('activate_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Activate();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
