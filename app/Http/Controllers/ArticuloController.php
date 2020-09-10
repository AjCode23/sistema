<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articulo;
use App\Categoria;
use Session;
use DNS1D;
use DNS2D;
class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $articulos=Articulo::all();
        return view('articulos.index',compact('articulos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $categorias=Categoria::where('status',1)->get();
        return view('articulos.create',compact('categorias'));
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
       $articulo=Articulo::create($request->all());
        $file= $request->file('file');
        $nombre = "articulo_".$articulo->id.".jpg";
        $articulo->path=$nombre;
        $articulo->save();


        
         \Storage::disk('local')->put($nombre,  \File::get($file));
         Session::flash('msj-success','Articulo o Servicio Registrado satisfactoriamente!');
         return redirect('articulos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function show(Articulo $articulo)
    {
          $categorias=Categoria::all();
        return view('articulos.show',compact('categorias','articulo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function edit(Articulo $articulo)
    {
    //echo DNS1D::getBarcodeHTML('4445645656', 'C39');
//echo DNS1D::getBarcodeHTML('4445645656', 'C128');

        
        $categorias=Categoria::all();
        return view('articulos.edit',compact('categorias','articulo'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Articulo $articulo)
    {
      //  return $request->all();
        if($request->file){
            $file= $request->file('file');
            $name = Date('dmymsv')."_".$articulo->id.".jpg";


            \Storage::disk('local')->put($name,  \File::get($file));
            $articulo->path=$name;
        }
        
       
           $articulo->categoria_id=$request->categoria_id; 
           $articulo->articulo=$request->articulo;
           $articulo->descripcion=$request->descripcion;
           $articulo->codigo=$request->codigo;
           $articulo->tipoProducto=$request->tipoProducto;
           $articulo->stock=$request->stock;
           $articulo->stock=$request->stock;
           $articulo->save();


         Session::flash('msj-info','Articulo o Servicio Modificafo satisfactoriamente!');
         return redirect('articulos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Articulo $articulo)
    {
         $articulo->update(['status'=>0]);
            }

     public function activar(Articulo $articulo)
    {
         $articulo->update(['status'=>1]);
            }
}
