<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Http\Requests\StoreContactuRequest;
use App\Models\Contactu;
use Alert;

class ContactUsController extends Controller
{
    public function contactus(){
        $setting = Setting::first();
        return view('frontend.contactus',compact('setting'));
    }

    public function store(StoreContactuRequest $request)
    {
        $contactu = Contactu::create($request->all());

        Alert::success('تم بنجاح');

        return redirect()->route('frontend.contactus');
    }
}
