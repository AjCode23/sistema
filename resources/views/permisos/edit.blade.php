@extends('layouts.app')

@section('name','..|Editar Cliente|..')

@section('ol')
 <a style="color: #e68618;" href="{{url('home')}}" class="link" title=""><i class="mdi mdi-home"></i> Home
</a>
/
 <a class="link" title=""><i class="mdi mdi-account-location"></i> Editar Cliente</a>
@endsection

@section('css')

 <link rel="stylesheet" href="{{asset('admin/plugins/bs-stepper/css/bs-stepper.min.css')}}">
	
@endsection

@section('js')
<!--  Plugin for the Wizard -->

	<script src="{{asset('admin/plugins/bs-stepper/js/bs-stepper.min.js')}}"></script>
	<script>
		
		 // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  });

function tlf(){
	var cont=parseFloat($('#contador').val());
	if(cont >=0  && cont <3){
		cont=cont+1;
		$('#contador').val(cont);
		$('#mas').append(`
			<div class="row">
                     	<div class="col-md-4">
                     		<label for="">Tipo Telefono</label>
		                     <select class="form-control select-picker" name="tipo_tlf[]" id="tipo_tlf" required>
		                       <option value="">SELECIONE TIPO DE TELEFONO</option>
		                       <option value="1">TELEFONO FIJO</option>
		                       <option value="2">TELEFONO PERSONAL</option>
		                       
		                     </select>
                     	</div>
                     	<div class="col-md-4">
                     		 <label for="">Numero de Telefono</label>
                        <input class="form-control" type="number" name="numero[]"   placeholder="Numero Telefonico" required>
                     	</div>
                     	
                  
                     </div>`);
	}else{
		//alert();
	}

}

function comercio(){
	var cont=parseFloat($('#contComercio').val());
	if(cont >=0  && cont <2){
		cont=cont+1;
		$('#contComercio').val(cont);
		$('#masComercio').append(`
			<div class="row">
                     	<div class="col-md-3">

                     		 <label for="">Nombre Contacto Comercial</label>
                        <input class="form-control" type="text" name="nombreCom[]"   placeholder="Nombre contacto comercial" required>
                     	</div>
                     	<div class="col-md-3">
                     		 <label for="">Correo Contacto</label>
                        <input class="form-control" type="text" name="emailCom[]"   placeholder="Correo contacto" required>
                     	</div>
                     	<div class="col-md-2">
                     		 <label for="">Telefono Fijo</label>
                        <input class="form-control" type="number" name="tlfFijoCom[]"   placeholder="Numero fijo" required>
                     	</div>

                     		<div class="col-md-2">
                     		 <label for="">Telefono Personal</label>
                        <input class="form-control" type="number" name="tlfPerCom[]"   placeholder="Numero personal" required>
                     	</div>


                     	<div class="col-md-2">
                     		
                     	</div>
                  
                     </div>`);
	}else{
		//alert();
	}

}

function enviar(){
	if(confirm('Desea Registrar Cliente')){

	$('#formulario').submit();	
}
}

function nocomercio(){
	$('#masComercio').empty();
	$('#contComercio').val(0);
}

function notlf(){
	$('#mas').empty();
	$('#contador').val(0);
}
	</script>


@endsection
@section('content')
 <!-- /.row -->

        <div class="row" style="padding:20px;">
          <div class="col-md-12">
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title"><i class="fa fa-edit"></i> Editar Cliente</h3>

                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <a class="nav-link btn-outline-danger active " style="color: #fff !important" href="{{url('Permisos')}}" ><i class="mdi mdi-reply"></i> Cancelar</a>
                    </li>
                      &nbsp;
                      
                  
                  </ul>
                </div>
              </div>

@if(count($errors) > 0)
	<div class="errors">
		<ul>
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
		</ul>
	</div>
@endif

              <form action="{{url('permisos/update',$permiso->id)}}"  method="post" >
              	{{ csrf_field()}}
             
              <div class="card-body p-0">
                <div class="bs-stepper">
                  <div class="bs-stepper-header" role="tablist">
                    <!-- your steps here -->
                    <div class="step" data-target="#logins-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                        <span class="bs-stepper-circle"><i class="mdi mdi-lock-pattern"></i></span>
                        <span class="bs-stepper-label">Datos Permiso</span>
                      </button>
                    </div>
                   


                  </div>
                  <div class="alert alert-success">
                  	Debes completar todos los datos obligatorios para poder Modificar la Permiso!
                  </div>
                  <hr>
                  <div class="bs-stepper-content">
                    <!-- Datos e los Clientes -->
                    <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                      

                      <div class="row">
                      	<div class="col-md-6">
                      		<label for="">Permiso <b class="text-red">(*)</b></label>
                      		<input class="form-control" value="{{$permiso->permiso}}" type="text" name="permiso" id="idpersona" required>
                      	</div>
                      	
                      	

                      </div><!-- fin row  -->
<br>




	<div class=" col-md-offset-5 col-md-3">
		
					
                  

                       <button type="submit" onclick="" class="btn btn-outline-success">Modificar</button>
	</div>
                    </div>


                  



                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              </form>
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
@endsection