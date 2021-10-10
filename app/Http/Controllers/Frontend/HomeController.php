<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Activate;
use App\Models\Doctor;

class HomeController extends Controller
{
    public function home(){
        $setting = Setting::first();
        $activites = Activate::orderBy('updated_at','desc')->get()->take(3);
        $doctors = Doctor::with('user')->orderBy('created_at','desc')->get()->take(12);
        return view('frontend.home',compact('setting','activites','doctors'));
    }

    public function signup(){
        return view('frontend.signup');
    }
}
