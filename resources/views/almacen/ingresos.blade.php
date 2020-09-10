@extends('layouts.app')

@section('name','..|Ingresos de Equipos Registrados|..')

@section('ol')
 <a style="color: #e68618;" href="{{url('home')}}" class="link" title=""><i class="mdi mdi-home"></i> Home
</a>
/
 <a class="link" title=""><i class="mdi mdi-account-location"></i> Ingresos</a>
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


  function mostrar(id){
  		route="{{url('cotizaciones')}}/"+id;
  		$.get(route,(r)=>{
  		asesor="";
  		if((r.asesor_id)){
  			asesor=r.asesor.nombre;
  		//	console.log(asesor);
  		}
  		$('#fecha').val(r.fecha);
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
  		})
  }

  /*function del(id){
    if(confirm("¡Desea Inabilitar esta Categoria?")){
      $('#tr_'+id).hide();
      $('#delete_id').val(id);
      route="{{url('categoria/delete')}}/"+id;
            $.get(route,()=>{
              console.log(1);
            });

    }
  }*/


  function del(id){
    if(confirm("¡Desea Eliminar este Ingreso?")){
      
        $('#form-del').attr('action', "{{url('almacen/delete')}}/"+id);
      
           $('#form-del').submit();
    }
  }

   function act(id){
    if(confirm("¡Desea Activar esta Categoria?")){
      $('#status_'+id).html(`<b class="text-green" title="Categoria Activa"> <i class="fa fa-check"></i> <small>Activa</small></b> `);

      $('#btn_'+id).html(` <button onclick="del(`+id+`)" class="btn btn-outline-danger btn-xs"><i class="mdi mdi-close"></i></button> `);
      route="{{url('categoria/act')}}/"+id;
            $.get(route,()=>{
              console.log(1);
            });

    }
  }
</script>
@endsection
@section('content')
@include('modals.show_cotizacion')

<form id="form-del" method="post">
  {{csrf_field()}}
</form>
  
  <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="mdi mdi-apps mr-1"></i>
                  Equipos Ingresados
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <a class="nav-link btn-success active" href="{{url('almacen/ingreso')}}" style="color: #fff !important;" ><i class="mdi mdi-plus-circle"></i> Nuevo Ingreso</a>
                    </li>
                      &nbsp;
                       <li class="nav-item">
                      <a class="nav-link active" href="{{url('categorias/pdf')}}"  style="color: #fff !important;"><i class="mdi mdi-file-pdf"></i> Reporte</a>
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
                    <th>Equipo</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Num. Serie</th>
                    <th  class="text-center">Estado</th>
                  </tr>
                  </thead>

                  <tbody>
                  @foreach($ingresos as $c)
                  <tr id="tr_{{$c->id}}">
                    <td width="30px;" class="text-center">
                     
                      <a href="{{url('almacen',$c->id)}}/edit" title="Editar Ingreso" class="btn btn-outline-info btn-xs"><i class="mdi mdi-pencil"></i></a>
		                 
		                  	
		                     @if($c->status == 1)
		                      <a href="{{url('almacen/inspecciones')}}" title="inspeccion Inicial" class="btn btn-outline-success btn-xs"><i class="mdi mdi-check-all"></i></a>
		                      @endif
		                      <button onclick="del({{$c->id}})" class="btn btn-outline-danger btn-xs"><i class="mdi mdi-close"></i></button>
		            
                    </td>
                    <td>{{($c->cliente->nombres)}}</td>
                    <td>{{($c->articulo->articulo)}}</td>
                    <td>{{($c->marca)}}</td>
                    <td>{{($c->modelo)}}</td>
                    <td>{{($c->numero)}}</td>
                    <td class="text-center">
               			<span id="status_{{$c->id}}">
               				
		                      @if($c->status == 1)

                            <b class="text-info" title="ingreso de equipo abierto esperando por inspeccionar"> <i class="fa fa-check"></i> <small>Abierta</small></b>
		                      @else
                           
		                        <b class="text-green" title="El equipo ya fue Inspeccionado"> <i class="mdi mdi-check-all"></i> <small>Inspeccionado</small> </b> 	
                        
                             
                      

		                   
		                      @endif
               			</span>

                    </td>
                    
                   
                  </tr>
                  @endforeach
                </table>

<hr>
<h4>Estados de ingresos de equipos</h4>
<div class="table-responsive">  
  <table class="table table-bordered">
    <tr>
      <th> <b class="text-info bold" title="Aprobada"> <i class="mdi mdi-check"></i> <small>Abierta</small></b></th>

      <th>
         <b class="text-green" title="Pendiente Por Aprobar"> <i class="mdi mdi-check-all"></i> <small>Inspeccionado</small> </b>
      </th>

     

     
    </tr>
    <tr>
      <td>Equipo ingresado en espera de inspección </td>
      <td>Equipo inspeccionado!</td>
      
    </tr>
  </table>
</div>
  
                </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
    

@endsection