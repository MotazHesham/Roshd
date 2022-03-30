<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\push_notification;
use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\Student;
use App\Models\GroupStudent;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class CoursesController extends Controller
{
    use push_notification;

    public function courses(){
        $groups = Group::where('status','1')->orderBy('created_at','desc')->paginate(9);
        return view('frontend.courses',compact('groups'));
    }

    public function course($id){
        $group = Group::findOrFail($id);
        return view('frontend.course-single',compact('group'));
    }
    public function course_join($id){
        $group = Group::findOrFail($id);
        $student = Student::where('user_id',Auth::id())->first();

        $group_student = GroupStudent::where('student_id',$student->id)->where('group_id',$group->id)->first();

        if($group_student == null){
            $group_student = GroupStudent::create([
                'group_id' => $group->id,
                'student_id' => $student->id,
                'status' => 'requested',
                'course_cost' => $group->course_cost ,
            ]);
            Alert::success('تم أرسال الطلب');
            $alert_text = 'طلب انضمام جديد لدورة تدريبية من '.Auth::user()->name;
            $alert_link = $student->id;
            $data = [
                'user' => Auth::user()->name,
                'group_name' => $group->title,
            ];
            $this->send_notification( $alert_text , $alert_link , 'student_group',$data);
            return back();
        }else{
            Alert::warning('تم أرسال الطلب من قبل');
            return back();
        }
    }
}
