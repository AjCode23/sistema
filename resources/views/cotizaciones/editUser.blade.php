@extends('layouts.app')

@section('name','..|Editar Cotizacion|..')

@section('ol')
 <a style="color: #e68618;" href="{{url('home')}}" class="link" title=""><i class="mdi mdi-home"></i> Home
</a>
/
 <a class="link" title=""><i class="mdi mdi-account-location"></i> Editar Cotizacion</a>
@endsection

@section('css')
  <link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  
@endsection

@section('js')
 <!-- DataTables -->
<script src="{{asset('datatables/jquery.dataTables.min.js')}}"></script>
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

  function add(a){
 cont=$('#cont').val();
 cont = cont+1;
  	$('#cotizacion').append(`
		<tr id="fila`+(cont)+`">
			<td></td>
			<td>`+a.articulo+`</td>
			<td> Stock: `+a.stock+`<i class="fa fa-arrow-alt-circle-left"></i> <input type="number"  id="stock`+cont+`" cstyle="width:120px;" min="1" name="cant[]" value="1" placeholder="1"></td>
			<td><input type="number" onchange="sub(this,`+cont+`)" id="pvp`+cont+`"  step="0.01" style="width:120px;" min="1" name="pvp[]" value="`+a.pvp+`" placeholder=""></td>
			<td><input type="number" style="width:120px;" min="0" step="0.01" id="descuento`+cont+`" name="descuento[]" value="0.0" placeholder=""></td>
			<td>$<span id="sub`+cont+`"></span></td>
		</tr>
  		`);

 $('#cont').val(cont);

 	$('#sub'+cont).html(cont);
  	var stock=$('#stock'+cont).val();
  	var des=$('#descuento'+cont).val();
  	var pvp=$('#pvp'+cont).val();
  	$('#sub'+cont).html((parseFloat(stock)*parseFloat(pvp))-parseFloat(0));
  }


  function sub(input,cont){
  	$('#sub'+cont).html(cont);
  	var stock=$('#stock'+cont).val();
  	var des=$('#descuento'+cont).val();
  	var pvp=input.value;
  	$('#sub'+cont).html((parseFloat(stock)+parseFloat(pvp))+parseFloat(0));
  	console.log((parseFloat(stock)+parseFloat(pvp))+parseFloat(0));

  	
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

  function agregar(id){
  	cliente_id=$('#select').val();
  	if(!cliente_id){
  		alert('Debes seleccionar el cliente que se le realizara la cotizacion!');
  		return false;
  	}
  	//if(confirm('¿Esta seguro de Agregar?')){
  		producto_id=$('#producto_'+id).val();
  		cantidad=$('#cant_'+id).val();
  		descuento=$('#descuento_'+id).val();
  		orden_id=$('#orden_id').val();
  		pvp=$('#pvp_'+id).val();
  		route="{{url('cotizacion/add')}}/"+id;
  		variables = {cliente_id:cliente_id,articulo_id:producto_id,cantidad:cantidad,pvp:pvp,descuento:descuento,orden_id:orden_id,status:2};
  		$.get(route,variables,(v)=>{


  			total=((v.pvp * v.cantidad)-v.descuento);
  			$('#cotizacion').append(`
		<tr id="fila_`+v.id+`" >
		
			<td>`+v.articulo.articulo+`</td>
			<td>`+v.cantidad+` </td>
			<td>`+formato.new(v.pvp)+` </td>
			<td>`+formato.new(v.descuento)+` % </td>
			<td>`+formato.new(total)+` </td>
			<td><button onclick="eliminar(`+v.id+`)" class="btn btn-outline-danger btn-xs"><i class="mdi mdi-close"></i></a> </td>
		</tr>
  		`);

		sub=$('#input_sub').val();

		$('#input_sub').val(parseFloat(sub) + parseFloat(total));
		totales();

  		});
  	//}
  }
function eliminar(id){
	if(confirm('¡Desea quitar este Producto de la cotización?')){

		$('#fila_'+id).empty();
	  	route="{{url('cotizacion/delete')}}/"+id;
	  	$.get(route,(total)=>{
	  		sub=$('#input_sub').val();

		$('#input_sub').val(parseFloat(sub) - parseFloat(total));
		totales();
	  	});
	}

}

function totales(){
sub=$('#input_sub').val();
iva=$('#input_iva').val();

$('#sub').html(formato.new(sub));
$('#iva').html(formato.new(sub * (iva /100)));
$('#iva-text').html(formato.new(iva));
total=parseFloat(sub * (iva /100))+ parseFloat(sub);
$('#total').html(formato.new(total));

		if(sub > 0){
			$('#btns').show();

		}else{
			$('#btns').hide();

		}
}

carga({{$orden->id}});
  function carga(id){
  	$('#cotizacion').empty();
  	$('#btns').hide();
 

  		route="{{url('cotizacion/detalles/edit')}}/"+id;
  		$.get(route,(dt)=>{
  			sub=0;
  			iva=0;
  			total=0;
  				$.each(dt.cotizaciones,(k,v)=>{
  					if(v.status > 0){

  					$('#cotizacion').append(`
		<tr id="fila_`+v.id+`" >
		
			<td>`+v.articulo.articulo+`</td>
			<td>`+v.cantidad+` </td>
			<td>`+formato.new(parseFloat(v.pvp))+` </td>
			<td>`+formato.new(v.descuento)+` % </td>
			<td>`+formato.new(((v.pvp * v.cantidad)-v.descuento))+` </td>
			<td><button onclick="eliminar(`+v.id+`)" class="btn btn-outline-danger btn-xs"><i class="mdi mdi-close"></i></a> </td>
		</tr>
  		`);
  					}
  					sub+=(parseFloat(v.pvp) * parseFloat(v.cantidad));

  				})

	        $('#input_sub').val(sub);
  			totales();

  		});
  	
  }


  $('#tipoDocumento').on('change',()=>{

  });

  $('#Valimpuesto').on('change',()=>{
  casilla=$('#Valimpuesto').prop('checked') ;
  if(casilla){
  	$('#input_iva').val(19);
  	$('#input_iva2').val(19);

  }else{
  	$('#input_iva').val(0);
  	$('#input_iva2').val(0);
  	
  }
  totales();
  });


  function cancelar(){
  	id=$('#select').val();
  	if(confirm('¡Esta usted seguro de cancelar la cotizacion? se perderá todo el progreso')){
  		document.location="{{url('cotizacion/destroy/full')}}/"+id;
  	}
  }


  function guardar(){
  	
  	if(confirm('Esta usted seguro de Guardar la cotizacion!')){
  		$('#form-guardar').submit();
  	}
  }
  function cambiar(num){
  
  	if(num < 10){
  		num="00000"+num;
  	}else if(num < 100){
  		num="0000"+num;
  	}else if(num < 1000){
  		num="000"+num;
  	}else if(num < 100000){
  		num="0"+num;
  	}
 	$('#numero').val(num);

 	setTimeout(function(){
 		route="{{url('cotizacion/max')}}";
 		$.get(route,(r)=>{
			cambiar(r);
 		});
},60000);

  }
cambiar({{$sec}});





</script>
@endsection
@section('content')

@include('modals.add_productos')

  <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="mdi mdi-apps mr-1"></i>
                  Editar Cotizacion
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <a class="nav-link btn-danger btn-flat active"  href="{{url('cotizaciones')}}" style="color: #fff !important; background: #828282" ><i class="fa fa-list"></i> Cotizaciones</a>
                    </li>
                     
                  
                  </ul>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">

                 
                  @include('alerts')
                  <form id="form-guardar" action="{{url('cotizaciones/update',$orden->id)}}" method="post">
                  	{{csrf_field()}}
                  		<input type="hidden" name="id" value="{{$orden->id}}">
                 	<div class="row">
                 		
                 		<div class="col-md-6">
                 			<label for="">Cliente <b class="text-red">(*)</b></label>
                 			<select class="form-control " style="width: 100%;" name="cliente_id" required id="select">
                 				<option value="{{$orden->cotizacion->cliente_id}}" >{{$orden->cotizacion->cliente->nombres}}</option>
                 				

                 			
                 			</select>
                 		</div>

                 		<div class="col-md-2">
                 			<label for=""> Condicion de Pago <b class="text-red">(*)</b></label>
                 			<select class="form-control " name="condicion_id" required >
                 				
                 				@foreach($condiciones as $c)
                 				<option value="{{$c->id}}">{{$c->condicion}}</option>

                 				@endforeach
                 				
                 			</select>
                 		</div>

                 		<div class="col-md-4">
                 			<label for="">Fecha <b class="text-red">(*)</b></label>
                 			<div class="input-group mb-3">
			                  <div class="input-group-prepend">
			                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
			                  </div>
			                  <input type="date" value="{{Date('Y-m-d')}}" class="form-control" name="fecha">
			                </div>
                 		</div>
                 	</div>

			
                 	<div class="row">
                 		
                 		<div class="col-md-4">
                 			<label for=""> Tipo de documento: <b class="text-red">(*)</b></label>
                 			<select class="form-control " name="tipoDocumento" id="tipoDocumento" required >
                 			
                 				<option value="2">Cotizacion</option>
                 				
                 				
                 			</select>
                 		</div>




                 		<div class="col-md-2">
                 			<label for=""> Serie:</label>
	                 		<input type="text" value="COT-"  class="form-control" style="background: #fff;" disabled="" name="serie">
                 		</div>


                 		<div class="col-md-2">
                 			<label for=""> Número:</label>
	                 		<input type="text" class="form-control" id="numero" style="background: #fff;" disabled="" name="numero">
                 		</div>

                 			<div class="col-md-2">
                 			<label for=""> Asesor <b class="text-red">(*)</b></label>
                 			<select class="form-control " name="asesor_id" required >
                 				<option value="">Ninguno</option>
                 				@foreach($asesores as $a)
                 				<option value="{{$a->id}}">{{$a->nombre}}</option>

                 				@endforeach
                 				
                 			</select>
                 		</div>

                 		<div class="col-md-2">
                 			<label for=""> Aplicar Impuesto <b class="text-red">(*)</b></label>
                 			<div class="input-group mb-3">
			                  <div class="input-group-prepend">
			                  	  <span class="input-group-text">
			                    <input type="checkbox" @if($orden->impuesto > 0 ) checked = "checked" @endif class=""  id="Valimpuesto">
			                  	  </span>
			                  </div>
			                  <input type="text" disabled style="background: #fff;"  id="input_iva"  class="form-control" value="{{$orden->impuesto}}" placeholder="">
			                  <input type="hidden"  style="background: #fff;" name="impuesto" id="input_iva2"  class="form-control" value="0" placeholder="">
			                </div>
                 		</div>
                 	</div>
                 	

                 </form>
					<button data-toggle="modal" data-target="#add_productos" class="btn btn-danger" style="background: #781428; margin-bottom: 10px;"><i class="fa fa-plus"></i> Agregar Producto</button>
                 

                 	<table class="table table-hover" >
                 		<tr style="background: #828282; color: #fff">
                 			<th>Articulo</th>
                 			<th>Cantidad</th>
                 			<th>Precio Venta</th>
                 			<th>Descuento</th>
                 			<th>Subtotal</th>
                 			<th>Opciones</th>
                 		</tr>

                 		<tbody id="cotizacion"></tbody>
                 		<tr style="background-color:#A9D0F5" >
                 			
                 			<th colspan="4"></th>
                 			<th>
                 				<span>Subtotal</span><br>
                 				<span>I.V.A <span id="iva-text">0</span>%</span><br>
                 				<span>total</span>
                 				

                 			</th>
                 			<th>
                 				$<span id="sub" >{{number_format(0,2,',','.')}}</span><br>
                 				$<span  id="iva">{{number_format(0,2,',','.')}}</span><br>
                 				$<span id="total">{{number_format(0,2,',','.')}}</span>
                 				
                 			</th>
                 		</tr>
                 	</table>
                 	
	<input type="hidden" id="input_sub" value="0">
<div id="btns" style="display: none">
	
	<button  class="btn btn-danger" onclick="guardar();" style="background: #781428; "><i class="fa fa-database"></i> Modificar Cotización</button>
	<a href="{{url('cotizaciones')}}" class="btn btn-danger"  ><i class="mdi mdi-close"></i> Cancelar</a>
</div>

                </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>

@endsection