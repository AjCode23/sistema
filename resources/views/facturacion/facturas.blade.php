@extends('layouts.app')

@section('name','..|Facturas Pendientes |..')

@section('ol')
 <a style="color: #e68618;" href="{{url('home')}}" class="link" title=""><i class="mdi mdi-home"></i> Home
</a>
/
 <a class="link" title=""><i class="mdi mdi-account-location"></i> Facturacion</a>
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
                  Facturación
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                  <!--
                    <li class="nav-item">
                      <a class="nav-link btn-success active" href="{{url('articulos/create')}}" style="color: #fff !important;" ><i class="mdi mdi-plus-circle"></i> Agregar</a>
                    </li>
                      &nbsp;
                       <li class="nav-item">
                      <a class="nav-link active" href="#revenue-chart" data-toggle="tab" style="color: #fff !important;"><i class="mdi mdi-file-pdf"></i> Reporte</a>
                    </li>
                  
            -->
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
                    <th>Cliente</th>
                    <th>Condicion de Pago</th>
                    <th>Asesor</th>
                    <th>Fecha</th>
                   
                    <th  class="text-center">Serie-Numero</th>
                    <th  class="text-center">Estado</th>
                  </tr>
                  </thead>

                  <tbody>
                  @foreach($ordens as $o)
                  <tr>
                    <td @if($o->status == 4) style="background: red;"  @endif>
                    
                      <a href="{{url('facturaciones/'.$o->id.'/edit')}}" class="btn btn-outline-success btn-xs"><i class="mdi mdi-ticket-confirmation"></i></a>
             
                      <a href="#" class="btn btn-outline-danger btn-xs"><i class="mdi mdi-close"></i></a>
                       <a href="{{url('facturaciones/pdf',$o->id)}}" title="Imprimir Cotizacion" class="btn btn-outline-secondary btn-xs"><i class="mdi mdi-file-pdf"></i></a>
                    </td>
                    <td>{{strtoupper($o->cotizacion->cliente->nombres)}}</td>
                    <td>{{strtoupper($o->condicion->condicion)}}</td>
                    <td>@if($o->asesor) {{strtoupper($o->asesor->asesor)}} @else  Ninguno @endif</td>
                    <td>{{strtoupper($o->fecha->format('d-m-Y'))}}</td>
                    
                <?php 

                 if($o->id < 10){
                        $num="00000".$o->id;
                     }else if($o->id < 100){
                        $num="0000".$o->id;
                     }else if($o->id < 1000){
                        $num="000".$o->id;
                     }else if($o->id < 100000){
                        $num="0".$o->id;

                     }elseif($o->id < 1000000){
                        $num=$o->id;
                     }
                  ?>
                    <td>{{strtoupper('FACT-'.$num)}}</td>
                    <td class="text-center">
                      @if($o->status == 3)
                        <b class="text-green"> <i class="mdi mdi-check"></i></b>

                      @else
                      {{$o->status}}
                        <b class="text-red"> <i class="mdi mdi-close"></i></b>

                      @endif

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