<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class Secretaria
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
        # return 'hola';
        if(Auth::user()->nivel == 1 || Auth::user()->modulo_id == 3  || Auth::user()->nivel == 10){
        return $next($request);
        }
        return Redirect::to('home');
    }
}
