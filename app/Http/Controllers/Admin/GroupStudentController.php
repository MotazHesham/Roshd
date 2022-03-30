<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GroupStudent;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Traits\PaymentTrait;
use App\Http\Requests\StoreV2PaymentRequest;
use App\Models\Group;

class GroupStudentController extends Controller
{

    use PaymentTrait;

    public function store(StoreV2PaymentRequest $request){

        if(GroupStudent::where('group_id',$request->group_id)->where('student_id',$request->student_id)->first()){
            Alert::error('لم يتم الأضافة','هذا الطالب بالفعل في هذه الدورة');
            return back();
        }
        $group = Group::findOrFail($request->group_id);
        $groupStudent = GroupStudent::create([
            'group_id' => $request->group_id,
            'student_id' => $request->student_id,
            'status' => 'accepted',
            'course_cost' => $group->course_cost,
        ]);

        $this->store_payment($request->all(),'App\Models\GroupStudent',$groupStudent->id);

        Alert::success('تم بنجاح');

        return back();
    }

    public function change_status($raw_id , $status){
        $groupStudnet = GroupStudent::findOrFail($raw_id);
        $groupStudnet->status = $status;
        $groupStudnet->save();
        Alert::success('تم بنجاح');
        return back();
    }

    public function destroy($raw_id){
        $groupStudnet = GroupStudent::findOrFail($raw_id);
        $groupStudnet->delete();
        Alert::success('تم بنجاح');
        return back();
    }
}
