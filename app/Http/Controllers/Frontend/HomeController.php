<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Activate;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Student;
use App\Models\User;
use App\Models\Group;
use App\Models\Service;
use App\Http\Requests\SignupUser;
use Alert;
use Auth;

class HomeController extends Controller
{
    public function home(){
        $setting = Setting::first();
        $activites = Activate::orderBy('updated_at','desc')->get()->take(3);
        $doctors = Doctor::with('user')->orderBy('created_at','desc')->get()->take(12);
        $groups = Group::with('user')->orderBy('created_at','desc')->get()->take(4);
        $services = Service::with(['media'])->get();
        return view('frontend.home',compact('setting','activites','doctors','groups','services'));
    }

    public function signup(){
        return view('frontend.signup');
    }

    public function signup_user(SignupUser $request){ 
    
        
        if($request->user_type == 'patient'){
            $user = User::create($request->all());
            Patient::create(['user_id' => $user->id]);
            Alert::success('تم بنجاح');
            return redirect()->route('frontend.home');  
        }elseif($request->user_type == 'student'){
            $user = User::create($request->all());
            $student = Student::create ([
                'user_id'=>$user->id,
                'specialization_id'=> $request->specialization_id,
            ]);
           /* $student->studentsGroups()->sync([
                $request->group_id => [
                    'status' => 'requested', 
                ]
            ]); */
        }else{  
            Alert::error('حدث خطأ');

            return view('frontend.signup');
        }
        //Alert::success('تم بنجاح');

        //return view('frontend.signup');
    }
    public function UpdateProfile(Request $request ){
         $user=User::findOrfail(Auth::id());
         $user->update($request->all());
         Alert::success('تم تعديل البيانات بنجاح','تم بنجاح');
         return redirect()->route('frontend.account');  

    }
}
