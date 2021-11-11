<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\Student;
use Alert;
use Auth;
class CoursesController extends Controller
{
    public function courses(){
        $groups = Group::orderBy('created_at','desc')->paginate(9);
        return view('frontend.courses',compact('groups'));
    }

    public function course($id){
        $group = Group::findOrFail($id);
        return view('frontend.course-single',compact('group'));
    }
    public function course_join($id){
        $group = Group::findOrFail($id);
        $student = Student::where('user_id',Auth::id())->first();
        $group_student = $group->students()->wherePivot('student_id',$student->id)->first();

        if($group_student == null){
            $group->students()->sync([
                $student->id => [
                    'status' => 'requested', 
                ]
            ]); 
            Alert::success('تم أرسال الطلب');
            return back();
        }else{
            Alert::warning('تم أرسال الطلب من قبل');
            return back();
        }
    }
}
