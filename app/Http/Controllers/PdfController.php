<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Car;
use App\Config;
use App\Cliente;
use App\producto;

use App\Articulo;
use App\Orden;
use App\Venta;
use App\Compra;

class PdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function articulos(){
       
        $articulos=Articulo::get();
                     
         $pdf=PDF::loadview('pdf.articulos',compact('articulos'));
         return $pdf->stream('Articulos-SIS.pdf');
    }



  public function clientes(){
       
        $clientes=Cliente::get();
                     $config=Config::first();
         $pdf=PDF::loadview('pdf.clientes',compact('clientes','config'));
        $pdf->setPaper ('a4','landscape'); 
         return $pdf->stream('clientes-SIS.pdf');
    }

   
    public function print_car($id)
    {
        

         $orden=Car::find($id);
         $config=Config::first();
                     
         $pdf=PDF::loadview('pdf.car_post',compact('orden','config','id'));
         $pdf->setPaper(array(0,0,285,10000)); 
         return $pdf->stream('Orden-'.$id.'.pdf');
    }



       public function ventas($inicio,$fin)
    {
        

         
         $config=Config::first();
          $ventas=Venta::where('fecha','>=',$inicio)->where('fecha','<=',$fin)->where('status','>=',5)->orderBy('cliente_id','desc')->get();

         $productos = Producto::all();
        $compras = Compra::where('fecha','>=',$inicio)->where('fecha','<=',$fin)->get();
                     
         $pdf=PDF::loadview('pdf.ventas',compact('config','ventas','compras','productos','inicio','fin'));
        // $pdf->setPaper(array(0,0,285,10000)); 
         return $pdf->stream('ventas-'.$inicio.'.pdf');
    }



       public function cotizaciones()
    {
        

         
         $config=Config::first();
          $cotizaciones=Orden::where('status',1)->get();

                     
         $pdf=PDF::loadview('pdf.cotizaciones',compact('config','cotizaciones'));
        // $pdf->setPaper(array(0,0,285,10000)); 
         return $pdf->stream('cotizaciones-'.Date('d-m-y').'.pdf');
    }


       public function cotizacion(Orden $orden)
    {
      

         
         $config=Config::first();
        

                     
         $pdf=PDF::loadview('pdf.cotizacion',compact('config','orden'));
        // $pdf->setPaper(array(0,0,285,10000)); 
         return $pdf->stream('cotizacion-'.$orden->id.'.pdf');
    }



      public function orden(Orden $orden)
    {
      

         
         $config=Config::first();
        

                     
         $pdf=PDF::loadview('pdf.orden',compact('config','orden'));
        // $pdf->setPaper(array(0,0,285,10000)); 
         return $pdf->stream('orden-'.$orden->id.'.pdf');
    }



     public function pagos($mes, $year)
    {
        

         $config=Config::first();
         $inicio=$year."-".$mes."-01";
         $fin=$year."-".$mes."-31";
//return $year;

          $pagos=Deposito::where('cliente_id','<>',null)->where('created_at','>=',$inicio)->where('created_at','<=',$fin)->orderby('id','desc')->get();
     $depositos=Deposito::where('cliente_id',null)->where('created_at','>=',$inicio)->where('created_at','<=',$fin)->orderby('id','desc')->get();
                     
         $pdf=PDF::loadview('pdf.pagos',compact('config','mes','year','pagos','depositos'));
         return $pdf->stream('pagos-'.$mes.'-'.$year.'.pdf');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function historyCliente(Request $request)
    {
         $cliente=Cliente::find($request->cliente_id);
        if(isset($request->hasta)  && isset($request->desde)){
            $ventas=$cliente->ventas->where('fecha','>=',$request->desde)->where('fecha','<=',$request->hasta);
            $tipo=1;
            $desde=date("d/m/Y", strtotime($request->desde));
            $hasta=date("d/m/Y", strtotime($request->hasta));
        }else if(isset($request->fecha)){
            $tipo=2;
       
            $ventas=$cliente->ventas->where('fecha',$request->fecha);
            $fecha=date("d/m/Y", strtotime($request->fecha));
        }else{
            $ventas=$cliente->ventas;
           $tipo=0;
        }

        $config=Config::first();
            // return $ventas;        
         $pdf=PDF::loadview('pdf.historial_cliente',compact('cliente','config','ventas','desde','hasta','fecha','tipo'));
         #$pdf->setPaper(array(0,0,285,10000)); 
         return $pdf->stream('Historial-'.$cliente->empresa.'.pdf');

        
    }


     public function HistorialProducto($id)
    {
    
    $producto=Producto::with('categoria')->find($id);
            $config=Config::first();
            // return $ventas;        
         $pdf=PDF::loadview('pdf.historial_producto',compact('producto','config'));
         #$pdf->setPaper(array(0,0,285,10000)); 
         return $pdf->stream('Historial-Producto'.$producto->producto.'.pdf');

   

        }


        public function venta($id)
    {
    
   
         $config=Config::first();
          $venta=Venta::find($id);

         $productos = Producto::all();
      
                     
         $pdf=PDF::loadview('pdf.venta',compact('config','venta'));
        // $pdf->setPaper(array(0,0,285,10000)); 
         return $pdf->stream('venta'.'.pdf');

        }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function inventario()
    {
         $productos=Producto::orderBy('categoria_id','Asc')->get();

        $config=Config::first();
        $pdf=PDF::loadview('pdf.inventario',compact('productos','config'));
         #$pdf->setPaper(array(0,0,285,10000)); 
        $fecha=date('d-m-y');
         return $pdf->stream('Inventario-'.$fecha.'.pdf');

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function clientes2()
    {
         $clientes=Cliente::all();

        $config=Config::first();
        $pdf=PDF::loadview('pdf.clientes',compact('clientes','config'));
        // $pdf->setPaper(array(0,0,285,10000)); 
        $pdf->setPaper ('a4','landscape'); 
         return $pdf->stream('clientes.pdf');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function despacho()
    {
        $config=Config::first();
        $productos=Producto::where('status',1)->get();
        $pdf=PDF::loadview('pdf.despacho',compact('productos','config'));
        // $pdf->setPaper(array(0,0,285,10000)); 
        $pdf->setPaper ('a4','landscape'); 
         return $pdf->stream('despacho.pdf');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    
       
    }
}
