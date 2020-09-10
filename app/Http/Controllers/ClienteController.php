<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Asesor;
use App\DirecionCliente;
use App\TelfCliente;
use App\Orden;
use App\Cotizacion;
use App\ClienteBanco;
use App\CltDirFactura;
use App\CltMoneda;
use App\CltRegimen;
use App\CltIE;
use App\User;
use App\ContactoComercial;
use Illuminate\Http\Request;
use Session;
use Auth;
class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes=Cliente::all();
        return view('clientes.index',compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $asesores=Asesor::where('status',1)->get();
        return view('clientes.create',compact('asesores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
 // return $request->all();
        //return $request->direccion;
        $this->validate($request, [
        'numDocumento' => 'required|unique:clientes',
    
    ]);

        $u=User::create([
        'nombres'=>$request->nombres,
        'usuario'=>$request->numDocumento,
        'password'=>bcrypt($request->numDocumento),
        'nivel'=>0
        ]);

        $c=Cliente::create([
        'asesor_id'=>$request->asesor_id,
        'user_id'=>$u->id,
        'nombres'=>$request->nombres,
        'tipoPersona'=>$request->tipo_persona,
        'tipoDocumento'=>$request->tipo_documento,
        'numDocumento'=>$request->numDocumento,
        'actPpal'=>$request->actividad_ppal,
        'email'=>$request->email
        ]);

        DirecionCliente::create([
             'cliente_id'=>$c->id, 
             'direccion'=>$request->direccion, 
             'pais'=>$request->pais, 
             'departamento'=>$request->departamento, 
             'ciudad'=>$request->ciudad,
              'cod_postal'=>$request->codigo_postal
        ]);

        CltIE::create([
            'cliente_id'=>$c->id,
            'activo'=>$request->activo,
            'pasivo'=>$request->pasivo,
            'patrimonio'=>$request->patrimonio,
            'ingreso'=>$request->ingreso,
            'egreso'=>$request->egreso,
            'otros'=>$request->otros
        ]);



        CltRegimen::create([
        'regimen'=>$request->tipoRegimen,
        'resolucion'=>$request->resolucion,
        'ciu'=>$request->ciu,
        'cliente_id'=>$c->id
    ]);


            
        for ($i=0; $i < count($request->tipo_tlf) ; $i++) { 
            
           TelfCliente::create([
            'cliente_id'=>$c->id, 
            'tipoTlf'=>$request->tipo_tlf[$i],
             'numero'=>$request->numero[$i]
            ]);
           
        }



        for ($i=0; $i < count($request->nombreCom) ; $i++) { 
            
           ContactoComercial::create([
             'cliente_id'=>$c->id, 
             'nombreComercial'=>$request->nombreCom[$i],
             'emailContacto'=>$request->emailCom[$i], 
             'tlfOficina'=>$request->tlfFijoCom[$i], 
             'tlfPersonal'=>$request->tlfPerCom[$i]
            ]);
           
        }


          for ($i=0; $i < count($request->tipo_cuenta) ; $i++) { 
            
           ClienteBanco::create([
            'banco'=>$request->banco[$i],
            'cuenta'=>$request->numero_cuenta[$i],
            'tipo_cuenta'=>$request->tipo_cuenta[$i],
            'cliente_id'=>$c->id 
            ]);
           
        }




 for ($i=0; $i < count($request->dir_factura) ; $i++) { 
            
           CltDirFactura::create([
            'cliente_id'=>$c->id,
            'correo_fact'=>$request->dir_factura[$i],
            'direccion_recib'=>$request->dir_equipo[$i],
            'fecha'=>$request->fecha_fact[$i]
            ]);
           
        }



        for ($i=0; $i < count($request->moneda) ; $i++) { 
            
           CltMoneda::create([
           
            'cliente_id'=>$c->id,
            'moneda'=>$request->moneda[$i]
           
            ]);
           
        }

        Session::flash('msj-success','Cliente Registrado Correctamente!');
        return redirect('clientes');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
         
        return view('clientes.show',compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        $asesores=Asesor::where('status',1)->get();
        return view('clientes.edit',compact('asesores','cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
    // return $request->all();
         $user=User::where('usuario',$cliente->numDocumento)->first();

        $cliente->update([
        'asesor_id'=>$request->asesor_id,
        'user_id'=>$user->id,
        'nombres'=>$request->nombres,
        'tipoDocumento'=>$request->tipo_documento,
        'numDocumento'=>$request->numDocumento,
        'actPpal'=>$request->actividad_ppal,
        'email'=>$request->email
        ]);
       
        $cliente->direccion->update([
             'direccion'=>$request->direccion, 
             'pais'=>$request->pais, 
             'departamento'=>$request->departamento, 
             'ciudad'=>$request->ciudad,
              'cod_postal'=>$request->codigo_postal
        ]);

       $cliente->ie->update([
          
            'activo'=>$request->activo,
            'pasivo'=>$request->pasivo,
            'patrimonio'=>$request->patrimonio,
            'ingreso'=>$request->ingreso,
            'egreso'=>$request->egreso,
            'otros'=>$request->otros
        ]);


        $cliente->regimen->update([
        'regimen'=>$request->tipoRegimen,
        'resolucion'=>$request->resolucion,
        'ciu'=>$request->ciu,
        
        ]);


           $cliente->facturacion->update([
            'correo_fact'=>$request->dir_factura,
            'direccion_recib'=>$request->dir_equipo,
            'fecha'=>$request->fecha_fact
            ]);


        //return $dir;
        $user->update(['nombres'=>$request->nombres,'usuario'=>$request->numDocumento,'password'=>bcrypt($request->numDocumento)]);
         Session::flash('msj-success','Cliente Modificado Correctamente!');
       return redirect('clientes/'.$cliente->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
public function destroy(Cliente $cliente)
    {
       
         $cliente->update(['status'=>0]);
            }

     public function activar(Cliente $cliente)
     {
         $cliente->update(['status'=>1]);
            }

    /*cliente rutas*/
     public function home()
    {
        return view('clientes.home');
    }


     public function delTlf(TelfCliente $tel)
    {
        $tel->update(['status'=>0]);
         Session::flash('msj-success','Telefono Inabilitado Correctamente!');
       return back();
    }


      public function actTlf(TelfCliente $tel)
    {

         $c=$tel->cliente;
         $num= $c->telefonos->where('status',1)->count();
         if($num >= 3){


         Session::flash('msj-warning','Disculpe solo se puede tener tres Telefonos Activos!');
         }else{

        $tel->update(['status'=>1]);
         Session::flash('msj-success','Telefono Activo Correctamente!');
         }
       return back();
    }


    public function editTlf(Request $request, TelfCliente $tel){
      //  return $tel;
        $tel->update($request->all());
         Session::flash('msj-success','Telefono Modificado Correctamente!');
       return back();
    }


     public function editBanco(Request $request, ClienteBanco $b){
    
        $b->update($request->all());
         Session::flash('msj-success','Datos Bancarios Modificados Correctamente!');
       return back();
    }



     public function editComercio(Request $request, ContactoComercial $c){
        
        $c->update($request->all());
         Session::flash('msj-success','Contacto Comercial Modificado Correctamente!');
       return back();
    }


     public function delBanco(ClienteBanco $banco)
    {
        $banco->update(['status'=>0]);
         Session::flash('msj-success','Banco Inabilitado Correctamente!');
       return back();
    }


    public function actBanco(ClienteBanco $banco)
    {
        $banco->update(['status'=>1]);
         Session::flash('msj-success','Banco Activado Correctamente!');
       return back();
    }



     public function actComercio(ContactoComercial $com)
    {
        //return $com;
        $com->update(['status'=>1]);
         Session::flash('msj-success','Contacto Comercial Activado Correctamente!');
       return back();
    }


     public function delComercio(ContactoComercial $com)
    {
       // return $com;
        $com->update(['status'=>0]);
         Session::flash('msj-success','Contacto Comercial Inactivo Correctamente!');
       return back();
    }





    public function addMoneda(Request $request)
    {
         CltMoneda::create($request->all());
        Session::flash('msj-success','Moneda Registrado Correctamente!');
       return back();

    }


      public function addBanco(Request $request)
    {
         ClienteBanco::create($request->all());
        Session::flash('msj-success','Banco Registrado Correctamente!');
       return back();


    }

 public function addComercio(Request $request)
    {
         ContactoComercial::create($request->all());
        Session::flash('msj-success','Contacto Comercial Registrad Correctamente!');
       return back();


    }


     public function delMoneda(CltMoneda $moneda)
    {
         $moneda->delete();
         
        Session::flash('msj-success','Moneda Eliminada Correctamente!');
       return back();

    }
        public function addTlf(Request $request,Cliente $cliente)
    {

        //return $request->all();
        for ($i=0; $i < count($request->tipo_tlf) ; $i++) { 
            
           TelfCliente::create([
            'cliente_id'=>$cliente->id, 
            'tipoTlf'=>$request->tipo_tlf[$i],
             'numero'=>$request->numero[$i]
            ]);
           
        }

          Session::flash('msj-success','Telefonos Registrados Correctamente');
       return redirect('clientes/'.$cliente->id);
    }


     public function cotizaciones()
    {
          $ordenes=Orden::get();
        return view('clientes.cotizaciones',compact('ordenes'));
    }
}
