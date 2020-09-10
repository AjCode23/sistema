<html>

	<title>COTIZACION | SIS</title>

	<style >
	  body{
    font-family: 'Helvetica';
    font-size: 15px;
    position: relative;
    left:-25px;
    color: #383838;

  }
  .izq,.center,.der{
    display: inline-block;
    width: 33%;
    
    
    vertical-align: top;
    

  }


.izq{
  width: 55%;
  height: 130px;
  position: relative;
  left:-20px;
  background: #e5e5e5;
border:1px solid #000;
}
.der{
  width: 42%;
  height: 90px;
  margin-left:5px;
}
.cuadro{
  background: #e5e5e5;
border:1px solid #000;
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

#table{
  width: 100%;
  padding: 10px;
  position: relative;
  top:-55px;

} 
.b{

}
#img{
  
  position: relative;
  left : -20px;
  top:-40px;
}
table{
  width: 100%;
}

#top{
  position: absolute;
  top:220px;
  text-align: justify;
  font-size: 9px;
  
  line-height : 19px;
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


	.izq:after{ content: "";}

	.descripcion{
		position: relative;
		top: -50px;
	}
	
    footer {
      position: fixed;
      left: 0px;
      bottom: 10px;
      right: 0px;
      height: 23px;
      border-bottom: 2px solid #781428;
      color: #000;
      font-size: 9px;
  
    }
  
    .footer-form{
    	text-align: center;
    	font-size: 10px; font-family: Helvetica;
    	color:#1d1d1d;
    }
    @page { counter-increment: page   }
    .page:after {
    content:  counter(page);
    }
    .count:after{
    	  content: ;
    }
   
    footer table {
      width: 100%;
    }
    footer p {
      text-align: right;
    }
    footer .izquierda {
      text-align: left;
      font-size: 9px;
    }

	</style>

<body>
 

  

<div id="img">
  <img src="./img/logo_all.PNG" style="width: 830px" alt="">
