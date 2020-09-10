@extends('layouts.app')

@section('name','..|Visualizacion de Clientes|..')

@section('ol')
 <a style="color: #e68618;" href="{{url('home')}}" class="link" title=""><i class="mdi mdi-home"></i> Home
</a>
/
 <a class="link" title=""><i class="mdi mdi-account-location"></i> Mostrar Cliente</a>
@endsection

@section('css')
  <link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">

@endsection




@section('js')

  <script>
  	
 function masTlf(num){
 	if(num <= 2){
 		$('#addTlf').modal();
 		$('#btn_telefono_plus').val(num);
 	}else{
 		Swal.fire(
		  '¡Atención!',
		  'Disculpa no puedes Tener mas de tres telefonos activos?',
		  'info'
)
 	}
}


  	
 function masBanco(num){
 		$('#addBanco').modal();
 	
}


 function masComercio(){
 		$('#addComercio').modal();
 	
}

function delMoneda(id){
	Swal.fire({
  title: 'Confirmación?',
  text: "Esta seguro de eliminar esta Moneda!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, Eliminar!'
}).then((result) => {
  if (result.value) {
    Swal.fire(
	      'Eliminada!',
      'La Moneda Fue Eliminada Correctamente',
      'success'
    )

    document.location="{{url('moneda/delete')}}/"+id;
  }
})
}

function delete_row_tlf(row){


	plus=$('#btn_telefono_plus');
	btn=parseFloat(plus.val());
	plus.val(btn-1);
	$('#tlf_'+row).empty();
	console.log(row);
}

function mMoneda(){

 		$('#addMoneda').modal();
}


function tlf(btn){
	cont=parseFloat(btn.value);
	aux=$('#contadorTlf');
	if(cont <2){
		$('#masTlf').append(`

			<div class="row" id="tlf_`+aux.val()+`">
      			<div class="col-md-5">
      				<label for="">Tipo Telefono <b class="text-red">(*)</b></label>
		                     <select class="form-control select-picker" name="tipo_tlf[]" id="tipo_tlf" required>
		                       <option value="">SELECIONE TIPO DE TELEFONO</option>
		                       <option value="1">TELEFONO PRINCIPAL</option>
		                       <option value="2">TELEFONO SECUNDARIO</option>
		                       <option value="3">TELEFONO MOVIL</option>
		                     </select>
      			</div>
				<div class="col-md-5">
      			<label for="">Numero de Telefono <b class="text-red">(*)</b></label>
                        <input class="form-control" type="number" name="numero[]"   placeholder="Numero Telefonico" required>
      			</div>

      			<div class="col-md-2">
      				<label for=""><br>&nbsp; <br></label>
                     		
                     		<button type="button" class="btn btn-default mt-8" onclick='delete_row_tlf(`+aux.val()+`)' style="margin-top: 20px;"><i class="fa fa-trash"></i></button>
      			</div>


      		</div>

      		`);
	
	$('#btn_telefono_plus').val(cont+1);
	aux.val(parseFloat(aux.val())+1);
	
	}

}



function edit(data)
{
	 $("#form-edit-tlf").attr("action","{{url('clientes/edit/telefono')}}/"+data.id);
	$('#edit_tipo_tlf').val(data.tipoTlf);
	$('#edit_numero').val(data.numero);
	$('#editTlf').modal();
}



function editBanco(data)
{
	 $("#form-edit-banco").attr("action","{{url('clientes/edit/banco')}}/"+data.id);
	$('#edit_tipo_cuenta').val(data.tipo_cuenta);
	$('#edit_cuenta').val(data.cuenta);
	$('#edit_banco').val(data.banco);
	$('#editBanco').modal();
}



function editComercio(data)
{

	
	 $("#form-edit-comercio").attr("action","{{url('clientes/edit/comercio')}}/"+data.id);
	$('#edit_nombreComercial').val(data.nombreComercial);
	$('#edit_emailContacto').val(data.emailContacto);
	$('#edit_tlfOficina').val(data.tlfOficina);
	$('#edit_tlfPersonal').val(data.tlfPersonal);
	$('#editComercio').modal();
}
  </script>
@endsection




@section('content')

@include('modals.addTlf')
@include('modals.addMoneda')
@include('modals.addComercio')
@include('modals.addBanco')
@include('modals.editTlf')
@include('modals.editBanco')
@include('modals.editComercio')
  
  <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="mdi mdi-apps mr-1"></i>
                  Ver cliente
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    
                       <li class="nav-item">
                     
                      <a class="nav-link btn-success active" href="{{url('clientes',$cliente->id)}}/edit"  style="color: #fff !important;"><i class="fa fa-edit"></i> Editar</a>
                    </li>

					&nbsp;
                     <li class="nav-item">
                     
                      <a class="nav-link btn-danger active" href="{{url('clientes')}}"  style="color: #fff !important;"><i class="mdi mdi-reply"></i> Regresar</a>
                    </li>
                  
                  </ul>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">

                 
                  @include('alerts')
                  
