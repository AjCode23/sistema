@extends('layouts.app')

@section('name','..|Registrar Articulo|..')

@section('ol')
 <a style="color: #e68618;" href="{{url('home')}}" class="link" title=""><i class="mdi mdi-home"></i> Home
</a>
/
 <a class="link" title=""><i class="mdi mdi-account-location"></i> Nuevo Articulos</a>
@endsection

@section('css')
  <link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">

@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.0/dist/JsBarcode.all.min.js" type="text/javascript"></script>
 <!-- DataTables -->
<script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>

<script>
  
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });

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
  function cerrar(){
   
    $('#codigoBarra').html('<span></span>');
  }


  function generar(){
   $('#codigoBarra').html(`<svg id="barcode"></svg>
    <button onclick="cerrar()" type="button" class="btn btn-danger"><i class="mdi mdi-close"></i> </button> 
   `);
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
                  <i class="mdi mdi-plus mr-1"></i>
                Nuevo  Articulos
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
         <form action="{{url('articulos')}}" method="post" enctype="multipart/form-data">
         		{{csrf_field()}}
                  <div class="row">
                  	
                  <div class="col-md-6">
                  	<label for="">Nombre:</label>
                  	<input type="text" class="form-control" name="articulo" required placeholder="Nombre del Articulo o Servicio">
                  </div>

                   <div class="col-md-6">
                  	<label for="">Categoria:</label>
                  	<select name="categoria_id" required class="form-control" >
                  		<option value="">Seleccione Categoria</option>
                  		@foreach($categorias as $c)
                  		<option value="{{$c->id}}">{{$c->categoria}} | {{$c->descripcion}}</option>

                  		@endforeach

                  	</select>
                  </div>

                  </div>



                  <div class="row">
                  	
                  <div class="col-md-2">
                    <label for="">Articulo/ Servicio:</label>
                   <select name="tipoProducto"  required="" class="form-control" onchange="artServ(this)">
                     <option value="1">Articulo</option>
                     <option value="2">Servicio</option>
                     
                   </select>

                  </div>


                   <div class="col-md-2">
                    <label for="">Stock:</label>
                    <input type="number" class="form-control" id="stock" required name="stock"  placeholder="0">
                  </div>

                  <div class="col-md-2">
                    <label for="">PVP:</label>
                    <input type="number" class="form-control" name="pvp" required placeholder="example: 2000">
                  </div>

                   <div class="col-md-6">
                  	<label for="">Descripcion:</label>
                  	<input type="text" class="form-control" name="descripcion"  placeholder="Descripcion del articulo o servicio">
                  </div>

                  </div>





                  <div class="row">
                  	
                  <div class="col-md-6">
                  	<label for="">Imagen:</label>
                  	<input type="file" class="form-control" name="file"  placeholder="">
                  </div>

                   <div class="col-md-6">
                  	<label for="">Codigo:</label>
                  	<input type="text" class="form-control" id="codigo" name="codigo"  placeholder="codigo">
                  </div>

                  </div>



                     <div class="row">
                    
                  <div class="col-md-6 text-center " >
                  
                  </div>

                   <div class="col-md-6">
                  
                    <span id="codigoBarra"></span>
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