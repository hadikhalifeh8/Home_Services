<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthSproviderMen
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
        if(Auth::user()->utype === 'SVP')
        {
            return $next($request);
        }
        else{
              session()->flush();
              
              return redirect()->route('login')->with(Auth::logout());;
        }
    }
}
