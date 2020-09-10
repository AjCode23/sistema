<html>
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

<body>


	<div class="izq c-6  large">
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
	<h3 class="text-center">REPORTE DE PAGOS Y DEPOSITOS DEL MES {{$mes}} DEL AÑO {{$year}}</h3>
<table class="table table-hover ">
  <thead>
    <tr>
      <td colspan="3"  class="text-orange"  style="font-weight: bold">Pagos Por Cliente <br></td>
    </tr>
  </thead>
  <tr>
    <th>#</th>
    <th>CLIENTE</th>
    <th>BANCO</th>
    <th>VENTA</th>
    <th>MONTO</th>
  
    <th>STATUS</th>
  </tr>
  <?php $i=1; ?>

  @foreach($pagos as $p)
  <?php  ?>

   <tr>
      <td>{{$i++}}</td>
      <td>{{$p->venta->cliente->propietario}}</td>
      <td>{{$p->banco->banco}}</td>
      <td>{{$p->venta->fecha->format('d/m/Y')}}</td>
      <td>{{ number_format($p->monto,2,',','.')}}</td>
    
      <td>
        @if($p->status == 1)
          <b class="text-orange">Pendiente</b>
        @else
          <b class="text-green">Confirmada</b>
        @endif
      </td>
    </tr>
  @endforeach
</table>


<hr>
<div class="table-responsive"   style="overflow: auto; max-height: 900px;">
    <table class="table table-hover">
      <thead>
        <tr>
          <td  colspan="3" class="text-orange" style="font-weight: bold">Depositos Realizados <br></td>
        </tr>
      </thead>
      <tr>
        <th>#</th>
        <th>BANCO</th>
        <th>MONTO $$</th>
        <th>MONTO Bs</th>
        <th>TIPO</th>
        <th>STATUS</th>
      </tr>

  <?php $i=1; ?>
      @foreach($depositos as $d)
      

       <tr>
          <td>{{$i++}}</td>
          <td>{{$d->banco->banco}}</td>
          <td>{{ number_format($d->monto*$d->puntaje,2,',','.') }} </td>
          <td>{{ number_format($d->monto,2,',','.') }} </td>
          <td>{{$d->banco->banco}}</td>
        
          <td>
            @if($d->status == 5 )
              <b class="text-orange">Pendiente</b>
            @else
              <b class="text-green">Confirmada</b>
            @endif
          </td>
        </tr>
      @endforeach
    </table>
	

		



</body>
</html>