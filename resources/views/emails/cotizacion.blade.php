<!DOCTYPE html>
<html>
<head>
	<title>abono-Nro</title>
	<link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
	<style >
	.center,.left,.right{
		display: inline-block;

		width: 35%;
	}
 footer { position: fixed; bottom: -60px; left: 0px; right: 0px; height: 50px;  text-align: center;
    	font-size: 10px; font-family: Helvetica}
	.center	{
	width: 30%;
	height: 80px;
	}


	#img{
		width: 680px;
		position: absolute;
		left: -20px;
		top: -15px;
		bottom: -65px;
	
	}

	.letra{
		
		font-family: 'Helvetica';
		font-size: 10px;
		padding: 0px;
		line-height: 3px;
		position: relative;
		top: 80px;

	}
	.text-center{
		text-align: center
	}

	.top{
		position: absolute;
	
		top: -20px;
	}
	body{
		font-family: 'Helvetica';
		font-size: 12px;
		color:#5f5f5f;
		width: 50%;
		margin: 10px auto;
	}
	#num{
		border: 1px solid #d1d1d1;
		width: 70%;
		margin:  auto;
		position: absolute;
		top: 50px;
		left: 30px;
		padding: 10px;
		color: red;
		font-weight: bold;
		border-top-left-radius: 25px;
		border-bottom-right-radius: 25px;
		

	}


	#num2{
		border: 1px solid #d1d1d1;
		width: 70%;
		margin:  auto;
		position: absolute;
		top: 40px;
		left: 300px;
		padding: 10px;
		color: red;
		font-weight: bold;
		border-top-left-radius: 20px;
		border-bottom-right-radius: 20px;
		

	}

	.fecha{
	
		display: inline-block;
		border: 1px dashed;
		width: 10%;
		
		min-height: 70px;
		padding: 20px;
		padding-top: 25px;

		padding-bottom: 5px;
				

	}


	.input{
		width: 300px;
		border-bottom:1px solid #d0d0d0;
		margin-left: 10px;
		

	}

	.text-left{
		text-align: left;
		

	}
	.input-2{
		width: 180px;
		border-bottom:1px solid #d0d0d0;
		margin-left: 10px;
		

	}

	.input-3{
		width: 120px;
		border-bottom:1px solid #d0d0d0;
		margin-left: 10px;
		

	}

	.input-4{
		width: 60px;
		border-bottom:1px solid #d0d0d0;
		margin-left: 10px;
		

	}
	.float-left{
		position: absolute;
		left: 80px;
		top: 55px;
	}

	.col-7{
		width: 69%;
		display: inline-block;
	}
	.col-5{
		display: inline-block;
		width: 49%;
	}

	.col-6{
		width: 59%;
		display: inline-block;
	}
	.col-4{
		width: 39%;
		display: inline-block;
	}
	

	.well{
		padding: 10px;
		border:1px solid #d1d1d1;
		border-radius:5px;
		background: #f0f0f0;
	}
	#table{
	border: 1px solid ;
	width: 100%;
	}
	.left{
		margin-left: 15px;
		position: relative;
		top: -60px;
	}
	.d{
	position: absolute;
	top: -18px;
	margin-left: -18px;
	}
	.m{
	position: absolute;
	top: -18px;
	margin-left: -18px;
	
	}
	.y{
	position: absolute;
	top: -18px;
	margin-left: -18px;
	
	}
	.contenedor{
		display: inline-block;
		vertical-align: top;
	}

	.size{
		font-size: 10px;
		font-weight: bold;
	
	}
	.orange{
		color: #781428;
	}

	#span{
		line-height: 20px;
	}
	.container{
		margin-bottom: -10px;
		width: 100%;
		max-width: 700px;
		border: 1px solid #f0f0f0;
		background: #fff;
	}
	.bold{
		font-weight: bold;
	}
	</style>
</head>
<body style="background: #f0f0f0;">





<div class="container">

<div class="left">
	
<img src="{{$message->embed('img/logo_all.PNG')}} " id="img">

</div>




<hr>

