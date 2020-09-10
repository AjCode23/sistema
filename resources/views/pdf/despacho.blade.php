<!DOCTYPE html>

	<meta charset="UTF-8">

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
	border: 1px #d0d0d0 solid;
}
.img-icon{
	width: 30px;
	height: 30px;
}

.table-bordered td,.table-bordered th{border:1px solid #ddd!important}

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
	<table class="table table-bordered" border="0">
	<?php $col=$productos->count()+8;	 ?>
		<tr>
			
			<th colspan="{{$col}}" class="text-center">Despacho de Productos</th>
			
		</tr>
		<tr >
			<th style="border: 1px solid #000;">Clientes</th>
			@foreach($productos as $p)

			<th style="width: 10px;">{{$p->producto[0]}}{{$p->producto[1]}}{{$p->producto[2]}}</th>


			@endforeach
			
			<th>Deuda</th>
			<th>Moneda</th>
			<th>Abono</th>
			<th>Resta</th>
			<th>Deuda Hoy</th>
			<th>Total Deuda</th>
			<th>Observ.</th>
		</tr>


	</table>

	

</body>
</html>