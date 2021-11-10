<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyGroupRequest;
use App\Http\Requests\StoreGroupRequest;
use App\Http\Requests\UpdateGroupRequest;
use App\Models\Group;
use App\Models\Student;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;
use Alert;

class GroupController extends Controller
{
    use MediaUploadingTrait;

    public function store_student(Request $request){
        
        $group = Group::findOrFail($request->group_id);  
        
        $group->students()->sync([
            $request->student_id => [
                'status' => $request->status,
                'payment_status' => $request->payment_status,
                'payment_type' => $request->payment_type,
                'transfer_name' => $request->transfer_name,
                'reference_number' => $request->reference_number, 
            ]
        ]); 

        Alert::success('تم بنجاح');

        return redirect()->route('admin.groups.show',$request->group_id);
    }

    public function update_student(Request $request){
        $group = Group::findOrFail($request->group_id);
        $group->students()->syncWithoutDetaching([
            $request->student_id => [
                'status' => $request->status,
                'payment_status' => $request->payment_status,
                'payment_type' => $request->payment_type,
                'transfer_name' => $request->transfer_name,
                'reference_number' => $request->reference_number, 
            ]
        ]); 
        Alert::success('تم بنجاح');

        return redirect()->route('admin.groups.show',$request->group_id);
    }

    public function edit_student($group_id){
        $group = Group::findOrFail($group_id);
        $student = $group->students()->first();
        return view('admin.groups.partials.edit_student',compact('group','student'));
    }

    public function destroy_student($group_id){ 

        $group = group::findOrFail($group_id);
        $group->students()->detach();
        
        Alert::success('تم بنجاح');
        return redirect()->route('admin.groups.show',$group->id);
    }

    public function index(Request $request)
    {
        abort_if(Gate::denies('group_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Group::with(['user', 'students'])->select(sprintf('%s.*', (new Group())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'group_show';
                $editGate = 'group_edit';
                $deleteGate = 'group_delete';
                $crudRoutePart = 'groups';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });

            $table->editColumn('course_hours', function ($row) {
                return $row->course_hours ? $row->course_hours : '';
            });
            $table->editColumn('course_cost', function ($row) {
                return $row->course_cost ? $row->course_cost : '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? Group::STATUS_RADIO[$row->status] : '';
            });
            $table->addColumn('user_email', function ($row) {
                return $row->user ? $row->user->email : '';
            });

            $table->editColumn('photo', function ($row) {
                if ($photo = $row->photo) {
                    return sprintf(
        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
        $photo->url,
        $photo->thumbnail
    );
                }

                return '';
            });

            $table->rawColumns(['actions', 'placeholder', 'user', 'photo']);

            return $table->make(true);
        }

        return view('admin.groups.index');
    }

    public function create()
    {
        abort_if(Gate::denies('group_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::where('user_type','staff')->get()->pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $students = Student::with('user')->get()->pluck('user.email', 'id');

        return view('admin.groups.create', compact('users', 'students'));
    }

    public function store(StoreGroupRequest $request)
    {
        $group = Group::create($request->all());
        $group->students()->sync($request->input('students', []));
        if ($request->input('photo', false)) {
            $group->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $group->id]);
        }


     Alert::success('تم بنجاح', 'تم إضافة المجموعة بنجاح ');

        return redirect()->route('admin.groups.index');
    }

    public function edit(Group $group)
    {
        abort_if(Gate::denies('group_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::where('user_type','staff')->get()->pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $students =Student::with('user')->get()->pluck('user.email', 'id');
        
        $group->load('user', 'students');

        return view('admin.groups.edit', compact('users', 'students', 'group'));
    }

    public function update(UpdateGroupRequest $request, Group $group)
    {
        $group->update($request->all());
        $group->students()->sync($request->input('students', []));
        if ($request->input('photo', false)) {
            if (!$group->photo || $request->input('photo') !== $group->photo->file_name) {
                if ($group->photo) {
                    $group->photo->delete();
                }
                $group->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
            }
        } elseif ($group->photo) {
            $group->photo->delete();
        }
        Alert::success('تم بنجاح', 'تم تعديل المجموعة بنجاح ');
        return redirect()->route('admin.groups.index');
    }

    public function show(Group $group)
    {
        abort_if(Gate::denies('group_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $group->load('user', 'students');

        return view('admin.groups.show', compact('group'));
    }

    public function destroy(Group $group)
    {
        abort_if(Gate::denies('group_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $group->delete();
        Alert::success('تم بنجاح', 'تم حذف المجموعة بنجاح ');

        return back();
    }

    public function massDestroy(MassDestroyGroupRequest $request)
    {
        Group::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('group_create') && Gate::denies('group_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Group();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
