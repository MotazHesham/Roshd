<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;

class TeamsController extends Controller
{
    public function team(){
        $doctors = Doctor::with('user','doctorExperiences','doctorEducation')->orderBy('created_at','desc')->paginate(4);
        return view('frontend.team',compact('doctors'));
    }

    public function doctor($id){
        $doctor = Doctor::findOrFaiL($id);
        $doctor->load('doctorExperiences','doctorEducation','user','specialization');
        return view('frontend.doctor-single',compact('doctor'));
    }
}