<div class="table-responsive">
					<table class="table table-bordered text-center">
						<tr>
							<th>Nombre / Razón Social</th>
							<th>NIT / Documento</th>
							<th>Email</th>
							<th>Actividad Principal</th>
							
						</tr>
						<tr>
							<td>{{$cliente->nombres}}</td>
							<td>{{$cliente->tipoDocumento}} / {{$cliente->numDocumento}}</td>
							<td>{{$cliente->email}}</td>
							<td>{{$cliente->actPpal}}</td>
						</tr>


						<tr>
							<th>Direccion</th>
							<th>Pais</th>
							<th>Ciudad</th>
							<th>Departamento</th>
							
						</tr>
						<tr>
							<td>{{$cliente->direccion->direccion}}</td>
							<td>{{$cliente->direccion->pais}}</td>
							<td>{{$cliente->direccion->ciudad}}</td>
							<td>{{$cliente->direccion->departamento}}</td>
						</tr>


						<tr>
							<th>Regimen</th>
							<th>Resolucion</th>
							<th>CIU</th>
							<th  class="text-center">Monedas</th>
							
						</tr>
						<tr>
							<td>@if($cliente->regimen){{$cliente->regimen->regimen}}@endif</td>
							<td>@if($cliente->regimen){{$cliente->regimen->resolucion}}@endif</td>
							<td>@if($cliente->regimen){{$cliente->regimen->ciu}}@endif</td>
							<td >
								@foreach($cliente->monedas->where('status',1) as $m)
									<i class="mdi mdi-cash"></i>	{{$m->moneda}} <button class="btn btn-link" onclick="delMoneda({{$m->id}})" ><i class="fa fa-times text-red"></i></button> /
								@endforeach
								
									
								&nbsp;
								&nbsp;<button title="Agregar Moneda" type="button" onclick="mMoneda()" class="btn btn-outline-success btn-xs"><i class="mdi mdi-plus"></i></button>
								
							</td>
							
						</tr>




						<tr>
							<th>Correo de Facturación</th>
							<th colspan="2" class="text-center">Dirección de Facturación</th>
							<th>Fecha Maxima de Recepción</th>
							
						</tr>
						<tr>
							<td>@if($cliente->facturacion){{$cliente->facturacion->correo_fact}}@endif</td>
							<td colspan="2">@if($cliente->facturacion){{$cliente->facturacion->direccion_recib}}@endif</td>
							<td >
								@if($cliente->facturacion){{$cliente->facturacion->fecha->format('d/m/Y')}}@endif
								
							</td>
							
						</tr>



						<tr>
							<th>Activos</th>
							<th colspan="2" class="text-center">Pasivos</th>
							<th>Patrimonio</th>
							
						</tr>
						<tr>
							<td>@if($cliente->ie){{$cliente->ie->activo}}@endif</td>
							<td colspan="2">@if($cliente->ie){{$cliente->ie->pasivo}}@endif</td>
							<td >
								@if($cliente->ie){{$cliente->ie->patrimonio}}@endif
								
							</td>
							
						</tr>


							<tr>
							<th>Total Ingresos</th>
							<th colspan="2" class="text-center">Total Egresos</th>
							<th>Total Otros</th>
							
						</tr>
						<tr>
							<td>@if($cliente->ie){{$cliente->ie->ingreso}}@endif</td>
							<td colspan="2">@if($cliente->ie){{$cliente->ie->egreso}}@endif</td>
							<td >
								@if($cliente->ie){{$cliente->ie->otros}}@endif
								
							</td>
							
						</tr>



					</table>
	
</div>

