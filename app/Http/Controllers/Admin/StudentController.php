<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyStudentRequest;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Specialization;
use App\Models\Student;
use App\Models\Income;
use App\Models\User;
use App\Models\Setting;
use App\Models\Group;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Alert;

class StudentController extends Controller
{
    public function store_group(Request $request){
        
        $setting = Setting::first();

        if($setting->income_category_group_id != null){
            $student = Student::findOrFail($request->student_id);  
            $group = Group::findOrFail($request->group_id);  
            
            $student->studentsGroups()->syncWithoutDetaching([
                $request->group_id => [
                    'status' => $request->status,
                    'payment_status' => $request->payment_status,
                    'payment_type' => $request->payment_type,
                    'transfer_name' => $request->transfer_name,
                    'reference_number' => $request->reference_number, 
                ]
            ]); 
            if($request->payment_status == 'paid'){ 
                Income::create([
                    'income_category_id' => $setting->income_category_group_id,
                    'entry_date' => date(config('panel.date_format'),strtotime('now')),
                    'amount' => $group->course_cost,
                    'relation_id' => $request->group_id,
                    'description' => 'الطالب: ' . $student->user->name ,
                ]);

            }
            Alert::success('تم بنجاح');

            return redirect()->route('admin.students.show',$request->student_id);
        }else{
            Alert::warning('حدث خطأ','من فضلك اختر تصنيف ايراد للدورات أولا');
            return redirect()->route('admin.settings.index');
        }
    }

    public function update_group(Request $request){
        $setting = Setting::first();
        if($setting->income_category_group_id != null){
            $student = student::findOrFail($request->student_id);  
            $group = Group::findOrFail($request->group_id);  
            $student->studentsGroups()->syncWithoutDetaching([
                $request->group_id => [
                    'status' => $request->status,
                    'payment_status' => $request->payment_status,
                    'payment_type' => $request->payment_type,
                    'transfer_name' => $request->transfer_name,
                    'reference_number' => $request->reference_number, 
                ]
            ]); 
            if($request->payment_status == 'paid'){ 
                Income::create([
                    'income_category_id' => $setting->income_category_group_id,
                    'entry_date' => date(config('panel.date_format'),strtotime('now')),
                    'amount' => $group->course_cost,
                    'relation_id' => $request->group_id,
                    'description' => 'الطالب: ' . $student->user->name ,
                ]);

            }
            Alert::success('تم بنجاح');

            return redirect()->route('admin.students.show',$student->id);
        }else{
            Alert::warning('حدث خطأ','من فضلك اختر تصنيف ايراد للدورات أولا');
            return redirect()->route('admin.settings.index');
        }
    }

    public function edit_group($student_id,$group_id){
        $student = student::findOrFail($student_id);  
        $group = $student->studentsGroups()->wherePivot('group_id',$group_id)->first();
        return view('admin.students.partials.edit_group',compact('group','student'));
    }

    public function destroy_group($student_id,$group_id){ 

        $student = student::findOrFail($student_id);  
        $student->studentsGroups()->wherePivot('group_id',$group_id)->detach();
        
        Alert::success('تم بنجاح');
        return redirect()->route('admin.students.show',$student->id);
    }

    public function index()
    {
        abort_if(Gate::denies('student_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $students = Student::with(['specialization', 'user'])->get();

        return view('admin.students.index', compact('students'));
    }

    public function create()
    {
        abort_if(Gate::denies('student_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $specializations = Specialization::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.students.create', compact('specializations', 'users'));
    }

    public function store(StoreStudentRequest $request)
    {
    
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'user_type' => 'student',
        ]);
        Student::create ([
            'hours'=>$request->hours,
            'user_id'=>$user->id,
            'specialization_id'=> $request->specialization_id,
        ]);


        Alert::success('تم  بنجاح', 'تم إضافة الطالبة بنجاح ');

        return redirect()->route('admin.students.index');
    }

    public function edit(Student $student)
    {
        abort_if(Gate::denies('student_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $specializations = Specialization::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $student->load('specialization', 'user');

        return view('admin.students.edit', compact('specializations', 'users', 'student'));
    }

    public function update(UpdateStudentRequest $request, Student $student)
    {
        $student->update ([
            'hours'=>$request->hours,
            'specialization_id'=> $request->specialization_id,
        ]);
        $user = User::find($student->user_id);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'user_type' => 'student',
        ]);
       
        Alert::success('تم  بنجاح', 'تم تعديل بيانات الطالبة بنجاح ');

        return redirect()->route('admin.students.index');
    }

    public function show(Student $student)
    {
        abort_if(Gate::denies('student_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $student->load('specialization', 'user');

        return view('admin.students.show', compact('student'));
    }

    public function destroy(Student $student)
    {
        abort_if(Gate::denies('student_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $student->delete();
        Alert::success('تم  بنجاح', 'تمحذف بيانات الطالبة بنجاح ');

        return back();
    }

    public function massDestroy(MassDestroyStudentRequest $request)
    {
        Student::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
