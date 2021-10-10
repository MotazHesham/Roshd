<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class ServicesController extends Controller
{
    public function services(){
        return view('frontend.services');
    }

    public function service($type){
        $setting = Setting::first();
        if($type == 'familly_advice'){ 
            $title = 'الاستشارات الاسرية';
            $desc = $setting->familly_advice;
        }elseif($type == 'individual_advice'){
            $title = 'الاستشارات الفردية';
            $desc = $setting->individual_advice;
        }elseif($type == 'el_gadaly_elsloky'){
            $title = 'علاج الجدلي السلوكي';
            $desc = $setting->el_gadaly_elsloky;
        }elseif($type == 'el_maarefe_elsloky'){
            $title = 'علاج المعرفي السلوكي';
            $desc = $setting-'el_maarefe_elsloky';
        }elseif($type == 'art_therapy'){
            $title = 'العلاج بالفن';
            $desc = $setting->art_therapy;
        }elseif($type == 'play_therapy'){
            $title = 'العلاج باللعب';
            $desc = $setting->play_therapy;
        }else{
            abort(404);
        }
        return view('frontend.service-single',compact('title','desc'));
    }
}
