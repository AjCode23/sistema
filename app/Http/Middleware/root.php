<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class root
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
    //  return Auth::user();
        if(Auth::user()->nivel != '1' ){
            return redirect('AdminErno');
        }
        return $next($request);
    }
}