<center>
	<h2 class=" bold orange"> COTIZACION DE SERVICIO NO. 	
								@if($orden->id < 10)
        					  		{{"00000".$orden->id}}
        					  	@elseif($orden->id < 100){
        					  		{{"0000".$orden->id}}
        					  	@elseif($orden->id < 1000){
        					  		{{"000".$orden->id}}
        					  	@elseif($orden->id < 100000){
        					  		{{"0".$orden->id}}

        					  	@elseif($orden->id < 1000000){
        					  		{{$orden->id}}
        					  	@endif</h2>

</center>

<h3>Hola!.. SR(A) {{$orden->cotizacion->cliente->nombres}}</h3>
<p>  <div style="  width:95%; 
                     background: rgba(60, 141, 188, 0.28); padding: 10px; border: 1px solid rgba(60, 141, 188, 0.54); color: #3784af; font-weight: bold; ">
                       Estimado Cliente, la Empresa |SET Y GAD S.A.S| le Informa que a petición de usted se le realizó una cotización con las siguientes caracteristicas
                    </div></p>








<div class="container">
		<div class="contenedor size " style="border: 1px dashed; width: 38%;padding: 5px;padding-bottom: 15px; ">
		CLIENTE: <b class="orange"> {{$orden->cotizacion->cliente->nombres}}</b>
			
		</div>
		<div class="contenedor size " style="border: 1px dashed; width: 30%;padding: 5px; padding-bottom: 15px; ">
			NIT: <b class="orange">{{$orden->cotizacion->cliente->tipoDocumento}}-{{$orden->cotizacion->cliente->numDocumento}}</b>
		</div>

		<div class="contenedor size " style="border: 1px dashed; width: 24%;padding: 5px; padding-bottom: 15px; ">
			TLF: <b class="orange">  {{$orden->cotizacion->cliente->telefonos->first()->numero}}</b>
		</div>
</div>


<br>
<div class="container">
		<div class="contenedor size " style="border: 1px dashed; width: 62%;padding: 5px;padding-bottom: 15px; ">
		DIRECCION: <b class="orange"> {{$orden->cotizacion->cliente->direccion->direccion}}, {{$orden->cotizacion->cliente->direccion->ciudad}}, {{$orden->cotizacion->cliente->direccion->departamento}}, {{$orden->cotizacion->cliente->direccion->cod_postal}}, {{$orden->cotizacion->cliente->direccion->pais}}</b>
			
		</div>
		<div class="contenedor size " style="border: 1px dashed; width: 32%;padding: 5px; padding-bottom: 15px; ">
			EMAIL: <b class="orange">{{$orden->cotizacion->cliente->email}}</b>
		</div>

</div>


<hr>

<div class="container">
		<div class="contenedor size " style="border: 1px dashed; width: 45%;padding: 5px;padding-bottom: 15px; ">
		CONTACTO: <b class="orange"> {{$orden->asesor->nombre}}</b>
			
		</div>
		<div class="contenedor size " style="border: 1px dashed; width: 45%;padding: 5px; padding-bottom: 15px; ">
			CARGO: <b class="orange">{{$orden->asesor->cargo->cargo}}</b>
		</div>

</div>
<div class="container">
		<div class="contenedor size " style="border: 1px dashed; width: 45%;padding: 5px; padding-bottom: 15px; ">
			EMAIL: <b class="orange">{{$orden->asesor->email}}  </b>
		</div>

		<div class="contenedor size " style="border: 1px dashed; width: 45%;padding: 5px; padding-bottom: 15px; ">
			CELULAR: <b class="orange"> {{$orden->asesor->telefono}}</b>
		</div>
</div>


<br>


<table style="width: 100%; border:1px solid #d0d0d0; border-radius:10px;">
	<thead>
		<tr style="background:#f0f0f0; border: 1px solid;">
			
		 <th style="">REFERENCIA</th>
    <th style="text-align: center;">DESCRIPCION</th>
    <th style="text-align: center;">CANT</th>
    <th style="text-align: right; ">PRECIO UNITAR</th>
    <th style="text-align: right; ">PRECIO TOTAL</th>
		</tr>

		
	</thead>
	<tbody>
  <?php $sub=0; ?>
	@foreach($orden->cotizaciones->where('status',2) as $c)
<tr>
    <td style="">{{$c->articulo->articulo}}</td>
    <td style="text-align: center;">{{$c->articulo->descripcion}}</td>
    <td style="text-align: center;">{{number_format($c->cantidad,2,',','.')}}</td>
    <td style="text-align: right; ">${{number_format($c->pvp,2,',','.')}}</td>
    <td style="text-align: right;">${{number_format($sum=($c->pvp * $c->cantidad),2,',','.')}}</td>
  </tr>
  <?php $sub+=$sum; ?>
@endforeach
	
	
	</tbody>
</table>
<br>



<div class="col-10">


<table style="width: 100% ;font-size:10px;" border="0">
  <tr>
    <td style="width: 70%" rowspan="6"></td>
    <th style="text-align: right">Sub-Total</th>
    <th style="text-align: right">${{number_format($sub,2,',','.')}}</th>
  </tr>

  <tr>
    
    <th style="text-align: right">Descuento 0 %</th>
    <th style="text-align: right">${{number_format(0,2,',','.')}}</th>
  </tr>
  <tr>
    
    <th style="text-align: right">Sub-Total con Descuento</th>
    <th style="text-align: right">${{number_format(0,2,',','.')}}</th>
  </tr>
  <tr>
    
    <th style="text-align: right">I.V.A @if($orden->impuesto){{$orden->impuesto}}@else 0 @endif%</th>
    <th style="text-align: right">${{number_format($iva=($sub * ($orden->impuesto /100)),2,',','.')}}</th>
  </tr>
  <tr>
    
    <th style="text-align: right">Logistica(si aplica)</th>
    <th style="text-align: right">${{number_format(0,2,',','.')}}</th>
  </tr>
  <tr>
    
    <th style="text-align: right">Total</th>
    <th  style="text-align: right">
      <hr style="color:gray;">
      ${{number_format($sub + $iva,2,',','.')}}
      <hr style="color:gray;">
    </th>
  </tr>
</table>
</div>
<hr>

<small>si desconoce esta solicutud comuniquelo aqui <a href="mailto:joe@example.com?subject=feedback" >email me</a></small>
<p>
	<small style="font-size: 12px;font-weight: bold;">Un saludo de <b>SET Y GAD S.A.S</b> <small>SistemasVzla</small></small>
</p>




<hr>
<p>Debes Aprobar esta cotización  <a href="{{url('/logout')}}"> Aqui</a></p>

</div>











</body>
</html>