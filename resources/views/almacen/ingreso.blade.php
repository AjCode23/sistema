@extends('layouts.app')

@section('name','..|Ingreso de equipo|..')

@section('ol')
 <a style="color: #e68618;" href="{{url('home')}}" class="link" title=""><i class="mdi mdi-home"></i> Home
</a>
/
 <a class="link" title=""><i class="mdi mdi-account-location"></i> Nuevo Ingreso</a>
@endsection

@section('css')
  <link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">

  <link rel="stylesheet" href="{{asset('admin/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">

@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.0/dist/JsBarcode.all.min.js" type="text/javascript"></script>
 <!-- DataTables -->
<script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/plugins/select2/js/select2.full.min.js')}}"></script>

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


    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })




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
                Nuevo  Ingreso de Equipo
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                  
                      &nbsp;
                       <li class="nav-item">
                      <a class="nav-link btn-danger active" href="{{url('almacen/ingresos ')}}"style="color: #fff !important;"><i class="mdi mdi-reply"></i> Cancelar</a>
                    </li>
                  
                  </ul>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
         <form action="{{url('almacen')}}" method="post" autocomplete="off">
         		{{csrf_field()}}
                  <div class="row">
                  	
                  <div class="col-md-6">
                  	<label for="">Cliente:</label>
                  	<select name="cliente_id" required id="select"  class="form-control select2bs4" >
                  		<option value="">Seleccione Cliente</option>
                  		@foreach($clientes as $c)
                  			<option value="{{$c->id}}">{{$c->nombres}}  {{$c->tipoDocumento}}-{{$c->numDocumento}}</option>
                  		@endforeach
                  	</select>
                 
                  </div>

                   <div class="col-md-6">
                  	<label for="marca">Marca:</label>
                  	<input type="text"  class="form-control" id="marca" required name="marca"  placeholder="Descripcion Marca">
                  </div>

                  </div>



                  <div class="row">
                  	
                  <div class="col-md-6">
                  	<label for="">Articulo:</label>
                  	<select name="articulo_id" required id="select"  class="form-control select2bs4" >
                  		<option value="">Seleccione Articulo</option>
                  		@foreach($articulos as $c)
                  			<option value="{{$c->id}}">{{$c->articulo}}  {{$c->codigo}}</option>
                  		@endforeach
                  	</select>
                  </div>

                   <div class="col-md-6">
                  	<label for="modelo">Modelo:</label>
                  	 <input type="text" class="form-control" id="modelo" required name="modelo"  placeholder="Descripcion Modelo">
                  </div>

                  </div>



                  <div class="row">
                  	
                  


                  

                  <div class="col-md-6">
                    <label for="">Descripcion:</label>
                    <input type="text" class="form-control" name="descripcion" required placeholder="Descripcion del Articulo">
                  </div>

                   <div class="col-md-6">
                  	<label for="">Numero de Serie Fabricante o Asignado:</label>
                  	<input type="text" class="form-control"required name="numero"  placeholder="Descripcion Numero de Serie Fabricante o Asignado">
                  </div>

                  </div>










                  <div class="row">
                    
                  <div class="col-md-6">
                  <br>
                    <button class="btn btn-outline-primary" type="submit"><i class="mdi mdi-content-save"></i> Guardar</button>
                  </div>

         </form>         
                   

                  </div>




              


                </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>

@endsection