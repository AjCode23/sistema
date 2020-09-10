<?php

namespace App\Http\Controllers;

use App\Permiso;
use Illuminate\Http\Request;
use Session;
class PermisoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permisos = Permiso::where('status','<',5)->get();
        return view('permisos.permisos',compact('permisos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    return view('permisos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Permiso::create($request->all());
       
       Session::flash('msj-success','permiso Registrado Exitosamente!');
       return redirect('/permisos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Permiso  $permiso
     * @return \Illuminate\Http\Response
     */
    public function show(Permiso $permiso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Permiso  $permiso
     * @return \Illuminate\Http\Response
     */
    public function edit(Permiso $permiso)
    {

        return view('permisos.edit',compact('permiso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Permiso  $permiso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permiso $permiso)
    {
        $permiso->update($request->all());
       
       Session::flash('msj-success','permiso Modificado Exitosamente!');
       return redirect('/permisos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Permiso  $permiso
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Permiso::find($id)->update(['status'=>0]);
    }


     public function del($id)
    {
        Permiso::find($id)->update(['status'=>5]);
         Session::flash('msj-info','permiso Eliminado Exitosamente!');
       return redirect('/permisos');
    }


     public function activar($id)
    {
        Permiso::find($id)->update(['status'=>1]);
    }
}
