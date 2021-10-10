<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Activate;

class ActivtiesController extends Controller
{
    public function activties(){
        $activites = Activate::orderBy('created_at','desc')->paginate(8);
        return view('frontend.activties',compact('activites'));
    }

    public function activity($id){
        $activate = Activate::findOrFail($id);
        return view('frontend.activity-single',compact('activate'));
    }
}
