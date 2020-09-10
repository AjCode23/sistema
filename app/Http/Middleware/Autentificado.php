<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;
use Request;
use App\Config;
class Autentificado
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard=null)
    {
            
            if (!Auth::guard($guard)->check()) {
            return redirect('/');
        }

        if(Auth::user()->status == 0){
            Auth::logout();
            Session::flash('msj-danger','Disculpe! Usuario Desactivado...');
            return redirect('/home');

        }

        if(Auth::user()->status == 5){
            Session::flash('msj-info','Disculpe Es Obligatorio Cambiar La Contraseña...');
            return redirect('/change');
        }

        if(Request::path() == 'test'){

             return redirect('/home');
        }

        return $next($request);
    }
}
