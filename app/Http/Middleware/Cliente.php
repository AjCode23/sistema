<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;
use Redirect;
class Cliente
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

        if(Auth::user()->cliente){
         return $next($request);
        }else{
          
        return Redirect::to('/cliente/home');
    }
       
    
}
}