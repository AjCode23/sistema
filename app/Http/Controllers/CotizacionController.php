<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cotizacion;
use App\Articulo;
use App\Asesor;
use App\Cliente;
use App\CondicionPago;
use App\Orden;
use App\ArchivoCotizacion;
use Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\Cotizacion as CotEmail;
use App\Mail\OrdenEmail;
class CotizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ordenes=Orden::get();
        return view('cotizaciones.list',compact('ordenes'));
    }


public function email(){
     $orden=Orden::first();
      Mail::to($orden->asesor->email)->send(new OrdenEmail($orden));
   // Mail::to('eecheverrianunez@gmail.com')->send(new CotEmail($orden));//
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $asesores=Asesor::where('status',1)->get();
        $clientes=Cliente::where('status',1)->get();
        $productos=Articulo::with('categoria')->where('status',1)->get();
        $condiciones=CondicionPago::where('status',1)->get();
         $sec=Orden::max('id');
        return view('cotizaciones.create',compact('asesores','clientes','productos','condiciones','sec'));


}
     

    public function add(Request $request,$id)
    {

     //  return $request->all();
        $c=Cotizacion::create($request->all());

        return Cotizacion::with('cliente','articulo')->find($c->id);
    }


    public function addUpdate(Request $request,$id)
    {

        $c=Cotizacion::create($request->all());

        return Cotizacion::with('cliente','articulo')->where('orden_id','<>',null)->find($c->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cotizacion  $cotizacion
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Orden::with('archivos','cotizaciones','cotizacion.cliente','condicion','asesor','cotizaciones.articulo')->find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cotizacion  $cotizacion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $asesores=Asesor::all();
        $orden=Orden::find($id);
        $productos=Articulo::with('categoria')->get();
        $condiciones=CondicionPago::get();
        $sec=Orden::max('id');
        return view('cotizaciones.editCliente',compact('asesores','cotizacion','productos','condiciones','sec','orden'));
        
    }


       public function editar($id)
    {

        $asesores=Asesor::all();
        $orden=Orden::find($id);
        $productos=Articulo::with('categoria')->get();
        $condiciones=CondicionPago::get();
        $sec=Orden::max('id');
        return view('cotizaciones.editUser',compact('asesores','cotizacion','productos','condiciones','sec','orden'));
        
    }

     public function store(Request $request)
    {
      //return $request->all();
        $this->validate($request, [
        'condicion_id' => 'required',
    
    ]);
         $cotizacion= Cotizacion::where('cliente_id',$request->cliente_id)->where('status',1)->get();
          $orden=Orden::create($request->all());
         foreach ($cotizacion as $c) {
            $c->orden_id=$orden->id;
            $c->status=2;
            $c->save();
         }
          Mail::to(Cliente::find($request->cliente_id)->email)->send(new CotEmail($orden));
         Session::flash('msj-success','Cotizacion Realizada Satisfactoriamente!');
         return redirect('cotizaciones');
        
    }





      public function detalles($id)
    {
         return Cotizacion::with('cliente','articulo')->where('cliente_id',$id)->where('status',1)->get();
    }

      public function detallesEdit($id)
    {
         return Orden::with('cotizaciones','cotizaciones.articulo')->find($id);
    }


     public function aprobacion($id)
    {

          $o= Orden::with('cotizaciones','cotizacion.cliente','condicion','asesor','cotizaciones.articulo')->find($id);
          if(($o->status == 0)){
            Session::flash('msj-danger','Esta Cotizacion Se encuentra Anulada, No se Puede Aprobar');
          return back();
          }elseif($o->status == 2){
            Session::flash('msj-info','Esta Cotizacion ya se encuentra Aprobada!');
          return back();
          }
          return view('cotizaciones.aprobacion',compact('o'));
    }


     public function aprobar(Request $request)
    {
       
          if(isset($request->file)){

           foreach ($request->file('file') as $key) {
                $arc= $key->getClientOriginalName();

                $nombre = $request->id.'-'.$arc;
              
                ArchivoCotizacion::create([
                'archivo'=>$nombre,
                'orden_id'=>$request->id
            ]);
                
         \Storage::disk('archivos')->put($nombre,  \File::get($key));
            }
          } 

     
            $o=Orden::find($request->id);
           if($request->observacion == 1){
            $o->status=3;
           Mail::to($o->asesor->email)->send(new OrdenEmail($o));
           }else{
            $o->status=2;
            $o->comentario=$request->comentario;
           }

          $o->save();
          foreach ($o->cotizaciones as $c) {
            $apro="aprobar_".$c->id;
             if(!isset($request->$apro)){
                $c->update(['status'=>0]);
             }
          }
          return redirect('cliente/cotizaciones');
    }


      public function delete($id)
    {   
        $c=Cotizacion::find($id);
        $total=$c->cantidad * $c->pvp;
        $c->delete();
        return $total;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cotizacion  $cotizacion
     * @return \Illuminate\Http\Response
     */
    public function Modificar(Request $request,$id)
    {
       
     //return $request->all();
          $o=Orden::find($id);
         $o->update([
            'condicion_id'=>$request->condicion_id,
            'asesor_id'=>$request->asesor_id,
            'orden_id'=>$request->id,
            'fecha'=>$request->fecha,
            'impuesto'=>$request->impuesto,
            'comentario'=>'',
            'status'=>1
         ]);

        // return $o;
        return redirect('cotizaciones');
    }


     public function update(Request $request)
    {
       
     // return $request->all();
         $o=Orden::find($request->id);
         $o->update([
            'condicion_id'=>$request->condicion_id,
            'asesor_id'=>$request->asesor_id,
            'orden_id'=>$request->id,
            'fecha'=>$request->fecha,
            'impuesto'=>$request->impuesto,
            'comentario'=>'',
            'status'=>1
         ]);
        return redirect('cotizaciones');
    }



 public function max()
    {
        return $sec=Orden::max('id');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cotizacion  $cotizacion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $orden=Orden::find($id)->update(['status'=>0]);
         return 1;
    }

    public function destroyFull($id)
    {
       $cs= Cotizacion::where('status',1)->where('cliente_id',$id)->get();
        foreach($cs as $c) 
            {
                $c->delete();
            }
           return redirect('cotizaciones');
    }



    public function AnularCotizacionCliente(Orden $orden){
        //return $ordens;
         $orden->update(['status'=>0]);
    }
}
