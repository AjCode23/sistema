<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Redirect;
use Session;
use App\Config;
class LogController extends Controller
{



public function __construct()
{
   $this->middleware('change', ['only' => ['change','changepass']]);
}
    
    public function login(Request $request){
    //   return $request->all();
         if(Auth::attempt(['usuario'=>$request->usuario,'password'=>$request->password])){
            
            if(Auth::user()->status == 0){
               Session::flash('msj-danger','las credenciales no concuerdan con nuestros registros');
                Auth::logout();
               return redirect('/');
            }
            return Redirect::to('/home');
        } else{
            Session::flash('msj-danger','las credenciales no concuerdan con nuestros registros');
            return back();
            
        }
    }

    public function logout(){

    	Auth::logout();
    	return Redirect::to('/');

    }
    public function change(){


      return view('change');
    }

    public function logCliente(){
      return view('auth.logCliente');
    }


     public function loginCliente(Request $request){
        
         if(Auth::attempt(['usuario'=>$request->usuario,'password'=>$request->password])){
            
               // session('config',Config::first());
            return Redirect::to('cliente/home');
        } else{
            Session::flash('msj-danger','las credenciales no concuerdan con nuestros registros');
            return back();
            
        }
    }



    public function changepass(Request $request){
      //return $request->all();
       $pass=bcrypt($request->password);
      $user=Auth::user();
       $b=$user->password;
      if($request->password != '123456'){

      $user->update([
        'password'=>$pass,
        'status'=>1
      ]);

      return redirect('home');
      }
      Session::flash('msj-danger','no puedes utilizar la misma contraseña!');
      return redirect('change');
   
    }
}
