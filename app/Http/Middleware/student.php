<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class student
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
    if(Auth::user()->user_type == 'patient'){ 
        return redirect()->route('patient.home');
    }elseif(Auth::user()->user_type == 'doctor'){ 
        return redirect()->route('doctor.home');
    }elseif(Auth::user()->user_type == 'staff'){ 
        return redirect()->route('staff.home');
    }
    return $next($request);
}
}
