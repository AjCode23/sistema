@extends('layouts.app')

@section('name','..|Articulos Registrados|..')

@section('ol')
 <a style="color: #e68618;" href="{{url('home')}}" class="link" title=""><i class="mdi mdi-home"></i> Home
</a>
/
 <a class="link" title=""><i class="mdi mdi-account-location"></i> Articulos</a>
@endsection

@section('css')
  <link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}"> 

@endsection

@section('js')
 <!-- DataTables -->
<script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.0/dist/JsBarcode.all.min.js" type="text/javascript"></script>
<script src="{{asset('datatables/jquery.dataTables.min.js')}}"></script>
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


  function del(id){
    if(confirm('¿Desea desabilitar Producto?')){
      $('#status_'+id).html(`<b class="text-red"> <i class="mdi mdi-close"></i></b>`);
      $('#btn_'+id).html(`  <button onclick="act(`+id+`)" class="btn btn-outline-success btn-xs"><i class="mdi mdi-check"></i></button>`);
      route="{{url('articulos/delete')}}/"+id;
      $.get(route);
    }
  }


    function act(id){
    if(confirm('¿Desea Habilitar Producto?')){
      $('#status_'+id).html(`<b class="text-green"> <i class="mdi mdi-check"></i></b>
`);
      $('#btn_'+id).html(`    <button onclick="del(`+id+`)" class="btn btn-outline-danger btn-xs"><i class="mdi mdi-close"></i></button>`);
        route="{{url('articulos/activar')}}/"+id;
      $.get(route);
    }
  }


  function generar(codigo){

  $('#barcodeModal').modal();
  JsBarcode("#barcode",codigo);
  }
</script>
@endsection
@section('content')
@include('modals.barcode')

  
  <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="mdi mdi-apps mr-1"></i>
                  Articulos
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <a class="nav-link btn-success active" href="{{url('articulos/create')}}" style="color: #fff !important;" ><i class="mdi mdi-plus-circle"></i> Agregar</a>
                    </li>
                      &nbsp;
                       <li class="nav-item">
                      <a class="nav-link active" target="_blank" href="{{url('articulos/pdf')}}" style="color: #fff !important;"><i class="mdi mdi-file-pdf"></i> Reporte</a>
                    </li>
                  
                  </ul>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">

                 
                  @include('alerts')
                  
                   <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Opciones</th>
                    <th>Tipo</th>
                    <th>Nombre</th>
                    <th>Categoria</th>
                    <th colspan="2">Codigo</th>
                    <th>Stock</th>
                    <th class="text-center">Imagen</th>
                    <th>Descripcion</th>
                    <th  class="text-center">Estado</th>
                  </tr>
                  </thead>

                  <tbody>
                  @foreach($articulos as $a)
                  <tr>
                    <td>
                      <a href="{{url('articulos/'.$a->id.'/edit')}}" class="btn btn-outline-warning btn-xs"><i class="mdi mdi-pencil"></i></a>
                      <span id="btn_{{$a->id}}">
                        @if($a->status == 1)
                         <button onclick="del({{$a->id}})" class="btn btn-outline-danger btn-xs"><i class="mdi mdi-close"></i></button>
                        @else 
                         <button onclick="act({{$a->id}})" class="btn btn-outline-success btn-xs"><i class="mdi mdi-check"></i></button>

                        @endif
                      </span>
                    </td>
                    <th>@if($a->tipoProducto == 1) Articulo  @else Servicio  @endif</th>
                    <td>{{strtoupper($a->articulo)}}</td>
                    <td>{{strtoupper($a->categoria->categoria)}}</td>
                    <td> {{strtoupper($a->codigo)}} </td>
                    <td> <button onclick="generar('{{$a->codigo}}')" class="btn btn-outline-secondary btn-xs"><i class="mdi mdi-barcode"></i></button> </td>
                    <td>{{strtoupper($a->stock)}}</td>
                    <td class="text-center"><img src="{{asset('imgArticulos/'.$a->path)}}"  style="width: 100px; height: 30px;" alt=""></td>
           
                    <td>{{strtoupper($a->descripcion)}}</td>
                    <td class="text-center">
                      <span id="status_{{$a->id}}">
                        
                      @if($a->status == 1)
                        <b class="text-green"> <i class="mdi mdi-check"></i></b>

                      @else

                        <b class="text-red"> <i class="mdi mdi-close"></i></b>

                      @endif
                      </span>

                    </td>
                    
                   
                  </tr>
                  @endforeach
                </table>


                </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>

@endsection