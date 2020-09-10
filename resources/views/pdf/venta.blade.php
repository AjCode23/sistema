<html>
	
<style>
	@page { size: 612.2pt 396pt; }
	body{
		/*font-family:"Courier New", Courier, monospace;*/
		font-family: 'Helvetica';
		font-size: 8px;
	}
	.izq,.center,.der{
		display: inline-block;
		width: 33%;
		/*background: red;*/
		
		vertical-align: top;
	}


	.c-6{
		width: 64.5%;
	}

	.c-12{
		width: 98%;
	}

	.title{
		font-weight: bold;
		font-size: 19px;
	}

	.border-rounded{
		border: 1px #000 solid;
		border-color: #000;
		border-radius: 5px;
	}

	.membrete{
		width: 100%;
		display: inline-block;
		background: #FFF;
		height: 50px;
	}

.text-center{
	text-align: center;
}

.large{
	height: 20px;
}

.table-bd{
    	border: 1px #d0d0d0 solid;
}

.table{
	width: 100%;

}
.img-icon{
	width: 30px;
	height: 30px;
}
.text-blue{
	color: blue;
}

.text-green{
	color: green;
}

.text-orange{
	color: orange;
}

.text-brown{
	color: brown;
}
.fact{
	color:red;
	font-family: helvetica;
	font-size: 30px;
}
.b{
	font-weight: bold;
}

footer {
  
  position: absolute;
  bottom: 0;
  width: 100%;

} 

</style>
<?php 
function fact($num){
	if($num < 10){
		return "00000".$num;
	}else if($num < 100){
		return "0000".$num;
	}else if($num < 1000){
		return "000".$num;
	}else if($num < 10000){
		return "00".$num;
	}else if($num < 100000){
		return $num;
	}
}


?>
<body>
	<!--<div class="izq c-6   large">
		<b class="title">
		{{strtoupper($config->empresa)}}
		</b>
		<br>
		RIF: {{$config->rif}} - TLF:{{$config->telefono}}
		<br>
		{{$config->direccion}}
	
		
	</div>
	<div class="der border-rounded text-center large">
		<b class="title">
		FACTURA NRO:
		</b>
		<br>
		<b class="fact">
		{{fact($venta->id)}}
		</b>
		

	</div>
	<hr>-->
	<div class="membrete">
	
	</div>
	<table style="width: 100%;">
		<tr>
			<td><b>RIF:</b> <span>{{$venta->cliente->tipo.'-'.$venta->cliente->rif}}</span> </td>
			<td><b>LICENCIA:</b> <span>{{$venta->cliente->licencia}}</span> </td>
			<td style="text-align: right"><b>CONDICION DE PAGO:</b> <span>Contado</span>  </td>
		</tr>

		<tr>
			<td><b>NOMBRE O RAZON SOCIAL:</b> <span>{{$venta->cliente->propietario}}</span> </td>
			<td colspan="2"><b>NOMBRE DEL NEGOCIO:</b> <span>{{$venta->cliente->empresa}}</span> </td>
			
		</tr>

		<tr>
			<td><b>TELEFONO:</b> <span>{{$venta->cliente->telefono}}</span> </td>
			<td colspan="2"><b>DIRECCION:</b> <span>{{$venta->cliente->direccion}}</span> </td>
			
		</tr>
	</table>
		<hr>
<table class="table table-hover table-bd">
		<?php $i=1;
	 	 $totalPesos=0; 
	 	 $iva=0;
	 	  $excento=0;
	 	  $ne=0;
	 	  $abonoBs=0; 
	 	  $sub=0; 

	 	  ?>
	
	 
	 	<?php $total=0; ?>
		

                            <tr style="background: #f0f0f0;">
                             
                              <th style="width: 200px;">DESCRIPCION</th>
                              <th style="text-align: right">PRECIO UNITARIO</th>
                              <th class="text-center">CANTIDAD U/M</th>
                              <th style="text-align: right">IMPORTE</th>
                             
                            </tr
                    >

      	                     @foreach($venta->detalles as $d)
      		                      <tbody >
      		                      	  <tr>
      		                       
      		                        <td>{{$d->producto->producto}}</td>
      		                        <td style="text-align: right">
      		                        @if($d->producto->excento == 1) 
      		                        	{{number_format($pvp=$d->pvp,2,',','.')}}
      		                        	(E)
      		                        <?php $excento+=$d->pvp *$d->cantidad; ?>
									@else
      		                        	{{number_format($pvp=(($d->pvp)/($config->iva/100 +1)),2,',','.')}}
      		                        	<?php $iva+=$d->pvp*$d->cantidad; ?>
      		                        <?php $ne+=$pvp *$d->cantidad; ?>

									@endif
									
    	  		                    </td>
      		                        <td style="text-align: center">{{$d->cantidad}} {{$d->producto->um}}</td>
      		                        <td style="text-align: right">
      		                        	{{number_format($pvp *$d->cantidad,2,',','.')}}
      		                        </td>
      		                        
      		                      </tr>
      		                     </tbody>
      		                     <?php 
	      		                     $total+= ($d->pvp *$d->cantidad);
	      		                     $sub+=$pvp*$d->cantidad;                              
                               ?>
      	                     @endforeach
      	                 <br>

	
</table>

<div style="">
	<table class="table table-bd2 "  border="0">
		<tr  >
			<th width="85px">CONDUCTOR:</th>
			<td>@if($venta->conductor) {{strtoupper($venta->conductor->nombres)}}  @endif</td>
			<th style="text-align: right">SUBTOTAL:</th>
			
			<td style="text-align: right">{{number_format($sub,2,',','.')}}</td>
		</tr>
		<tr  >
		    <th>CEDULA:</th>
			<td>@if($venta->conductor) {{strtoupper($venta->conductor->cedula)}}  @endif</td>
			<th style="text-align: right">EXCENTO (E):</th>
			<td style="text-align: right">{{number_format($excento,2,',','.')}}</td>
		</tr>


		<tr>
		    <th>TIPO DE VEHICULO:</th>
			<td>@if($venta->vehiculo) {{strtoupper($venta->vehiculo->tipo)}}  @endif</td>
			<th style="text-align: right"> MONTO BASE IMPONIBLE 16%:</th>
			<td style="text-align: right">{{number_format($ne,2,',','.')}}</td>
		</tr>


		<tr>
		    <th>PLACA:</th>
			<td>@if($venta->vehiculo) {{strtoupper($venta->vehiculo->placa)}}  @endif</td>
			<th style="text-align: right">MONTO IVA 16%:</th>
			<td style="text-align: right">{{number_format($ne * ($config->iva / 100),2,',','.')}}</td>
		</tr>


		<tr>
		    <th>FIRMA DEL CLIENTE:</th>
			<td></td>
			<th style="text-align: right">VALOR TOTAL DE LA VENTA EN BS:</th>
			<td style="text-align: right">{{number_format($total,2,',','.')}}</td>
		</tr>

		
	</table>
</div>





</body>
</html>
