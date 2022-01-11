<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class ServicesController extends Controller
{
    public function services(){
        $setting = Setting::first();
        return view('frontend.services',compact('setting'));
    }

    public function service($type){
        $setting = Setting::first();
        if($type == 'familly_advice'){ 
            $title = 'الاستشارات الاسرية';
            $desc = $setting->familly_advice;
            $id=1;
        }elseif($type == 'individual_advice'){
            $title = 'الاستشارات الفردية';
            $desc = $setting->individual_advice;
            $id=2;
        }elseif($type == 'el_gadaly_elsloky'){
            $title = 'علاج الجدلي السلوكي';
            $desc = $setting->el_gadaly_elsloky;
            $id=3;
        }elseif($type == 'el_maarefe_elsloky'){
            $title = 'علاج المعرفي السلوكي';
            $desc = $setting->el_maarefe_elsloky;
            $id=4;
        }elseif($type == 'art_therapy'){
            $title = 'العلاج بالفن';
            $desc = $setting->art_therapy;
            $id=5;
        }elseif($type == 'play_therapy'){
            $title = 'العلاج باللعب';
            $desc = $setting->play_therapy;
            $id=6;
        }else{
            abort(404);
        }
        return view('frontend.service-single',compact('title','desc','id'));
    }
}
