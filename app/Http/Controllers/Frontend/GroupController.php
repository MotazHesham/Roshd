<?php

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyGroupRequest;
use App\Http\Requests\StoreGroupRequest;
use App\Http\Requests\UpdateGroupRequest;
use App\Models\Group;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;
use Alert;
use Auth;

class GroupController extends Controller
{
    use MediaUploadingTrait; 

    public function index(Request $request)
    {  
        $student = Student::where('user_id',Auth::id())->first(); 
        
        $groups = $student->studentsGroups;

        return view('frontend.groups.index',compact('groups'));
    }

    public function create()
    {

        $users = User::where('user_type','staff')->get()->pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $students = Student::with('user')->get()->pluck('user.email', 'id');

        return view('frontend.groups.create', compact('users', 'students'));
    }

    public function store(Request $request)
    {

        $student=Student::where('user_id',Auth::id())->first();
        $student->update([
            'specialization_id'=> $request->specialization_id]);
        $student->studentsGroups()->sync([
                $request->group_id => [
                    'status' => 'requested', 
                ]
            ]); 

     Alert::success('تم بنجاح', 'تم الاشتراك في الدورة بنجاح ');

        return redirect()->route('frontend.groups.index');
    }

    public function edit(Group $group)
    {

        $users = User::where('user_type','staff')->get()->pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $students =Student::with('user')->get()->pluck('user.email', 'id');
        
        $group->load('user', 'students');

        return view('frontend.groups.edit', compact('users', 'students', 'group'));
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
        return redirect()->route('student.groups.index');
    }

    public function show(Group $group)
    { 

        $group->load('user', 'students');

        return view('frontend.groups.show', compact('group'));
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

        $model         = new Group();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
