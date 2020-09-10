
	<html>
<style>
	body{
		font-family: 'Helvetica';
		font-size: 12px;
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
</style>
<?php 
function formato($f){
  $f=explode('-', $f);
  return $f[2].'/'.$f[1].'/'.$f[0];
}
?>
<body>


	<div class="izq c-6  large">
		<b class="title">
		{{strtoupper($config)}}
		</b>
		<br>
		RIF: {{$config}} - TLF:{{$config}}
		<br>
		{{$config}}
	
		
	</div>
	<div class="der border-rounded text-center large">
		<b class="title">
		FECHA:
		</b>
		<br>
		{{Date('d/m/Y')}}
		

	</div>
	<hr>
	<h3 class="text-center">COTIZACIONES
	<p>
    
  
  </p>
	</h3>

<table class="table table-hover ">
                  <thead>
                 <tr style="background: #0054a0;color: #fff; text-align: center;padding:10px;">
                   
                    <th style="padding:10px;">Fecha</th>
                    <th>Cliente</th>
                    <th>Condicion de Pago</th>
                    <th>Asesor</th>
                    <th>Serie</th>
                    <th  class="text-center">Numero</th>
                    <th  class="text-center">Estado</th>
                  </tr>
                  </thead>

                  <tbody>
                  	
                  @foreach($cotizaciones as $o)
                  <tr>
                    <td style="padding:5px;">{{strtoupper($o->fecha->format('d/m/Y'))}}</td>
                    
                    <td>{{strtoupper($o->cotizacion->cliente->nombres)}}</td>
                    <td>{{strtoupper($o->condicion->condicion)}}</td>
                    <td>@if($o->asesor) {{strtoupper($o->asesor->asesor)}} @else  Ninguno @endif</td>
                    
                    <td>{{strtoupper($o->serie)}}</td>
                    <td>
                    	@if($o->id < 10)
					  		{{"00000".$o->id}}
					  	@elseif($o->id < 100){
					  		{{"0000".$o->id}}
					  	@elseif($o->id < 1000){
					  		{{"000".$o->id}}
					  	@elseif($o->id < 100000){
					  		{{"0".$o->id}}

					  	@elseif($o->id < 1000000){
					  		{{$o->id}}
					  	@endif

                    </td>
                    <td class="text-center">
                      @if($o->status == 1)
                        <b class="text-green"> <i class="mdi mdi-check"></i></b>

                      @else

                        <b class="text-red"> <i class="mdi mdi-close"></i></b>

                      @endif

                    </td>
                    
                   
                  </tr>
                  @endforeach
                </table>








</body>
</html>