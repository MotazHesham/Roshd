<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use App\Http\Requests\StoreAdviceRequest; 
use App\Models\Advice;
use Alert;

class ConsultingController extends Controller
{
    public function consulting(){
        return view('frontend.consulting');
    }

    public function store(StoreAdviceRequest $request)
    {

        $advice = Advice::create($request->all());

        Alert::success('تم بنجاح', 'تم إضافة الأستشارة بنجاح ');

        return view('frontend.consulting');
    }
}
