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



$('#tipo_documento').val('{{$cliente->tipoDocumento}}');
$('#tipo_emp').val('{{$cliente->tipoPersona}}');
$('#pais').val('{{$cliente->direccion->pais}}');
$('#tipo_regimen').val('{{$cliente->regimen->regimen}}');

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
                      <a class="nav-link btn-outline-danger active " style="color: #fff !important" href="{{url('clientes')}}" ><i class="mdi mdi-reply"></i> Cancelar</a>
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

              <form action="{{url('clientes/update',$cliente->id)}}" id="formulario" method="post" >
              	{{ csrf_field()}}
             
              <div class="card-body p-0">
                <div class="bs-stepper">
                  <div class="bs-stepper-header" role="tablist">
                    <!-- your steps here -->
                    <div class="step" data-target="#logins-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                        <span class="bs-stepper-circle"><i class="fa fa-user-tie"></i></span>
                        <span class="bs-stepper-label">Datos Clientes</span>
                      </button>
                    </div>
                


                    <div class="line"></div>
                    <div class="step" data-target="#regimen">
                      <button type="button" class="step-trigger" role="tab" aria-controls="regimen" id="information-part-trigger">
                        <span class="bs-stepper-circle"><i class="mdi mdi-account-settings"></i></span>
                        <span class="bs-stepper-label">Regimen</span>
                      </button>
                    </div>



  				

                    <div class="line"></div>
                    <div class="step" data-target="#direccionFact">
                      <button type="button" class="step-trigger" role="tab" aria-controls="direccionFact" id="information-part-trigger">
                        <span class="bs-stepper-circle"><i class="fa fa-desktop"></i></span>
                        <span class="bs-stepper-label">Facturacion Electronica</span>
                      </button>
                    </div>


                    <div class="line"></div>
                    <div class="step" data-target="#monedas">
                      <button type="button" class="step-trigger" role="tab" aria-controls="monedas" id="information-part-trigger">
                        <span class="bs-stepper-circle"><i class="mdi mdi-cash-usd"></i></span>
                        <span class="bs-stepper-label">Monedas</span>
                      </button>
                    </div>




                  </div>
                  <div class="alert alert-success">
                  	Debes completar todos los datos obligatorios para poder Modificar el cliente!
                  </div>
                  <hr>
                  <div class="bs-stepper-content">
                    <!-- Datos e los Clientes -->
                    <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                      

                      <div class="row">
                      	<div class="col-md-4">
                      		<label for="">Razón Social <b class="text-red">(*)</b></label>
                      		<input class="form-control" type="text" value="{{$cliente->nombres}}" name="nombres" id="idpersona" required>
                      	</div>
                      	<div class="col-md-2">
                      
                      		<label for="">Tipo Documento <b class="text-red">(*)</b></label>
		                     <select class="form-control select-picker" name="tipo_documento" id="tipo_documento" required>
		                       <option value="NIT">NIT</option>
		                       <option value="CC">CEDULA CIUDADANIA</option>
		                       <option value="CE">CEDULA EXTRANJERO</option>
		                       <option value="PAS">PASAPORTE</option>
		                     </select>
                      	</div>
                      	<div class="col-md-2">
                      		 <label for="">Número Documento <b class="text-red">(*)</b></label>
                     		 <input class="form-control" type="text"  value="{{$cliente->numDocumento}}" name="numDocumento" id="num_documento" maxlength="20" placeholder="Número de Documento" required>
                      	</div>
                      	<div class="col-md-2">
                      		 <label for="">Actividad Principal <b class="text-red">(*)</b></label>
                         	 <input class="form-control" type="text"   value="{{$cliente->actPpal}}" name="actividad_ppal" id="actividad_ppal" maxlength="50" placeholder="Actividad principal del cliente" required>

                      	</div>

                      	<div class="col-md-2">
                      		 <label for="">Correo <b class="text-red">(*)</b></label>
                         	 <input class="form-control" type="email" name="email"  value="{{$cliente->email}}" id="email" maxlength="50" placeholder="Correo del Cliente" required>

                      	</div>


                      </div><!-- fin row  -->
