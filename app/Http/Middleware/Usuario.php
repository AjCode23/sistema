<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Redirect;
use Session;
class Usuario
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
       
        if(!Auth::user()->cliente){

        return $next($request);
        }
        Session::flash('message-warning','Disculpe Esta tratando de ingresar a un modulo exclusivo para usuarios del departamento de personal... lo sentimos espacio restringido!');
    
        return Redirect::to('cliente/home');
    }
}
