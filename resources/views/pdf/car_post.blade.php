<html>


	
	<title>Factura-Nro</title>

	<style >
	.center,.left,.right{
		display: inline-block;

		width: 35%;
	}
	.center	{
	width: 30%;
	}
	
	body{
		font-family: 'Helvetica';
		font-size: 12px;
		color:#5f5f5f;
	font-size: 13px;
	}

#img{
	width: 300px;
	margin-bottom: -80px;
}
	
#line{
height: 10px;
display: block;
width: 100%;
border-bottom:2 dotted;
}
.letra{
	font-size: 13px;
}
.text-center{
	text-align:center;
}
#casilla{
	display: block;
	min-height: 10px;

	border:2px solid;
}


	</style>

<body>

<div class="center">
	<img src="./imagen/logo1.png" id="img">
</div>
<div id="line"></div>
<div class="letra text-center">

<b> {{$config->nombre_emp}}</b><br>
<b>NIT: {{$config->nit_emp}}</b><br>
<!--<b>Regimen Común</b><br>
	RESOLUCION DIAN No.<br>
	Fecha <br>
	No Somos Grandes Contribuyentes <br>
	Actividad ICA. <br>
	Tarifa ICA. <br>-->
	Direccion: Carrera 107b # 70 - 65 Barrio Villas Del Dorado, Bogotá – Colombia <br>
	Telefono: +57 (1) 542 20 72
<br>Celular: +57 315 229 6361  <br>
	 ventasconosangie@gmail.com <br>


</div>

<table style="width: 100%;">
	<tr>
		<td><b>Fecha:</b> {{$orden->created_at->format('d/m/Y h:m:a')}}</td>
		<td style="text-align: right;"><b>Orden Nro. {{$id}}</b></td>
	</tr>
</table>

<b>Cliente:</b>  {{$orden->cliente->nombres}}<br>
<b>Nit:</b>  {{number_format($orden->cliente->nit,0,'','.')}}<br>

<br>

<div id="casilla">
	<table style="width: 100%; font-size: 12px; text-align: center">
		<tr>
			<th>DESCRIPCION</th>
			<th>CANT</th>
			<th>PVP</th>
			<th>SUBTOTAL</th>
		</tr>
		<?php 
			$total=0;  ?>
		@foreach($orden->detalles as $d)
		<tr>
			<td>{{$d->producto->producto}}</td>
			<td>{{$d->cantidad}}</td>
			<td>{{number_format($d->precio,0,'','.')}}</td>
			<td>{{number_format($t=$d->precio*$d->cantidad,0,'','.')}}</td>
		</tr>

			<?php 
			$total+=$t;  ?>
		@endforeach
		
	</table>

</div>	
<div id="line"></div>
	<table style="width: 100%;">
	<tr>
		<td><b>SUB:</b> </td>
		<td style="text-align: right;"><b>{{number_format($total,0,'','.')}}</b></td>
	</tr>

	<tr>
		<td><b>IVA {{$orden->iva}}%:</b> </td>
		<td style="text-align: right;"><b>{{number_format($iva=$total*($orden->iva/100),0,'','.')}}</b></td>
	</tr>


	<tr>
		<td><b>DESCUENTO {{$orden->descuento}}%:</b> </td>
		<td style="text-align: right;"><b>{{number_format($descuento=$total*($orden->descuento/100),0,'','.')}}</b></td>
	</tr>

	<tr>
		<td><b>TOTAL:</b> </td>
		<td style="text-align: right;"><b>{{number_format($total+$iva+$descuento,0,'','.')}}</b></td>
	</tr>

</table>

<br>
<div id="casilla" style="padding: 10px; ">
	Recibí de conformidad la mercancía de que trata esta
orden y acepto el valor estipulado en la misma.
Declaro recibida la mercancía a satisfacción, y en
consecuencia el valor de la presente orden.
</div>
<div id="line"></div><br>

<div class="text-center"> <b>
	Horarios de atencion: </b><br>
Lunes a viernes 8:00am a 5:00pm <br>

Sabados 8:00am a 1:00pm <br>

</div><br>
<div class="text-center"> <b>***GRACIAS POR PREFERIRNOS***</b></div>
<div id="line"></div>

<br>

Firma del Cliente:
</body>
</html>