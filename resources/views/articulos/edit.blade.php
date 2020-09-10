@extends('layouts.app')

@section('name','..|Registrar Articulo|..')

@section('ol')
 <a style="color: #e68618;" href="{{url('home')}}" class="link" title=""><i class="mdi mdi-home"></i> Home
</a>
/
 <a class="link" title=""><i class="mdi mdi-account-location"></i> Editar Articulos</a>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.0/dist/JsBarcode.all.min.js" type="text/javascript"></script>
<script>
   function artServ(select){
    s=select.value;
    if(parseFloat(s) == 2 ){
      $('#stock').prop('disabled',true);
      $('#stock').val(null);
    }else{

      $('#stock').prop('disabled',false);
      $('#stock').focus();

    }
  }

var cod=$('#codigo').val();
  JsBarcode("#barcode",cod );


  function generar(){
    var cod=$('#codigo').val();
  JsBarcode("#barcode",cod );
  }
</script>
@endsection

@section('content')


  
  <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="mdi mdi-pencil mr-1"></i>
                Editar  Articulo
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                  
                      &nbsp;
                       <li class="nav-item">
                      <a class="nav-link btn-danger active" href="{{url('articulos')}}"style="color: #fff !important;"><i class="mdi mdi-reply"></i> Cancelar</a>
                    </li>
                  
                  </ul>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
         <form action="{{url('articulos/update',$articulo->id)}}" method="post" enctype="multipart/form-data">
         		{{csrf_field()}}
                  <div class="row">
                  	
                  <div class="col-md-6">
                  	<label for="">Nombre:</label>
                  	<input type="text" class="form-control" value="{{$articulo->articulo}}" name="articulo" required placeholder="Nombre del Articulo o Servicio">
                  </div>

                   <div class="col-md-6">
                  	<label for="">Categoria:</label>
                  	<select name="categoria_id" required class="form-control" >
                  		<option value="">Seleccione Categoria</option>
                  		@foreach($categorias as $c)
                  		<option  @if($articulo->categoria_id == $c->id) selected  @endif value="{{$c->id}}">{{$c->categoria}} | {{$c->descripcion}}</option>

                  		@endforeach

                  	</select>
                  </div>

                  </div>



                  <div class="row">
                  <div class="col-md-2">
                    <label for="">Articulo/ Servicio:</label>
                   <select name="tipoProducto"  required="" class="form-control" onchange="artServ(this)">
                    @if($articulo->tipoProducto == 1)
                     <option  value="1">Articulo</option>
                     <option value="2">Servicio</option>
                     @else

                     <option value="2">Servicio</option>
                     <option  value="1">Articulo</option>
                     @endif
                   </select>

                  </div>


                   <div class="col-md-2">
                    <label for="">Stock:</label>
                    <input type="number" class="form-control"   @if($articulo->tipoProducto == 2) disabled @endif value="{{$articulo->stock}}" id="stock" required name="stock"  placeholder="0">
                  </div>

                  <div class="col-md-2">
                    <label for="">PVP:</label>
                    <input type="number" value="{{$articulo->pvp}}" class="form-control" name="pvp" required placeholder="example: 2000">
                  </div>

                   <div class="col-md-6">
                  	<label for="">Descripcion:</label>
                  	<input type="text" class="form-control" name="descripcion" value="{{$articulo->descripcion}}"  placeholder="Descripcion del articulo o servicio">
                  </div>

                  </div>





                  <div class="row">
                  	
                  <div class="col-md-6">
                  	<label for="">Imagen:</label>
                  	<input type="file" class="form-control" value="{{$articulo->path}}"  name="file"  placeholder="">
                  </div>

                   <div class="col-md-6">
                  	<label for="">Codigo:</label>
                  	<input type="text" class="form-control" name="codigo" id="codigo" value="{{$articulo->codigo}}"   placeholder="codigo">
                  </div>

                  </div>


                  <div class="row">
                  	
                  <div class="col-md-6 text-center mt-2" >
                  	<img src="{{asset('imgArticulos/'.$articulo->path)}}" style="width: 300px; height: 300px;">
                  </div>

                   <div class="col-md-6">
                  	<svg id="barcode"></svg>
                  </div>

                  </div>



                  <div class="row">
                  	
                  <div class="col-md-6">
                  <br>
                  	<button class="btn btn-outline-primary" type="submit"><i class="mdi mdi-content-save"></i> Guardar</button>
                  </div>

         </form>         
                   <div class="col-md-6">
                   <br>
                  	<button class="btn btn-outline-success" type="button" onclick="generar()"><i class="mdi mdi-barcode"></i> Gererar</button>
                  	<button class="btn btn-outline-secondary" type="button"><i class="fa fa-print"></i> Imprimir</button>
                  </div>

                  </div>




              


                </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>

@endsection