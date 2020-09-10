@extends('layouts.app')

@section('name','..|Clientes Registrados|..')

@section('ol')
 <a style="color: #e68618;" href="{{url('home')}}" class="link" title=""><i class="mdi mdi-home"></i> Home
</a>
/
 <a class="link" title=""><i class="mdi mdi-account-location"></i> Clientes</a>
@endsection

@section('css')
  <link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">

@endsection

@section('js')
 <!-- DataTables -->
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
    if(confirm('¿Desea desabilitar Cliente?')){
      $('#status_'+id).html(`<b class="text-red"> <i class="mdi mdi-close"></i></b>`);
      $('#btn_'+id).html(`  <button onclick="act(`+id+`)" class="btn btn-outline-success btn-xs"><i class="mdi mdi-check"></i></button>`);
      route="{{url('clientes/delete')}}/"+id;
      $.get(route);
    }
  }


    function act(id){
    if(confirm('¿Desea Habilitar Cliente?')){
      $('#status_'+id).html(`<b class="text-green"> <i class="mdi mdi-check"></i></b>
`);
      $('#btn_'+id).html(`    <button onclick="del(`+id+`)" class="btn btn-outline-danger btn-xs"><i class="mdi mdi-close"></i></button>`);
        route="{{url('clientes/activar')}}/"+id;
      $.get(route);
    }
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
                  <i class="mdi mdi-apps mr-1"></i>
                  clientes
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <a class="nav-link btn-success active" href="{{url('clientes/create')}}" style="color: #fff !important;" ><i class="mdi mdi-plus-circle"></i> Agregar</a>
                    </li>
                      &nbsp;
                       <li class="nav-item">
                      <a class="nav-link active" href="{{url('clientes/pdf')}}"  style="color: #fff !important;"><i class="mdi mdi-file-pdf"></i> Reporte</a>
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
                    <th>Nombre / Razón Social</th>
                    <th>NIT / Documento</th>
                    <th>Email</th>
                    <th >Ciudad</th>
                    <th>Departamento</th>
                    <th>Asesor Comercial</th>
                    <th class="text-center">Estado</th>
                  </tr>
                  </thead>

                  <tbody>
                  @foreach($clientes as $c)
                  <tr>
                    <td>
                      <a href="{{url('clientes/'.$c->id.'/edit')}}" class="btn btn-outline-warning btn-xs"><i class="mdi mdi-pencil"></i></a>
                      <a href="{{url('clientes',$c->id)}}" class="btn btn-outline-info btn-xs"><i class="mdi mdi-eye"></i></a>

                       <span id="btn_{{$c->id}}">
                        @if($c->status == 1)
                         <button onclick="del({{$c->id}})" class="btn btn-outline-danger btn-xs"><i class="mdi mdi-close"></i></button>
                        @else 
                         <button onclick="act({{$c->id}})" class="btn btn-outline-success btn-xs"><i class="mdi mdi-check"></i></button>

                        @endif
                         <a href="{{url('clientes/pdf',$c->id)}}" class="btn btn-outline-secondary btn-xs"><i class="mdi mdi-file-pdf"></i></a>
                    </td>
                    <td>{{strtoupper($c->nombres)}}</td>
                    <td>{{strtoupper($c->tipoDocumento)}} / {{$c->numDocumento}} </td>
                    <td>{{strtoupper($c->email)}}</td>
                    <td>{{strtoupper($c->direccion->ciudad)}}</td>
                    <td>{{strtoupper($c->direccion->departamento)}}</td>
                   
           
                    <td>@if($c->asesor){{strtoupper($c->asesor->nombre)}}@else NINGUNO @endif</td>
                    <td class="text-center">
                       <span id="status_{{$c->id}}">
                        
                      @if($c->status == 1)
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