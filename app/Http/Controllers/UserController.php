<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Cargo;
use App\Permiso;
use App\PermisoUser;
use Session;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function empleados()
    {
        $users= User::where('group_id','<>',1)->where('group_id','<>',5)->get();
        $i=1;
        $groups=Group::all();
        return view('users.index',compact('users','i','groups'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view()
    {
       
        return view('auth.change_pass');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       //return $request->all();
      $user=User::create([
       
        'apellidos'=>$request->apellidos,
         'usuario'=>$request->cedula,
         'cedula'=>$request->cedula,
         'nombres'=>$request->nombres,
         'password'=>bcrypt('V'.$request->cedula),
         'nivel'=>$request->nivel,
         'email'=>$request->email
         
       ]);
      return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $user=User::find($id);
    }



 public function editar(Request $request)
    {
       // return $request->all();
         $user=User::find($request->id);
         $user->update([
            'apellidos'=>$request->apellidos,
             'usuario'=>$request->cedula,
             'cedula'=>$request->cedula,
             'nombres'=>$request->nombres,
             'genero'=>$request->genero,
             'email'=>$request->email,
             'status'=>$request->status,
             'nivel'=>$request->nivel

         ]);


         Session::flash('msj-success','El Usuario a Sido Modificado Correctamente...');
        return back();
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function reset($id)
    {
      
        $user=User::find($id);
        $user->update(['password'=>bcrypt(123456),'status'=>5]);
        Session::flash('msj-success','clave de Usuario Restablecida...');
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $cargos=Cargo::where('status',1)->get();
         $users= User::with('permisos')->where('cargo','<>',null)->get();
         $clts= User::where('cargo',null)->get();
          $permisos= Permiso::where('status',1)->get();
       
        return view('users.index',compact('users','clts','cargos','permisos'));
    }

       public function destroy(User $user)
    {
         $user->update(['status'=>0]);
          
         Session::flash('msj-danger','Usuario Desactivado!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //return $request->all();
        $permisos=Permiso::all();
         $per=PermisoUser::where('user_id',$request->id)->get();

         foreach ($per as $p) {
            $p->delete();
          }
        
         foreach ($permisos as $p) {
            $apro="permisos_".$p->id;
               
             if(isset($request->$apro)){
                PermisoUser::create([
                    'permiso_id'=>$p->id,
                    'user_id'=>$request->id
                    
                ]);
             }
          }



       // return PermisoUser::where('user_id',$request->id)->get();

        $user=User::find($request->id);
         if($request->file){
            $file= $request->file('file');
            $name = Date('dmymsv')."_".$request->id.".jpg";


            \Storage::disk('user')->put($name,  \File::get($file));
            $user->path=$name;
            $user->save();
        }

        $user->update($request->all());
 Session::flash('msj-success','Usuario modificado Exitosamente!');
        return back();
    }


    public function pass(Request $request)
    {   $user=User::find($request->id)->update(['password'=>bcrypt($request->password)]);
        Session::flash('msj-success','contraseña Modificada Exitosamente');
        return back();
    }
}
