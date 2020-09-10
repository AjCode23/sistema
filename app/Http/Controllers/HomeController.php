<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use App\Cliente;
use App\categoria;
use App\Articulo;
use App\Moneda;
use App\Config;
use App\Deposito;
use App\Banco;
use App\User;
use Session;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
       
    }

    public function alerts(){

      $ventas  = Venta::where('status',5)->get();
      $mor=0;
      $ret=0;
      foreach ($ventas as $v) {
       
     
         $date1 = new \DateTime("now");
        $date2 = new \DateTime($v->fecha);
        $diff = $date1->diff($date2);
        //echo($diff->days.' - ' .$v->id.' | ');
         if($diff->days >=10 && $diff->days <= 15){                   
            $ret++;
           } else if($diff->days > 15){
            $mor++;  
            $v->update(['morosa'=> 1 ]);                            
           }
       

      }

      $fact=Venta::where('status',1)->get()->count();

      //echo 2;
       return response()->json([
            'facturas'=>$fact,
            'morosos'=>$mor,
            'retrasados'=>$ret
         ]);

    }
    public function index(Request $request)
    {
        

      $cat= Categoria::where('status',1)->get()->count();
      $clt= Cliente::where('status',1)->get()->count();
       $art= Articulo::where('tipoProducto',1)->get()->count();
       $serv= Articulo::where('tipoProducto',2)->get()->count();
       return view('home',compact('art','clt','cat','serv'));
    }

    public function actualizacion(){
          $clientes=Cliente::all();
       
        //clientes


          foreach ($clientes as $c) {
              $ventas=Venta::where('cliente_id',$c->id)->where('status','>',4)->get();
                if($ventas->count() > 0){
                    //variables
                    //ventas
                  foreach ($ventas as $v ) {
               
                         //detalles ->deudas
                  
                        $deuda=0;
                        foreach ($v->detalles as $d) {
                                if($v->pago == 1){
                                $deuda+=($d->pvp * $d->cantidad) * $v->precio_bs;
                                }else{
                                    $deuda+=$d->cantidad * $d->pvp;
                                }
                               
                            }

                        //abonos venta
                        $abonos=$v->depositos->sum('monto');

                        
                        //echo $deuda.'|'.$abonos.'-'.$c->id.' /////////// ';

                        //cambiamops el status
                        if(($deuda - $abonos) <= 0){
                           $v->update(['status'=>6]);
                        }else{
                           $v->update(['status'=>5]);

                        }
                  }


                }
          }



/*
        
         foreach ($clientes as $c) {

              //ventas
                //echo count($c->ventas);
                $abonos=0;
              foreach ($c->ventas->where('status','>',4) as $v) {
                   // echo $a;
                  
                   //detalles
                $deuda=0;
                   $acum=0;
                  foreach ($v->detalles as $d) {
                     $deuda+=$d->cantidad * $d->pvp;
                     $acum+=$d->cantidad * $d->pvp;               
                  }
              
                  if($v->pago == 1){
                     $deuda=$acum*$v->precio_bs;
                  }
                    $a=$v->depositos->where('status','>',0)->sum('monto');

                   $abonos+=$a;
                  
              //echo $deuda . '-' .$abonos.'-'.$v->cliente_id.' /';
                    if($deuda-$abonos <=1){
                        $v->status=6;
                        //echo 1;
                    }else{
                        //echo 2;
                      $v->status=5;
                        
                    }
                        $v->save();

              }
              
         
         }
*/

    }



    public function config(){
        $monedas=Moneda::all();
        $config=Config::first();
        if(count($config) == 0){
             $config=null;
        }
        return view('configuration',compact('monedas','config'));
    }

    public function save(Request $request){

        $aux=Config::first();
        if(count($aux)>0){
            // existe
            Session::flash('msj-info','Configuracion modificada');
            $aux->update($request->all());
        }else{
            //  no existe
            Session::flash('msj-success','Configuracion Guardada');
            Config::create($request->all());

        }

        return back();

    }


    public function change(){


      return view('change');
    }
}
