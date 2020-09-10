<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Cliente;
use App\Articulo;
use App\IngresoEquipo;
use App\Inspeccion;
use Auth;
use Session;
class AlmacenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ingreso()
    {
        
 $categorias=Categoria::where('status',1)->get();
 $clientes=Cliente::where('status',1)->get();
 $articulos=Articulo::where('tipoProducto',1)->get();

        return view('almacen.ingreso',compact('categorias','clientes','articulos'));
    }



       public function ingresos()
    {
        
 
 $ingresos=IngresoEquipo::where('status','>=',1)->get();

        return view('almacen.ingresos',compact('ingresos'));
    }


       public function inspecciones()
    {
        
 
 $ingresos=IngresoEquipo::with('articulo','cliente','inspecciones','inspeccion.user')->where('status',2)->get();
 $equipos=IngresoEquipo::with('articulo','cliente')->where('status',1)->get();

        return view('almacen.inspecciones',compact('ingresos','equipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        IngresoEquipo::create($request->all());
        return redirect('almacen/ingresos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function saveInspeccion(Request $request,$id)
    {  // return $request->all();
        for($i=0;$i < count($request->opcion);$i++) {
            Inspeccion::create([
            'data'=>$request->opcion[$i],
            'ingreso_equipo_id'=>$id,
            'user_id'=>Auth::user()->id,
            'observacion'=>$request->observacion[$i]
        ]);

        }
            IngresoEquipo::find($id)->update(['status'=>2,'observaciones'=>$request->observaciones]);
            Session::flash('msj-success','Inspección inicial Realizada"');
             return redirect('almacen/inspecciones');
    } 


     public function editInspeccion(Request $request,$id)
    {  // return $request->all();
         $ins=Inspeccion::where('ingreso_equipo_id',$id)->get();
        for($i=0;$i < count($ins);$i++) {
            $ins[$i]->update([
            'data'=>$request->opcion[$i],
            'user_id'=>Auth::user()->id,
            'observacion'=>$request->observacion[$i]
        ]);
        
        }
            IngresoEquipo::find($id)->update(['observaciones'=>$request->observaciones]);
            Session::flash('msj-success','Inspección inicial Modificada"');
             return redirect('almacen/inspecciones');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
       $clientes=Cliente::where('status',1)->get();
       $articulos=Articulo::where('tipoProducto',1)->get();
       $ingreso=IngresoEquipo::find($id);
        return view('almacen.edit_ingreso',compact('clientes','articulos','ingreso'));
    } 

     public function editIngreso(Request $request, IngresoEquipo $ingreso)
    {
  
        $ingreso->update($request->all());
        Session::flash('msj-success','Ingreso Modificado!');
        return redirect('almacen/ingresos');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteIngreso(IngresoEquipo $ingreso)
    {
         $ingreso->update(['status'=>0]);
           Session::flash('msj-success','Ingreso Eliminado!');
        return redirect('almacen/ingresos');
    }
}
