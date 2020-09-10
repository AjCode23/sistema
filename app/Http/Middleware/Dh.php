<?php

namespace App\Http\Middleware;

use Closure;

class Dh
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
        if(Auth::user()->nivel == 1  || Auth::user()->modulo_id == 2 || Auth::user()->nivel == 10){
        return $next($request);
        }
        return Redirect::to('home');
    }
}
