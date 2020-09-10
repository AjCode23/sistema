<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;
use Redirect;
use App\Config;
class change
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$guard=null)
    {

         if (!Auth::guard($guard)->check()) {
             
            return Redirect::to('/');
        }

        return $next($request);
    }
}
