<html>

	<title>Articulos | SIS</title>

	<style >
	.center,.left,.right{
		display: inline-block;

		width: 35%;
	}
	.center	{
	width: 30%;
	}
	#img{
		width: 200px;
		height: 120px;
		position: absolute;
		left: -20px;
		top: -25px;
	}
	.letra{
		color: #1d1d1d;
		font-family: 'Helvetica';
		font-size: 10px;
		padding: 0px;
		line-height: 3px;

	}
	.text-center{
		text-align: center
	}


	.text-left{
		text-align: left;
	}


	.text-right{
		text-align: right;
	}

	.top{
		position: absolute;
	
		top: -20px;
	}
	body{
		font-family: 'Helvetica';
		font-size: 12px;
		color:#5f5f5f;
	}

	.izq:after{ content: "";}

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
		top: 85px;
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

    header { position: fixed;
      left: 0px;
      top: -160px;
      right: 0px;
      height: 100px;
      background-color: #ddd;
      text-align: center;
    }
    header h1{
      margin: 10px 0;
    }
    header h2{
      margin: 0 0 10px 0;
    }
    footer {
      position: fixed;
      left: 0px;
      bottom: -10px;
      right: 0px;
      height: 40px;
      border-bottom: 2px solid #ddd;

    }
  
    .footer-form{
    	text-align: center;
    	font-size: 10px; font-family: Helvetica;
    	color:#1d1d1d;
    }
    @page { counter-increment: page }
    .page:after {
    content: counter(page) ;
    }
   
    footer table {
      width: 100%;
    }
    footer p {
      text-align: right;
    }
    footer .izq {
      text-align: left;
    }

	</style>

<body>
 

  
<div class="left">
	<img src="./imgUsers/ni.jpg" id="img">
<h1>hola</h1>
</div>


<div class="center letra text-center">

<table style="width: 100%; text-align:center;" border="0">
	<tr >
		<td style="height: 15px;"><b>LA TRINIDAD SAS</b></td>
		
	</tr>
	<tr>
		<td style="height: 10px;">Nit:0000001</td>
		</tr>
		<tr>

		<td style="height: 20px;">Direccion: Carrera 107b # 70 - 65 <br><br><br> Barrio Villas Del Dorado, Bogotá – Colombia</td>
			
		</tr>

		<tr>

			<td style="height: 10px;">
		
	Telefono: +57 (1) 542 20 72 <br><br> <br> Celular: +57 315 229 6361 
			</td>
			
		</tr>
		<tr>

			<td style="height: 10px;">
		
	Correo: latrinidadsas@gmail.com 
			</td>
			
		</tr>

		
	
</table>
	
 
	
	
	


	
	
</div>

<div class="right text-center top">
	<h2><b></b></h2>
	
</div>
<hr>
<!--<p style="" class="letra"> TELEFONO:  DIRECCION:  - contacto@mrbook.co </p>-->

<h2 style="text-align: center">LISTA DE ARTICULOS</h2>


<table style= "width: 100%; text-align: center; border:1px solid #d0d0d0;height: 20px;border-radius:10px;">
	<thead>
		<tr style="background:#d0d0d0; border: 1px solid;height: 20px;">
			<th>ITEM</th>
			<th>PRODUCTO</th>
			<th>CATEGORIA</th>
			<th>CODIGO</th>
			<th>CANTIDAD</th>
			<th>PRECIO</th>
			<th>DESCRIPCION</th>
		</tr>
		<?php $sub=0;$iva=0;$i=1; ?>
		

		@foreach($articulos as $a)
		<tr @if($i%2 == 0) style="background: #f0f0f0;" @endif>
			<th>{{($i++)}}</th>
			<th>{{$a->articulo}}</th>
			<th>{{$a->categoria->categoria}}</th>
			<th>{{$a->codigo}}</th>
			<th>{{number_format($a->stock,2,',','.')}}</th>
			<th>{{number_format($a->pvp,2,',','.')}}</th>
			<th>{{$a->descripcion}}</th>
			<th></th>
		</tr>
		@endforeach
	</thead>
	<tbody>

	
</table>

<hr>
 
<br><br>




<footer>
    <table>
      <tr>
        <td style="width:200px">
            <p class="izq"></p>
        </td>

        <th style="text-align: center;">
            <p class="text-center ">Articulos Registrados </p>

        </th>
        <td style="width:150px">
          <p class="page">
            Página

          </p>

          
        </td>
      </tr>
      <tr>
      <td colspan="3" class="text-center footer-form">
    Fecha: {{Date('d/m/Y')}}
      
      </td></tr>
    </table>
  </footer>


</body>
</html>