<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;
//use Illuminate\Auth\Middleware\AuthAdmin as Middleware;

class AuthAdmin 
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
        if(Auth::User()->utype === 'ADM')
        {
            return $next($request);
        }
        else{
           

              session()->flush();
              
              return redirect()->route('login')->with(Auth::logout());
        }
    }
}
