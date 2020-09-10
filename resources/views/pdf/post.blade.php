
<html>
<head>

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
	<img src="./logos/{{$pos->empresa->path}}" id="img">
</div>
<div id="line"></div>
<div class="letra text-center">

<b>NIT: {{$pos->empresa->rif}}</b><br>
<b>Regimen Común</b><br>
	RESOLUCION DIAN No.{{ $pos->resolucion->resolucion}} <br>
	Fecha {{ $pos->resolucion->fecha}} <br>
	Numeración Autorizada del {{$pos->resolucion->n_del}} al {{$pos->resolucion->n_al}} <br>
	No Somos Grandes Contribuyentes <br>
	Actividad ICA.{{$pos->resolucion->actividad_ica}}  <br>
	Tarifa ICA. {{$pos->resolucion->tarifa_ica}} <br>
	Telefono. {{$pos->empresa->phone}} <br>
	 {{$pos->empresa->address}} <br>
	 contacto@mrbook.co <br>


</div>

<table style="width: 100%;">
	<tr>
		<td><b>Fecha:</b> {{$pos->created_at->toDayDateTimeString()}}</td>
		<td style="text-align: right;"><b>Factura Nro. {{$pos->num_factura}}</b></td>
	</tr>
</table>

<b>Cliente:</b> {{$pos->cliente->nombre_cliente}} <br>
<b>Nit:</b> {{$pos->cliente->nit}} <br>
@if(!$pos->boucher)
<b>Forma de pago:</b> {{$pos->cliente->nombres}} Contado <b>_X_</b> Tarjeta <b>__</b><br>
@else
<b>Forma de pago:</b> {{$pos->cliente->nombres}} Contado </b>__ </b> Tarjeta </b>_X_</b><br>
@endif
@if($pos->boucher)
<b>Nro Voucher:</b> {{$pos->boucher}} <br>


@endif
<br>

<div id="casilla">
	<table style="width: 100%; font-size: 12px; text-align: center">
		<tr>
			<th>DESCRIPCION</th>
			<th>CANT</th>
			<th>PVP</th>
			<th>SUBTOTAL</th>
		</tr>
		<?php $total=0;?>
		@foreach($pos->detalle_facturas as $detail)
			<tr style="font-size: 12px;">
				<td >{{$detail->nombre_pro}}</td>
				<td>{{$detail->cantidad}}</td>
				<td>${{number_format( $detail->pvp , 2, ",", ".")}}</td>
				<td>${{number_format( $detail->total , 2, ",", ".")}}</td>
			</tr>
		<?php $total+=
 $detail->total;?>

		@endforeach
	</table>

</div>	
<br>
	<table style="width: 100%;">
	<tr>
		
		<td style="text-align: right;"><b>Total &nbsp;&nbsp;&nbsp;&nbsp;$ {{number_format( $total , 2, ",", ".")}}</b></td>
	</tr>
</table>

<br>
<div id="casilla" style="padding: 10px; ">
	Recibí de conformidad la mercancía de que trata esta
factura y acepto el valor estipulado en la misma.
Declaro recibida la mercancía a satisfacción, y en
consecuencia el valor de la presente factura.
</div>
<br>
<div class="text-center"> <b>***GRACIAS POS SU COMPRA***</b></div>

<br>
<div class="text-center"> <b>www.mrbook.co</b></div>
<div id="line"></div>
</body>
</html>