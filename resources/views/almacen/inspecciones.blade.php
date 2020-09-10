@extends('layouts.app')

@section('name','..|Inspecciones Registradas|..')

@section('ol')
 <a style="color: #e68618;" href="{{url('home')}}" class="link" title=""><i class="mdi mdi-home"></i> Home
</a>
/
 <a class="link" title=""><i class="mdi mdi-account-location"></i> Inspecciones</a>
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
  



 $('#table2').DataTable({
      "responsive": true,
      "autoWidth": false,
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

  function del(id){
    if(confirm("¡Desea Inabilitar esta Categoria?")){
      $('#tr_'+id).hide();
      $('#delete_id').val(id);
      route="{{url('categoria/delete')}}/"+id;
            $.get(route,()=>{
              console.log(1);
            });

    }
  }


  function del(id){
    if(confirm("¡Desea Inabilitar esta Categoria?")){
      $('#status_'+id).html(` <b class="text-red" title="Categoria Inactiva"> <i class="mdi mdi-alert-circle"></i> <small>Inactiva</small> </b> `);

       $('#btn_'+id).html(`  <button onclick="act(`+id+`)" class="btn btn-outline-success btn-xs"><i class="mdi mdi-check"></i></button> `);
      route="{{url('categoria/delete')}}/"+id;
            $.get(route,()=>{
              console.log(1);
            });

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


  function ocultar(data=null){
  	$('#new_inspeccion').hide();
  	$('#form-insp').attr('action', "{{url('almacen/inspeccion')}}/"+data.id);
  	$('#cliente_id').html(data.cliente.nombres);
  	$('#equipo').html(data.articulo.articulo);
  	$('#marca').html(data.marca);
  	$('#serie').html(data.numero);
  	console.log(data);
  }


  function mostrar(){
  	$('#new_inspeccion').show();
 
  }


  function ver(data){
  	//console.log(data.inspecciones);
	$('#clt').html(data.cliente.nombres);
  	$('#equi').html(data.articulo.articulo);
  	$('#mar').html(data.marca);
  	$('#ser').html(data.numero);
  	$('#observaciones').html(data.observaciones);
  	$('#usuario_ver').html(data.inspeccion.user.nombres+' '+data.inspeccion.user.tipo_documento+'-'+data.inspeccion.user.num_documento);
  		console.log(data.inspeccion.user);
  	var i=1;
  	$(data.inspecciones).each((k,v)=>{
  		$('#opcion_'+i).html(v.data);
  		$('#observacion_'+i).html(v.observacion);
  		i=i+1;
  	});

  	$('#show_inspeccion').modal();
  }



  function editar(data){
  	//console.log(data.inspecciones);
	$('#clt_edit').html(data.cliente.nombres);
  	$('#equi_edit').html(data.articulo.articulo);
  	$('#mar_edit').html(data.marca);
  	$('#ser_edit').html(data.numero);
  	$('#observaciones_edit').html(data.observaciones);
  		$('#form-edit-insp').attr('action', "{{url('almacen/inspeccion/update')}}/"+data.id);
  	/*$('#usuario_ver').html(data.inspeccion.user.nombres+' '+data.inspeccion.user.tipo_documento+'-'+data.inspeccion.user.num_documento);
  		console.log(data.inspeccion.user);*/
  	var i=1;
  	$(data.inspecciones).each((k,v)=>{
  		$('#eopcion_'+i).val(v.data);
  		$('#eobservacion_'+i).val(v.observacion);
  		i=i+1;
  	});

  	$('#edit_inspeccion').modal();
  }
</script>
@endsection
@section('content')
@include('modals.show_inspeccion')
@include('modals.new_inspeccion')
@include('modals.add_inspeccion')
@include('modals.edit_inspeccion')


  
  <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="mdi mdi-apps mr-1"></i>
                  Inspecciones Realizadas
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <a class="nav-link btn-success active"  data-toggle="modal" data-target="#new_inspeccion" style="color: #fff !important;" ><i class="mdi mdi-help"></i> Inspecciones Pendientes</a>
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
                  
                   <table id="table2" class="table table-bordered table-striped ">
                  <thead>
                 <tr>
                    <th>Opciones</th>
                    <th>Cliente</th>
                    <th>Equipo</th>
                    <th>Usuario</th>
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
                     
                      <a onclick="editar({{$c}})" title="Editar Inspeccion" class="btn btn-outline-info btn-xs"><i class="mdi mdi-pencil"></i></a>
		                  <span id="btn_{{$c->id}}">
		                  	
		                     @if($c->status == 1)
		                      <a href="{{url('almacen/inspeccion',$c->id)}}" title="inspeccion Inicial" class="btn btn-outline-success btn-xs"><i class="mdi mdi-check-all"></i></a>
		                      <button onclick="del({{$c->id}})" class="btn btn-outline-danger btn-xs"><i class="mdi mdi-close"></i></button>

		                       
		                      @elseif($c->status == 2)

		                      <button onclick="ver({{$c}})"  title="Ver Inspeccion" class="btn btn-outline-success btn-xs"><i class="mdi mdi-folder-open"></i></button>

		                      @endif
		                  </span>    
                    </td>
                    <td>{{($c->cliente->nombres)}}</td>
                    <td>{{($c->articulo->articulo)}}</td>
                    <td>{{($c->inspeccion->user->nombres)}} | {{($c->inspeccion->user->num_documento)}}</td>
                    <td>{{($c->marca)}}</td>
                    <td>{{($c->modelo)}}</td>
                    <td>{{($c->numero)}}</td>
                    <td class="text-center">
               			<span id="status_{{$c->id}}">
               				
		                      @if($c->status == 0)
		                        <b class="text-red" title="Categoria Inactiva"> <i class="mdi mdi-alert-circle"></i> <small>Inactiva</small> </b> 	

		                      @else

		                       
		                         
		                        <b class="text-success" title="Categoria Activar"> <i class="mdi mdi-check-all"></i> <small>Inspeccionado</small></b>
		                  

		                   
		                      @endif
               			</span>

                    </td>
                    
                   
                  </tr>
                  @endforeach
                </table>

<hr>

  
                </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
    

@endsection