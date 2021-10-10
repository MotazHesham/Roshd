<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Group;

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
}
