@extends('layouts.app')

@section('name','..|Ordenes de Venta Cotizadas|..')

@section('ol')
 <a style="color: #e68618;" href="{{url('home')}}" class="link" title=""><i class="mdi mdi-home"></i> Home
</a>
/
 <a class="link" title=""><i class="mdi mdi-account-location"></i> Ordenes</a>
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

function numero(num){
    if(num < 10){
      num="00000"+num;
    }else if(num < 100){
      num="0000"+num;
    }else if(num < 1000){
      num="000"+num;
    }else if(num < 100000){
      num="0"+num;
    }
  return num;
}


var formato= {
 separador: ".", // separador para los miles
 sepDecimal: ',', // separador para los decimales
 formatear:function (num){
 num +='';
 var splitStr = num.split('.');
 var splitLeft = splitStr[0];
 var splitRight = splitStr.length > 1 ? this.sepDecimal + splitStr[1] : '';
 var regx = /(\d+)(\d{3})/;
 while (regx.test(splitLeft)) {
 splitLeft = splitLeft.replace(regx, '$1' + this.separador + '$2');
 }
 return this.simbol + splitLeft +splitRight;
 },
 new:function(num, simbol){
 this.simbol = simbol ||'';
 return this.formatear(num);
 }
}

function fecha(data){
var timestamp=new Date(data);
    var dia=new Date(timestamp).getDate();
    var mes=new Date(timestamp).getMonth()+1;
    var year=new Date(timestamp).getFullYear();
    mes= (mes < 10 ? '0' : '') + mes; 
    dia= (dia < 10 ? '0' : '') + dia; 
    var fecha=year+'-'+mes+'-'+dia;

 return (fecha);
}

  function mostrar(id){
    $('#title').html('Visualización de la Orden de Venta');
      route="{{url('cotizaciones')}}/"+id;
      $.get(route,(r)=>{
      asesor="";
      if((r.asesor_id)){
        asesor=r.asesor.nombre;
      }

      
      $('#fecha').val(fecha(r.fecha));
      $('#cliente').val(r.cotizacion.cliente.nombres);
      $('#condicion').val(r.condicion.condicion);
      $('#asesorName').val(asesor);
      $('#numero').val(numero(id));
      $('#impuesto').val(r.impuesto+' %');
      $('#iva-text').html(r.impuesto+' %');

      $('#body-articulos').empty();
      sub=0;
        $.each(r.cotizaciones,(k,v)=>{
            $('#body-articulos').append(`
          <tr id="fila_`+v.id+`" >
          
            <td>`+v.articulo.articulo+`</td>
            <td>`+v.cantidad+` </td>
            <td>`+formato.new(parseFloat(v.pvp))+` </td>
            <td>`+formato.new(v.descuento)+` % </td>
            <td>`+formato.new(((v.pvp * v.cantidad)-v.descuento))+` </td>
            
          </tr>
            `);
            sub+=v.cantidad*v.pvp;
        })

      $('#sub').html(sub);
      $('#iva').html(iva=sub * (r.impuesto / 100));
      $('#total').html(iva + sub);
      //console.log(r);
      $('#show_cotizacion').modal();
        i=1;
        //console.log(r.archivos);
          $('#archivos').empty();
        $.each(r.archivos,(v,k)=>{
          $('#archivos').append(` <a target=”_blank” href="{{asset('archivos')}}/`+k.archivo+`">`+k.archivo+`</a>  / &nbsp;`);
        });
      })
  }


</script>
@endsection
@section('content')
@include('modals.show_cotizacion')


  
  <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="mdi mdi-apps mr-1"></i>
                  Ordenes de Venta Registradas
                </h3>
               <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <a class="nav-link btn-success active" href="{{url('ordenes/create')}}" style="color: #fff !important;  " ><i class="mdi mdi-plus-circle"></i> Nueva Orden de Venta</a>
                    </li>
                      &nbsp;
                       <li class="nav-item">
                      <a class="nav-link active" href="{{url('ordenes/pdf')}}"  style="color: #fff !important;"><i class="mdi mdi-file-pdf"></i> Reporte</a>
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
                    <td>
                       <a href="{{url('ordenes/'.$o->id)}}" class="btn btn-outline-info btn-xs"><i class="mdi mdi-book-open"></i></a>
                     @if($o->status == 3) 
                      <a href="{{url('ordenes/'.$o->id.'/edit')}}" class="btn btn-outline-success btn-xs"><i class="mdi mdi-check-all"></i></a>

                     @endif

                        <button onclick="mostrar({{$o->id}})" class="btn btn-outline-primary btn-xs"><i class="mdi mdi-eye"></i></button>
                      <a href="#" class="btn btn-outline-danger btn-xs"><i class="mdi mdi-close"></i></a>

                       <a @if($o->status > 3) href="{{url('orden/pdf',$o->id)}}" title="Imprimir orden de venta" @else title="Debes Aprobar esta Orden de Venta para imprimir" @endif title="Imprimir orden de venta" class="btn btn-outline-secondary btn-xs"><i class="mdi mdi-file-pdf"></i></a>
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
                    <td>{{strtoupper('OV-'.$num)}}</td>
                    <td class="text-center">
                      @if($o->status == 3)
                        <small class="text-red"><i class="mdi mdi-help"></i> Pendiente</small>

                      @elseif($o->status == 4)
                        <small class="text-blue"><i class="mdi mdi-book-open"></i> Abierta</small>
                      @elseif($o->status == 5)
                        <small class="text-green"><i class="mdi mdi-check-all"></i> Cerrada</small>


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