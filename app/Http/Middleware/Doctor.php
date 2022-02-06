<?php

namespace App\Http\Middleware;

use Closure;

use Auth;
class Doctor
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
        if(Auth::user()->user_type == 'staff'){
            return redirect()->route('admin.home');
        }elseif(Auth::user()->user_type == 'patient'){
            return redirect()->route('frontend.reservations.create');  
        }elseif(Auth::user()->user_type == 'student'){
            return redirect()->route('frontend.groups.create');
        }
        return $next($request);
    }
}
