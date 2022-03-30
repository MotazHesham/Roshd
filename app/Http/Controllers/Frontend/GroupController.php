<?php

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\GroupStudent;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class GroupController extends Controller
{

    public function index(Request $request)
    {
        $student = Student::where('user_id',Auth::id())->first();

        $groups = GroupStudent::with(['payments','group'])->where('student_id',$student->id)->orderBy('created_at')->paginate(10);

        return view('frontend.groups.index',compact('groups'));
    }

    public function create()
    {

        $users = User::where('user_type','staff')->get()->pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $students = Student::with('user')->get()->pluck('user.email', 'id');

        //return view('frontend.groups.create', compact('users', 'students'));
    }

    public function store(Request $request)
    {

        // $student=Student::where('user_id',Auth::id())->first();
        // $student->update([
        //     'specialization_id'=> $request->specialization_id]);
        // $student->studentsGroups()->sync([
        //         $request->group_id => [
        //             'status' => 'requested',
        //         ]
        //     ]);

        // Alert::success('تم بنجاح', 'تم الاشتراك في الدورة بنجاح ');

        // return redirect()->route('frontend.groups.index');
    }

    public function destroy($id)
    {
        $group_student = GroupStudent::findOrFail($id);

        $group_student->delete();
        Alert::success('تم بنجاح', 'تم حذف المجموعة بنجاح ');

        return back();
    }
}
