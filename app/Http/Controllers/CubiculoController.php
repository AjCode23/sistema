<?php

namespace App\Http\Controllers;

use App\Cubiculo;
use Illuminate\Http\Request;
use Session;
class CubiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
         $cubiculos=Cubiculo::all();
        return view('cubiculos.list',compact('cubiculos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $num=Cubiculo::all()->max('cubiculo');
        return view('cubiculos.create',compact('num'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
       $this->validate($request,[
            'cubiculo' => 'required|unique:cubiculos',
        ]);
          $num=Cubiculo::all()->max('cubiculo') +1;
          if($num == $request->cubiculo){
          Cubiculo::create($request->all());

          }
          Session::flash('msj-success','Cubiculo Registrado');
             return redirect('cubiculos');
    }


     public function createCubiculos(Request $request)
    {
       //return $request->all();
         $num=Cubiculo::all()->max('cubiculo');
        for ($i=1; $i <= $request->num_cubiculos ; $i++) { 
            $num=$num+1;
            Cubiculo::create([
                'cubiculo'=>$num
            ]);
        }   
      
          Session::flash('msj-success','Cubiculos Registrados');
             return redirect('cubiculos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cubiculo  $cubiculo
     * @return \Illuminate\Http\Response
     */
    public function show( $cubiculo)
    {     return  $cubiculo=Cubiculo::where('cubiculo',$cubiculo)->first();
            
       
    }


     public function verificar(Request $request)
    {    

     $c= Cubiculo::where('cubiculo',$request->cub2)->where('id','<>',$request->cub1)->first();
            
       if($c && $c->count() >0){
        return 1;
       }
       return 0;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cubiculo  $cubiculo
     * @return \Illuminate\Http\Response
     */
    public function edit(Cubiculo $cubiculo)
    {
        
        return view('cubiculos.edit',compact('cubiculo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cubiculo  $cubiculo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cubiculo $cubiculo)
    {
         $cubiculo->update($request->all());

        Session::flash('msj-success','Cubiculo Modificado');
        return redirect('cubiculos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cubiculo  $cubiculo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cubiculo $cubiculo)
    {
        $cubiculo->update(['status'=>0]);
    }

     public function act(Cubiculo $cubiculo)
    {
        $cubiculo->update(['status'=>1]);
    }
}