<br>




                        <div class="row">
                      	<div class="col-md-4">
                      	<label for="">Direccion Principal <b class="text-red">(*)</b></label>
                        <input class="form-control" type="text" name="direccion"  value="{{$cliente->direccion->direccion}}" id="direccion" maxlength="70" placeholder="Direccion" required>
                      	</div>

                      	<div class="col-md-2">
                      		<label for="">Tipo Empresa <b class="text-red">(*)</b></label>
		                     <select class="form-control select-picker" name="tipo_persona" id="tipo_emp" required>
		                       <option >PRIVADA</option>
		                       <option >PUBLICA</option>
		                       <option >MIXTA</option>
		                     </select>
                      	</div>
                      	<div class="col-md-2">
                      		 <label for="">Pais <b class="text-red">(*)</b></label>
                       <select name="pais" required id="pais"  class="form-control">
                       	<option value="" id="AF">Elegir opción</option>
							<option value="Afganistán" id="AF">Afganistán</option>
							<option value="Albania" id="AL">Albania</option>
							<option value="Alemania" id="DE">Alemania</option>
							<option value="Andorra" id="AD">Andorra</option>
							<option value="Angola" id="AO">Angola</option>
							<option value="Anguila" id="AI">Anguila</option>
							<option value="Antártida" id="AQ">Antártida</option>
							<option value="Antigua y Barbuda" id="AG">Antigua y Barbuda</option>
							<option value="Antillas holandesas" id="AN">Antillas holandesas</option>
							<option value="Arabia Saudí" id="SA">Arabia Saudí</option>
							<option value="Argelia" id="DZ">Argelia</option>
							<option value="Argentina" id="AR">Argentina</option>
							<option value="Armenia" id="AM">Armenia</option>
							<option value="Aruba" id="AW">Aruba</option>
							<option value="Australia" id="AU">Australia</option>
							<option value="Austria" id="AT">Austria</option>
							<option value="Azerbaiyán" id="AZ">Azerbaiyán</option>
							<option value="Bahamas" id="BS">Bahamas</option>
							<option value="Bahrein" id="BH">Bahrein</option>
							<option value="Bangladesh" id="BD">Bangladesh</option>
							<option value="Barbados" id="BB">Barbados</option>
							<option value="Bélgica" id="BE">Bélgica</option>
							<option value="Belice" id="BZ">Belice</option>
							<option value="Benín" id="BJ">Benín</option>
							<option value="Bermudas" id="BM">Bermudas</option>
							<option value="Bhután" id="BT">Bhután</option>
							<option value="Bielorrusia" id="BY">Bielorrusia</option>
							<option value="Birmania" id="MM">Birmania</option>
							<option value="Bolivia" id="BO">Bolivia</option>
							<option value="Bosnia y Herzegovina" id="BA">Bosnia y Herzegovina</option>
							<option value="Botsuana" id="BW">Botsuana</option>
							<option value="Brasil" id="BR">Brasil</option>
							<option value="Brunei" id="BN">Brunei</option>
							<option value="Bulgaria" id="BG">Bulgaria</option>
							<option value="Burkina Faso" id="BF">Burkina Faso</option>
							<option value="Burundi" id="BI">Burundi</option>
							<option value="Cabo Verde" id="CV">Cabo Verde</option>
							<option value="Camboya" id="KH">Camboya</option>
							<option value="Camerún" id="CM">Camerún</option>
							<option value="Canadá" id="CA">Canadá</option>
							<option value="Chad" id="TD">Chad</option>
							<option value="Chile" id="CL">Chile</option>
							<option value="China" id="CN">China</option>
							<option value="Chipre" id="CY">Chipre</option>
							<option value="Ciudad estado del Vaticano" id="VA">Ciudad estado del Vaticano</option>
							<option selected value="Colombia" id="CO">Colombia</option>
							<option value="Comores" id="KM">Comores</option>
							<option value="Congo" id="CG">Congo</option>
							<option value="Corea" id="KR">Corea</option>
							<option value="Corea del Norte" id="KP">Corea del Norte</option>
							<option value="Costa del Marfíl" id="CI">Costa del Marfíl</option>
							<option value="Costa Rica" id="CR">Costa Rica</option>
							<option value="Croacia" id="HR">Croacia</option>
							<option value="Cuba" id="CU">Cuba</option>
							<option value="Dinamarca" id="DK">Dinamarca</option>
							<option value="Djibouri" id="DJ">Djibouri</option>
							<option value="Dominica" id="DM">Dominica</option>
							<option value="Ecuador" id="EC">Ecuador</option>
							<option value="Egipto" id="EG">Egipto</option>
							<option value="El Salvador" id="SV">El Salvador</option>
							<option value="Emiratos Arabes Unidos" id="AE">Emiratos Arabes Unidos</option>
							<option value="Eritrea" id="ER">Eritrea</option>
							<option value="Eslovaquia" id="SK">Eslovaquia</option>
							<option value="Eslovenia" id="SI">Eslovenia</option>
							<option value="España" id="ES">España</option>
							<option value="Estados Unidos" id="US">Estados Unidos</option>
							<option value="Estonia" id="EE">Estonia</option>
							<option value="c" id="ET">Etiopía</option>
							<option value="Ex-República Yugoslava de Macedonia" id="MK">Ex-República Yugoslava de Macedonia</option>
							<option value="Filipinas" id="PH">Filipinas</option>
							<option value="Finlandia" id="FI">Finlandia</option>
							<option value="Francia" id="FR">Francia</option>
							<option value="Gabón" id="GA">Gabón</option>
							<option value="Gambia" id="GM">Gambia</option>
							<option value="Georgia" id="GE">Georgia</option>
							<option value="Georgia del Sur y las islas Sandwich del Sur" id="GS">Georgia del Sur y las islas Sandwich del Sur</option>
							<option value="Ghana" id="GH">Ghana</option>
							<option value="Gibraltar" id="GI">Gibraltar</option>
							<option value="Granada" id="GD">Granada</option>
							<option value="Grecia" id="GR">Grecia</option>
							<option value="Groenlandia" id="GL">Groenlandia</option>
							<option value="Guadalupe" id="GP">Guadalupe</option>
							<option value="Guam" id="GU">Guam</option>
							<option value="Guatemala" id="GT">Guatemala</option>
							<option value="Guayana" id="GY">Guayana</option>
							<option value="Guayana francesa" id="GF">Guayana francesa</option>
							<option value="Guinea" id="GN">Guinea</option>
							<option value="Guinea Ecuatorial" id="GQ">Guinea Ecuatorial</option>
							<option value="Guinea-Bissau" id="GW">Guinea-Bissau</option>
							<option value="Haití" id="HT">Haití</option>
							<option value="Holanda" id="NL">Holanda</option>
							<option value="Honduras" id="HN">Honduras</option>
							<option value="Hong Kong R. A. E" id="HK">Hong Kong R. A. E</option>
							<option value="Hungría" id="HU">Hungría</option>
							<option value="India" id="IN">India</option>
							<option value="Indonesia" id="ID">Indonesia</option>
							<option value="Irak" id="IQ">Irak</option>
							<option value="Irán" id="IR">Irán</option>
							<option value="Irlanda" id="IE">Irlanda</option>
							<option value="Isla Bouvet" id="BV">Isla Bouvet</option>
							<option value="Isla Christmas" id="CX">Isla Christmas</option>
							<option value="Isla Heard e Islas McDonald" id="HM">Isla Heard e Islas McDonald</option>
							<option value="Islandia" id="IS">Islandia</option>
							<option value="Islas Caimán" id="KY">Islas Caimán</option>
							<option value="Islas Cook" id="CK">Islas Cook</option>
							<option value="Islas de Cocos o Keeling" id="CC">Islas de Cocos o Keeling</option>
							<option value="Islas Faroe" id="FO">Islas Faroe</option>
							<option value="Islas Fiyi" id="FJ">Islas Fiyi</option>
							<option value="Islas Malvinas Islas Falkland" id="FK">Islas Malvinas Islas Falkland</option>
							<option value="Islas Marianas del norte" id="MP">Islas Marianas del norte</option>
							<option value="Islas Marshall" id="MH">Islas Marshall</option>
							<option value="Islas menores de Estados Unidos" id="UM">Islas menores de Estados Unidos</option>
							<option value="Islas Palau" id="PW">Islas Palau</option>
							<option value="Islas Salomón" d="SB">Islas Salomón</option>
							<option value="Islas Tokelau" id="TK">Islas Tokelau</option>
							<option value="Islas Turks y Caicos" id="TC">Islas Turks y Caicos</option>
							<option value="Islas Vírgenes EE.UU." id="VI">Islas Vírgenes EE.UU.</option>
							<option value="Islas Vírgenes Reino Unido" id="VG">Islas Vírgenes Reino Unido</option>
							<option value="Israel" id="IL">Israel</option>
							<option value="Italia" id="IT">Italia</option>
							<option value="Jamaica" id="JM">Jamaica</option>
							<option value="Japón" id="JP">Japón</option>
							<option value="Jordania" id="JO">Jordania</option>
							<option value="Kazajistán" id="KZ">Kazajistán</option>
							<option value="Kenia" id="KE">Kenia</option>
							<option value="Kirguizistán" id="KG">Kirguizistán</option>
							<option value="Kiribati" id="KI">Kiribati</option>
							<option value="Kuwait" id="KW">Kuwait</option>
							<option value="Laos" id="LA">Laos</option>
							<option value="Lesoto" id="LS">Lesoto</option>
							<option value="Letonia" id="LV">Letonia</option>
							<option value="Líbano" id="LB">Líbano</option>
							<option value="Liberia" id="LR">Liberia</option>
							<option value="Libia" id="LY">Libia</option>
							<option value="Liechtenstein" id="LI">Liechtenstein</option>
							<option value="Lituania" id="LT">Lituania</option>
							<option value="Luxemburgo" id="LU">Luxemburgo</option>
							<option value="Macao R. A. E" id="MO">Macao R. A. E</option>
							<option value="Madagascar" id="MG">Madagascar</option>
							<option value="Malasia" id="MY">Malasia</option>
							<option value="Malawi" id="MW">Malawi</option>
							<option value="Maldivas" id="MV">Maldivas</option>
							<option value="Malí" id="ML">Malí</option>
							<option value="Malta" id="MT">Malta</option>
							<option value="Marruecos" id="MA">Marruecos</option>
							<option value="Martinica" id="MQ">Martinica</option>
							<option value="Mauricio" id="MU">Mauricio</option>
							<option value="Mauritania" id="MR">Mauritania</option>
							<option value="Mayotte" id="YT">Mayotte</option>
							<option value="México" id="MX">México</option>
							<option value="Micronesia" id="FM">Micronesia</option>
							<option value="Moldavia" id="MD">Moldavia</option>
							<option value="Mónaco" id="MC">Mónaco</option>
							<option value="Mongolia" id="MN">Mongolia</option>
							<option value="Montserrat" id="MS">Montserrat</option>
							<option value="Mozambique" id="MZ">Mozambique</option>
							<option value="Namibia" id="NA">Namibia</option>
							<option value="Nauru" id="NR">Nauru</option>
							<option value="Nepal" id="NP">Nepal</option>
							<option value="Nicaragua" id="NI">Nicaragua</option>
							<option value="Níger" id="NE">Níger</option>
							<option value="Nigeria" id="NG">Nigeria</option>
							<option value="Niue" id="NU">Niue</option>
							<option value="Norfolk" id="NF">Norfolk</option>
							<option value="Noruega" id="NO">Noruega</option>
							<option value="Nueva Caledonia" id="NC">Nueva Caledonia</option>
							<option value="Nueva Zelanda" id="NZ">Nueva Zelanda</option>
							<option value="Omán" id="OM">Omán</option>
							<option value="Panamá" id="PA">Panamá</option>
							<option value="Papua Nueva Guinea" id="PG">Papua Nueva Guinea</option>
							<option value="Paquistán" id="PK">Paquistán</option>
							<option value="Paraguay" id="PY">Paraguay</option>
							<option value="Perú" id="PE">Perú</option>
							<option value="Pitcairn" id="PN">Pitcairn</option>
							<option value="Polinesia francesa" id="PF">Polinesia francesa</option>
							<option value="Polonia" id="PL">Polonia</option>
							<option value="Portugal" id="PT">Portugal</option>
							<option value="Puerto Rico" id="PR">Puerto Rico</option>
							<option value="Qatar" id="QA">Qatar</option>
							<option value="Reino Unido" id="UK">Reino Unido</option>
							<option value="República Centroafricana" id="CF">República Centroafricana</option>
							<option value="República Checa" id="CZ">República Checa</option>
							<option value="República de Sudáfrica" id="ZA">República de Sudáfrica</option>
							<option value="República Democrática del Congo Zaire" id="CD">República Democrática del Congo Zaire</option>
							<option value="República Dominicana" id="DO">República Dominicana</option>
							<option value="Reunión" id="RE">Reunión</option>
							<option value="Ruanda" id="RW">Ruanda</option>
							<option value="Rumania" id="RO">Rumania</option>
							<option value="Rusia" id="RU">Rusia</option>
							<option value="Samoa" id="WS">Samoa</option>
							<option value="Samoa occidental" id="AS">Samoa occidental</option>
							<option value="San Kitts y Nevis" id="KN">San Kitts y Nevis</option>
							<option value="San Marino" id="SM">San Marino</option>
							<option value="San Pierre y Miquelon" id="PM">San Pierre y Miquelon</option>
							<option value="San Vicente e Islas Granadinas" id="VC">San Vicente e Islas Granadinas</option>
							<option value="Santa Helena" id="SH">Santa Helena</option>
							<option value="Santa Lucía" id="LC">Santa Lucía</option>
							<option value="Santo Tomé y Príncipe" id="ST">Santo Tomé y Príncipe</option>
							<option value="Senegal" id="SN">Senegal</option>
							<option value="Serbia y Montenegro" id="YU">Serbia y Montenegro</option>
							<option value="Sychelles" id="SC">Seychelles</option>
							<option value="Sierra Leona" id="SL">Sierra Leona</option>
							<option value="Singapur" id="SG">Singapur</option>
							<option value="Siria" id="SY">Siria</option>
							<option value="Somalia" id="SO">Somalia</option>
							<option value="Sri Lanka" id="LK">Sri Lanka</option>
							<option value="Suazilandia" id="SZ">Suazilandia</option>
							<option value="Sudán" id="SD">Sudán</option>
							<option value="Suecia" id="SE">Suecia</option>
							<option value="Suiza" id="CH">Suiza</option>
							<option value="Surinam" id="SR">Surinam</option>
							<option value="Svalbard" id="SJ">Svalbard</option>
							<option value="Tailandia" id="TH">Tailandia</option>
							<option value="Taiwán" id="TW">Taiwán</option>
							<option value="Tanzania" id="TZ">Tanzania</option>
							<option value="Tayikistán" id="TJ">Tayikistán</option>
							<option value="Territorios británicos del océano Indico" id="IO">Territorios británicos del océano Indico</option>
							<option value="Territorios franceses del sur" id="TF">Territorios franceses del sur</option>
							<option value="Timor Oriental" id="TP">Timor Oriental</option>
							<option value="Togo" id="TG">Togo</option>
							<option value="Tonga" id="TO">Tonga</option>
							<option value="Trinidad y Tobago" id="TT">Trinidad y Tobago</option>
							<option value="Túnez" id="TN">Túnez</option>
							<option value="Turkmenistán" id="TM">Turkmenistán</option>
							<option value="Turquía" id="TR">Turquía</option>
							<option value="Tuvalu" id="TV">Tuvalu</option>
							<option value="Ucrania" id="UA">Ucrania</option>
							<option value="Uganda" id="UG">Uganda</option>
							<option value="Uruguay" id="UY">Uruguay</option>
							<option value="Uzbekistán" id="UZ">Uzbekistán</option>
							<option value="Vanuatu" id="VU">Vanuatu</option>
							<option value="Venezuela" id="VE">Venezuela</option>
							<option value="Vietnam" id="VN">Vietnam</option>
							<option value="Wallis y Futuna" id="WF">Wallis y Futuna</option>
							<option value="Yemen" id="YE">Yemen</option>
							<option value="Zambia" id="ZM">Zambia</option>
							<option value="Zimbabue" id="ZW">Zimbabue</option>
                       </select>
                      	</div>

                      	<div class="col-md-4">
                      		 <label for="">Departamento <b class="text-red">(*)</b></label>
                        <input class="form-control" type="text"  value="{{$cliente->direccion->departamento}}" name="departamento" id="departamento" maxlength="70" placeholder="Departamento" required>
                      	</div>
                      	

                      	
                      </div><!-- fin row  -->
	<br>


                        <div class="row">
                      	
                      	<div class="col-md-4">
                      		 <label for="">Ciudad <b class="text-red">(*)</b></label>
                        <input class="form-control" type="text"  value="{{$cliente->direccion->ciudad}}" name="ciudad" id="ciudad" maxlength="70" placeholder="Ciudad" required>

                      	</div>

                      		<div class="col-md-4">
                      		  <label for="">Código Postal <b class="text-red">(*)</b></label>
                        	<input class="form-control" type="text"  value="{{$cliente->direccion->cod_postal}}" name="codigo_postal" id="codigo_postal" maxlength="70" placeholder="Código Postal" required>
                      	</div>


                      	<div class="col-md-4">
                      		  <label for="">Asesor Comercial </label>
                        	<select name="asesor_id" class="form-control" >
                        		<option value="">Seleccione Asesor</option>
                        		@foreach($asesores as $a)

                        		<option @if($a->id == $cliente->asesor_id) selected="" @endif value="{{$a->id}}">{{$a->nombre}}</option>
                        		@endforeach
                        	</select>
                      	</div>

                      	
                      </div><!-- fin row  -->
                      <br>

	<div class=" col-md-offset-5 col-md-3">
		
					
                      <button type="button" class="btn btn-outline-primary btn-flat  " onclick="stepper.next()">Siguiente</button>
	</div>
                    </div>






                    <div id="regimen" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                     	<input type="hidden" name="numTlf" id="contador" value="0">

                     <div class="row">
                     	<div class="col-md-4">
                     		<label for="">Tipo Pregímen <b class="text-red">(*)</b></label>
		                     <select class="form-control select-picker" name="tipoRegimen" id="tipo_regimen" required>
		                       <option value="">SELECIONE TIPO DE REGIMEN</option>
		                       <option >RESPONSABLE DE IVA</option>
		                       <option >NO RESPONSABLE DE IVA</option>
		                       <option >GRAN CONTRIBUYENTE</option>
		                       <option >AUTORETENEDOR</option>
		                       <option >REGIMEN SIMPLE</option>
		                       
		                     </select>
                     	</div>

                     	<div class="col-md-3">

                     		 <label for="">Resolución <b class="text-red">(*)</b></label>
                        <input class="form-control" type="text"  value="{{$cliente->regimen->resolucion}}" name="resolucion"   placeholder="Numero de Resolucion" required>
                     	</div>
                     	

                     	<div class="col-md-3">

                     		 <label for="">Codigo CIU <b class="text-red">(*)</b></label>
                        <input class="form-control" type="text" value="{{$cliente->regimen->ciu}}" name="ciu"   placeholder="Codigo ciu" required>
                     	</div>
                     	
                  
                     </div>
             

						<br>
                      <button type="button" class="btn btn-outline-secondary btn-flat" onclick="stepper.previous()">Regresar</button>
                      
                      <button type="button" class="btn btn-outline-primary btn-flat" onclick="stepper.next()">Siguiente</button>
                    </div>





                     <div id="direccionFact" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                     	<input type="hidden" name="numTlf" id="contador" value="0">

                     <div class="row">
                     	<div class="col-md-3">
                     		<label for="">Correo Facturación Electronica<b class="text-red">(*)</b></label>
		                      <input class="form-control" type="email"  value="{{$cliente->facturacion->correo_fact}}" name="dir_factura"   placeholder="correo de facturacion" required>
                     	</div>
                     	<div class="col-md-4">
                     		 <label for="">Direccion de Recibo <b class="text-red">(*)</b></label>
                        <input class="form-control" type="text" value="{{$cliente->facturacion->direccion_recib}}" name="dir_equipo"   placeholder="direccion equipo" required>
                     	</div>

                     	<div class="col-md-3">
                     		 <label for="">Fecha Maxima de Recepción <b class="text-red">(*)</b></label>
                         <input class="form-control" type="date" value="{{$cliente->facturacion->fecha->format('Y-m-d')}}" name="fecha_fact"   placeholder="" required>
                     	</div>

                     	
                  
                     </div>
                     <div id="mas_dir"></div>

						<br>
                      <button type="button" class="btn btn-outline-secondary btn-flat" onclick="stepper.previous()">Regresar</button>
                      
                      <button type="button" class="btn btn-outline-primary btn-flat" onclick="stepper.next()">Siguiente</button>

                      
                    </div>








                     <div id="monedas" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                     	<input type="hidden" name="numTlf" id="contador" value="0">
						
                        <div class="row">
                      	
                      	<div class="col-md-4">
                      		 <label for="">Activos <b class="text-red">(*)</b></label>
                        <input class="form-control" type="number" value="{{$cliente->ie->activo}}" name="activo" id="" maxlength="70" placeholder="" required>

                      	</div>

                      		<div class="col-md-4">
                      		  <label for="">Pasivos <b class="text-red">(*)</b></label>
                        	<input class="form-control" type="number" value="{{$cliente->ie->pasivo}}" name="pasivo" id="" maxlength="70" placeholder="" required>
                      	</div>


                      	<div class="col-md-4">
                      		  <label for="">Patrimonios <b class="text-red">(*)</b></label>
                        	<input class="form-control" type="number" value="{{$cliente->ie->patrimonio}}" name="patrimonio" id="" maxlength="70" placeholder="" required>
                      	</div>

                      	
                      </div><!-- fin row  -->
                      <br>



                        <div class="row">
                      	
                      	<div class="col-md-4">
                      		 <label for="">Ingresos Mensuales <b class="text-red">(*)</b></label>
                        <input class="form-control" type="number" value="{{$cliente->ie->ingreso}}" name="ingreso" id="" maxlength="70" placeholder="" required>

                      	</div>

                      		<div class="col-md-4">
                      		  <label for="">Egresos Mensuales <b class="text-red">(*)</b></label>
                        	<input class="form-control" type="number" value="{{$cliente->ie->egreso}}" name="egreso" id="" maxlength="70" placeholder="" required>
                      	</div>


                      	<div class="col-md-4">
                      		  <label for="">Otros <b class="text-red">(*)</b></label>
                        	<input class="form-control" type="number" value="{{$cliente->ie->otros}}" name="otros" id="" maxlength="70" placeholder="" required>
                      	</div>

                      	
                      </div><!-- fin row  -->
                      <br>
                     

                      <button type="button" class="btn btn-outline-secondary btn-flat" onclick="stepper.previous()">Regresar</button>
                      
                      <button type="submit" class="btn btn-outline-success btn-flat">Guardar Cambios</button>

                      
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