</div>
  <table  id="table">
    <tr>
      <td style="font-size: 8px;"><b>Fecha de Emisión:</b> {{$orden->fecha->format('d/m/Y')}}</td>
      <th style="text-align: center">ORDEN DE VENTA NO. 	@if($orden->id < 10)
        					  		{{"00000".$orden->id}}
        					  	@elseif($orden->id < 100){
        					  		{{"0000".$orden->id}}
        					  	@elseif($orden->id < 1000){
        					  		{{"000".$orden->id}}
        					  	@elseif($orden->id < 100000){
        					  		{{"0".$orden->id}}

        					  	@elseif($orden->id < 1000000){
        					  		{{$orden->id}}
        					  	@endif</th>
      <td style="font-size: 8px; text-align: right">R-VT-002 V6 / 2020-06-30</td>
    </tr>
  </table>
<div style="position: relative;top:-60px;">
  
  <div class="izq">
    <table style="font-size: 10px; padding:10px;">
      <tr >
        <th style="height: 20px; width: 30px" >Cliente:</th>
        <td>{{$orden->cotizacion->cliente->nombres}}</td>

      </tr>

      <tr >
        <th style="height: 25px;  width: 30px">Dirección:</th>
        <td>{{$orden->cotizacion->cliente->direccion->direccion}}</td>

      </tr>


      <tr>
        <th style="height: 25px;  width: 30px">Nit:</th>
        <td>{{$orden->cotizacion->cliente->numDocumento}}</td>

      </tr>
      <tr>
        <th style="height: 25px;  width: 30px">Telefono:</th>
        <td>{{$orden->cotizacion->cliente->tlf->numero}}</td>

      </tr>
    </table>
  </div>

  <div class="der">
    <div class="cuadro">
      
   <table style="font-size: 10px; padding:10px;">
      <tr >
        <th  >Contacto:</th>
        <td>{{$orden->asesor->nombre}}</td>

      </tr>

      <tr>
        <th >Cargo:</th>
        <td>{{$orden->asesor->cargo->cargo}}</td>

      </tr>


      <tr>
        <th >E-mail:</th>
        <td>{{$orden->asesor->email}}</td>

      </tr>
      <tr>
        <th >Celular:</th>
        <td>{{$orden->asesor->telefono}}</td>

      </tr>
    </table>
    </div>
<br>

    <small style="font-size: 10px;">orden válida por 30 días</small><br>
    <small style="font-size: 8px">  Horarios para recibido y despacho de equipos: Lunes a viernes de 8:00 a 16:00</small>
  </div>
</div>
<small id="top">
  SET Y GAD SAS, como único distribuidor autorizado por FLUKE Biomedical para Colombia, Perú y Ecuador, le ofrece una gran variedad en Simuladores
y Analizadores Biomédicos. Además es el único laboratorio en Latinoamérica entrenado y avalado por FLUKE Biomedical con estimación
de incertidumbre. Nuestro laboratorio se encuentra acreditado conforme a la norma ISO/IEC 17025:2017 con NVLAP; adicionalmente, en Set y
Gad S.A.S. contamos con acreditación ONAC, vigente a la fecha, con código de acreditación 18-LAC-004, bajo la norma ISO/IEC 17025:2005; lo
que asegura la competencia y confiabilidad en todos nuestros procesos de calibración.
Nos complace presentar a usted la siguiente propuesta, basada en sus requerimientos y nuestra experiencia
</small>
<br><br>
<hr style="color: gray">
<table style="font-size: 9px;width: 100%" border="0">
  <tr>
    <th style="">REFERENCIA</th>
    <th style="text-align: center;">DESCRIPCION</th>
    <th style="text-align: center; width: 50px">CANT</th>
    <th style="text-align: right; width: 80px">PRECIO UNITAR</th>
    <th style="text-align: right; width: 70px">PRECIO TOTAL</th>
  </tr>
</table>
<hr style="color: gray">
<table style="font-size: 9px;width: 100%" border="0">
  <?php $sub=0; ?>
@foreach($orden->cotizaciones->where('status',2) as $c)
<tr>
    <td style="">{{$c->articulo->articulo}}</td>
    <td style="text-align: center;">{{$c->articulo->descripcion}}</td>
    <td style="text-align: center; width: 50px">{{number_format($c->cantidad,2,',','.')}}</td>
    <td style="text-align: right; width: 80px">{{number_format($c->pvp,2,',','.')}}</td>
    <td style="text-align: right; width: 70px">{{number_format($sub+=($c->pvp * $c->cantidad),2,',','.')}}</td>
  </tr>
@endforeach




</table>
<hr style="color: gray">
	

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





<table style="font-size: 8px;  border: 1px solid #d0d0d0">
  <tr>
    <th style="width: 5%; text-align:justify"><small style="text-decoration: underline">NOTA 1:</small></th>
    <td>Para los servicios a realizar en las instalaciones del cliente, los costos por desplazamiento y viáticos serán asumidos por parte del cliente, por lo cual se deben concretar las fechas, los
días y el costo con el laboratorio.

</td>
  </tr>

  <tr>
    <th style="width: 5%; text-align:justify"><small style="text-decoration: underline">NOTA 2:</small></th>
    <td>Los puntos adicionales o cambio de los valores predeterminados se deben solicitar en el formato R-VT-003 con anterioridad para evaluar la posibilidad de prestar el servicio y cotzar
según lo requerido; en caso contrario el servicio se realizará conforme al proceso estándar establecido por el laboratorio presentado en esta oferta.
</td>
  </tr>


  <tr>
    <th style="width: 5%; text-align:justify"><small style="text-decoration: underline">NOTA 3:</small></th>
    <td>Los puntos adicionales y cambio de los valores predeterminados tenen costo adicional. Para los servicios que indica que se realiza la calibracion en los puntos defnidos por el cliente
el cambio de los valores predeterminados no tene costo adicional. (Temperatura por contacto, temperatura ambiente, temperatura en banos y bloques, humedad relatva, potencia
irradiada, intensidad luminica)
</td>
  </tr>


  <tr>
    <th style="width: 5%; text-align:justify"><small style="text-decoration: underline">NOTA 4:</small></th>
    <td>Las calibraciones se realizan en las instalaciones fjas del laboratorio de Set y Gad S.A.S. a menos que el cleinte solicite una ubicacion diferente en el formato R-VT-003, esto, cuando la
descripcion del servicio indica que es posible realizar la calibracion en un lugar diferente a las instalciones fjas del laboratorio
</td>
  </tr>


  <tr>
    <th style="width: 5%; text-align:justify"><small style="text-decoration: underline">NOTA 5:</small></th>
    <td>Los costos de envio y despacho de los instrumentos no estan incluidos en la oferta de venta y deben ser asumidos por el cliente.

</td>
  </tr>
</table>
<p style="text-decoration: underline;font-weight: bold; font-size: 8px;">VALORES AGREGADOS:</p>
<small style="font-size: 8px;">
  
* Trabajamos con la mejor tecnología para garantzar la menor incertdumbre en todas nuestras calibraciones.<br>
* Variedad en los servicios ofertados en el campo biomédico e industrial.
</small>

<table style="font-size: 8px;  border: 1px solid #d0d0d0" border="">
  <tr>
  	<th width="150px">Tiempo de entrega:</th>
  	<td></td>
  </tr>

  <tr>
  	<th>Forma de pago:</th>
  	<td></td>
  </tr>

  <tr>
  	<th>Pago en oficina, efectivo o tarjeta:</th>
  	<td></td>
  </tr>
  <tr>
  	<th colspan="2">
  		Consignacion o transferencia bancara a nombre de Set y Gad S.A.S. NIT 830065092-8

  	</th>
  </tr>
  <tr >
  	<td  class="text-center">Cuenta corriente Bancolombia: </td>
  	<td>65853097434</td>
  </tr>

  <tr >
  	<td  class="text-center">Cuenta corriente Davivienda:</td>
  	<td>476969995317</td>
  </tr>

  <tr>
  	<td  class="text-center"> Cuenta corriente Colpatria: </td>
  	<td>004301000532</td>
  </tr>
</table>
	
	
	




 <br><br>

<footer>
    <table>
      <tr>
        <td style="width:200px;">
            <p class="izquierda"  style="font-weight: bold">
            	Set y Gad s.a.s
            </p>
         
            Carrera 48 # 101A - 69, Bogotá, Colombia 
        </td>

        <th style="text-align: center; font-weight: normal; ">
            <p class="text-center ">PBX </p>
  
            571.755.9277
        </th>
        <td style="width:150px">
        
        <p>
        	
          <span class="page">
            Página 
          </span>
          
        </p>
  
           <b> www.setgat.com</b>
          
        </td>
      </tr>
     
      <tr>
      <td colspan="3" class="text-center footer-form">
   <b style="color: #781428;">DIOS AYUDA A QUIEN CONFIA EN EL</b>
      
      </td></tr>
    </table>
  </footer>


<!-- SEGUNDA PAGINA-->
 <br><table style='page-break-after:always;'></br></table><br>  
<div id="img">
  <img src="./img/logo_all.PNG" style="width: 830px" alt="">
</div>

  <table  id="table">
    <tr>
      <td style="font-size: 8px;"><b>Fecha de Emisión:</b> {{$orden->fecha->format('d/m/Y')}}</td>
      <th style="text-align: center">ORDEN DE VENTA NO.	@if($orden->id < 10)
        					  		{{"00000".$orden->id}}
        					  	@elseif($orden->id < 100){
        					  		{{"0000".$orden->id}}
        					  	@elseif($orden->id < 1000){
        					  		{{"000".$orden->id}}
        					  	@elseif($orden->id < 100000){
        					  		{{"0".$orden->id}}

        					  	@elseif($orden->id < 1000000){
        					  		{{$orden->id}}
        					  	@endif</th>
      <td style="font-size: 8px; text-align: right">R-VT-002 V6 / 2020-06-30</td>
    </tr>
  </table>
<div class="descripcion">
	
<hr style="color: gray">
<table style="font-size: 9px;width: 100%" border="0">
  <tr>
    <th style="">REFERENCIA</th>
    <th style="text-align: center;">DESCRIPCION</th>
    <th style="text-align: center; width: 50px">CANT</th>
    <th style="text-align: right; width: 80px">PRECIO UNITAR</th>
    <th style="text-align: right; width: 70px">PRECIO TOTAL</th>
  </tr>
</table>
<hr style="color: gray">
<table style="font-size: 9px;width: 100%" border="0">
  <?php $sub=0; ?>
@foreach($orden->cotizaciones->where('status',2) as $c)
<tr>
    <td style="">{{$c->articulo->articulo}}</td>
    <td style="text-align: center;">{{$c->articulo->descripcion}}</td>
    <td style="text-align: center; width: 50px">{{number_format($c->cantidad,2,',','.')}}</td>
    <td style="text-align: right; width: 80px">{{number_format($c->pvp,2,',','.')}}</td>
    <td style="text-align: right; width: 70px">{{number_format($sub+=($c->pvp * $c->cantidad),2,',','.')}}</td>
  </tr>
@endforeach

</table>
<hr style="color: gray">

<span style="font-size: 8px;" >Obsercaciones:</span>
</div>

<span style="font-size: 8px;" >Quedamos a su entera disposición para aclarar dudas e inquietudes acerca de la presente orden.</span>






</body>
</html>