<hr>
	
					<div class="row">
						
						<div class="col-sm-5">

								<h3 class="card-title"> <i class="fa fa-phone"></i> Telefonos Registrados</h3><br><br>
						<div class="table-responsive">
							<table class="table table-bordered" style="width: 100%">

								<tr>
									<th>Tipo Telefono</th>
									<th>Numero</th>
									<th>Estado</th>
									<th>Opciones</th>
									<th><button title="Agregar Telefono" id="btnTlf" onclick="masTlf({{count($cliente->telefonos->where('status',1))}})" class="btn btn-outline-success btn-xs"><i class="mdi mdi-plus"></i></button></th>
								</tr>

								@foreach($cliente->telefonos as $t)
									<tr>
										<td>@if($t->tipoTlf ==1) Principal  @elseif($t->tipoTlf == 2) Secundario @else Movil  @endif</td>
										<td>{{$t->numero}}</td>
										<td class="text-center">@if($t->status == 1) <b class="text-green"> <i class="fa fa-check"></i></b>  @else <b class="text-red"> <i class="fa fa-times"></i></b>  @endif</td>
										<td colspan="2" class="text-center">
											
											 <button onclick="edit({{$t}})" class="btn btn-outline-warning btn-xs"><i class="mdi mdi-pencil"></i></button>
											<span id='btns_tlf_{{$t->id}}'>
												@if($t->status ==1) 
											 		 <a href="{{url('telefonos/'.$t->id.'/del')}}" class="btn btn-outline-danger btn-xs"><i class="mdi mdi-close"></i></a>

												@else
											 		 <a href="{{url('telefonos/'.$t->id.'/act')}}" class="btn btn-outline-success btn-xs"><i class="mdi mdi-check"></i></a>
												 @endif
											</span>
										</td>
									</tr>
								@endforeach
							</table>
						</div>
						</div>
						<div class="col-sm-7 ">
							<h3 class="card-title"> <i class="mdi mdi-bank"></i> Cuentas Bancarias</h3><br><br>
						<div class="table-responsive">
							<table class="table table-bordered" style="width: 100%">

								<tr>
									<th>Tipo Cuenta</th>
									<th>Banco</th>
									<th>Numero de Cuenta</th>
									<th>Estado</th>
									<th>Opciones</th>
									<th><button title="Agregar Cuenta Bancaria"  onclick="masBanco()" class="btn btn-outline-success btn-xs"><i class="mdi mdi-plus"></i></button></th>
								</tr>

								@foreach($cliente->bancos as $b)
									<tr>
										<td class="text-center">
											@if($b->tipo_cuenta == 1) 
												Ahorro
											 @else 
											 	Corriente
											  @endif
										</td>
										<td>{{$b->banco}}</td>
										<td class="text-center">
											{{$b->cuenta}}
										</td>
										<td class="text-center">
											@if($b->status == 1) 
												<b class="text-green"> <i class="fa fa-check"></i></b> 
											 @else 
											 	<b class="text-red"> <i class="mdi mdi-close"></i></b>
											  @endif
										</td>
										<td colspan="2" class="text-center">
											
											 <button onclick="editBanco({{$b}})" class="btn btn-outline-warning btn-xs"><i class="mdi mdi-pencil"></i></button>
											<span id='btns_tlf_{{$b->id}}'>
												@if($b->status ==1) 
											 		 <a href="{{url('banco/'.$b->id.'/del')}}" class="btn btn-outline-danger btn-xs"><i class="mdi mdi-close"></i></a>

												@else
											 		 <a href="{{url('banco/'.$b->id.'/act')}}" class="btn btn-outline-success btn-xs"><i class="mdi mdi-check"></i></a>
												 @endif
											</span>
										</td>
									</tr>
								@endforeach
							</table>
						</div>
						</div>
					</div>





<hr>
	
					<div class="row">
						
						
						<div class="col-sm-12 ">
							
							<h3 class="card-title"> <i class="fa fa-user-tie"></i> Contactos Comercial</h3><br><br>
							<div class="table-responsive">
								
							<table class="table table-bordered">
							
								<tr>
									<th>Nombre Comercial</th>
									<th>Correo</th>
									<th><i class="fa fa-phone"></i> Oficina</th>
									<th><i class="fa fa-phone"></i> Personal</th>
									<th>status</th>
									<th>Opciones </th>
									<th> 
										<button title="Agregar Contacto Comercial"  onclick="masComercio()" class="btn btn-outline-success btn-xs"><i class="mdi mdi-plus"></i></button>
									 </th>
								</tr>

								@foreach($cliente->comercios as $com)
									<tr>
										
										<td>{{$com->nombreComercial}}</td>
										<td>{{$com->emailContacto}}</td>
										<td>{{$com->tlfOficina}}</td>
										<td>{{$com->tlfPersonal}}</td>
										<td>@if($com->status == 1) <b class="text-green"> <i class="fa fa-check"></i></b>  @else <b class="text-red"> <i class="mdi mdi-close"></i></b>  @endif</td>
										<td colspan="2">
											
											  <button onclick="editComercio({{$com}})" class="btn btn-outline-warning btn-xs"><i class="mdi mdi-pencil"></i></button>

												@if($com->status == 1) 
											 		 <a href="{{url('comercio/'.$com->id.'/del')}}" class="btn btn-outline-danger btn-xs"><i class="mdi mdi-close"></i></a>

												@else
											 		 <a href="{{url('comercio/'.$com->id.'/act')}}" class="btn btn-outline-success btn-xs"><i class="mdi mdi-check"></i></a>
											 	@endif
										</td>
									</tr>
								@endforeach
							</table>
							</div>
						</div>
					</div>


			

                </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>

@endsection