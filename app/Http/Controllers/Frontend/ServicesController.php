<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Service;

class ServicesController extends Controller
{
    public function services(){
        $setting = Setting::first();
        $services = Service::with(['media'])->get();
        return view('frontend.services',compact('setting','services'));
    }

   
    public function service($id){
        $service = Service::findOrfail($id);
        return view('frontend.service-single',compact('service'));
    }
}

