<!DOCTYPE html>
<html lang="en">

<style>

	body{
		font-family: 'Helvetica';
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

.text-center{
	text-align: center;
}

.large{
	height: 60px;
}

.table{
	width: 100%;
}
</style>

<body>


	<div class="izq c-6 border-rounded text-center large">
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
		FECHA:
		</b>
		<br>
		{{Date('d/m/Y')}}
		

	</div>
	<hr>
	<h3 class="text-center">INVENTARIO</h3>

		<table class="table" style="border:1px #f0f0f0 solid;">
			<tr>
				<th>#</th>
				<th>CATEGORIA</th>
				<th>PRODUCTO</th>
				<th>STOCK</th>
				<th>COSTO</th>
				<th>PVP</th>
				<th>GANANCIA</th>
				<th>TOTAL PVP</th>
				
			</tr>
			<?php  $i=1; $total=0;$costo=0; ?>
			@foreach($productos as $p)
				@if($p->categoria->categoria != 'Diferencia')

					@if($i % 2 ==0)


						<tr>
					@else

						<tr style="background: #d0d0d0">
					@endif
							<td>{{$i++}}</td>
							<td>{{$p->categoria->categoria}} </td>
							<td>{{$p->producto}} </td>
							<td>{{number_format($p->stock,2,',','.')}}</td>
							<td>{{number_format($p->costo,2,',','.')}}</td>
							<td>{{number_format($p->pvp,2,',','.')}}</td>
							<td>{{number_format($p->pvp - $p->costo,2,',','.')}}</td>
							<td>{{number_format($p->pvp * $p->stock ,2,',','.')}}</td>
							
						</tr>
					<?php 

					 $total+=($p->pvp)*$p->stock ;
					 $costo+=($p->costo)*$p->stock ;
					 ?>
				@endif
			@endforeach
		</table>

		<hr>

		<table class="table" style="border: 1px #d0d0d0 solid;">
	<tr>
	
		<th>INVERSION</th>
		<th>GANANCIA</th>
		<th>TOTAL </th>
	</tr>


	<tr>
		
		<td>{{number_format($costo,2,',','.')}}</td>
		<td>{{number_format($total-$costo,2,',','.')}}</td>
		<td>{{number_format($total,2,',','.')}} </td>
	</tr>

</table>



</body>
</html>