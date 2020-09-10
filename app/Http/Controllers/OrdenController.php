<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orden;
use App\Asesor;
use App\Cliente;
use App\Articulo;
use App\CondicionPago;
use App\Cotizacion;
use App\Mail\OrdenEmail;

use Auth;
use Mail;
use Session;
class OrdenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $ordens=Orden::where('status','>=',3 )->get();
         return view('orden.index',compact('ordens'));
    }

   
   public function add(Request $request,$id)
    {

     //  return $request->all();
        $c=Cotizacion::create($request->all());

        return Cotizacion::with('cliente','articulo')->find($c->id);
    }

    public function OrdenCliente()
    {
       
         $ordenes=Orden::get();
         return view('clientes.ordenes',compact('ordenes'));
    }

   public function create()
    {

          $asesores=Asesor::where('status',1)->get();
        $clientes=Cliente::where('status',1)->get();
        $productos=Articulo::with('categoria')->where('status',1)->get();
        $condiciones=CondicionPago::where('status',1)->get();
         $sec=Orden::max('id');
        return view('orden.create',compact('asesores','clientes','productos','condiciones','sec'));
      
        
    }


  public function store(Request $request)
    {
      //return $request->all();

          $cotizaciones= Cotizacion::where('cliente_id',$request->cliente_id)->where('status',9)->get();
           if($cotizaciones->count() == 0){
            Session::flash('msj-warning','La orden de Venta no pudo guardarse! intente nuevamente');
                 return redirect('ordenes');
           }
           $o=Orden::create($request->all());

         foreach ($cotizaciones as $c) {
            $c->orden_id=$o->id;
            $c->status=2;
            $c->save();
         }
        
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
          Mail::to($o->asesor->email)->send(new OrdenEmail($o));
         Session::flash('msj-success','Orden de Venta Realizada Satisfactoriamente!');
         return redirect('ordenes');
        
    }




  public function detalles($id)
    {
         return Cotizacion::with('cliente','articulo')->where('cliente_id',$id)->where('status',9)->get();
    }


    public function procesar(Request $request)
    {
        Orden::find($request->id)->update(['status'=>4]);
        Session::flash('msj-success','Orden fue Procesada en espera por facturación!');
        return redirect('ordenes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Orden  $orden
     * @return \Illuminate\Http\Response
     */
    public function OrdenCompras()
    {
         $ordens = Orden::where('status','>=',4)->get();
         return view('orden.pendientes',compact('ordens'));
    }


      public function OrdenCompra(Orden $orden)
    {

         return view('orden.compra',compact('orden'));
    }



         public function show( $id)
    {
        $orden = Orden::find($id);
         return view('orden.show',compact('orden'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Orden  $orden
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $orden=Orden::find($id);
         return view('orden.edit',compact('orden'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Orden  $orden
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orden $orden)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Orden  $orden
     * @return \Illuminate\Http\Response
     */
    public function aprobar(Request $request)
    {
           /*if($request->observacion == 1){

            $o->status=3;
          // Mail::to($o->asesor->email)->send(new OrdenEmail($o));
           }else{
            $o->comentario=$request->comentario;
           }*/
          $o=Orden::find($request->id);
                $o->status=5;
                $o->save();
          foreach ($o->cotizaciones as $c) {
            $apro="aprobar_".$c->id;
             if(!isset($request->$apro)){
                $c->update(['status'=>0]);
             }
          }
          return redirect('OrdenesCompras');
    }


    public function destroy(Orden $orden)
    {
        //
    }
}
