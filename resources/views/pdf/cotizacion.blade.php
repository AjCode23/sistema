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
      <th style="text-align: center">COTIZACION DE SERVICIO NO.  
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

    <small style="font-size: 10px;">Cotización válida por 30 días</small><br>
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


<table style="font-size: 9px;" >
  <tr>
    <th style="width: 10%"><small style="text-decoration: underline">IMPORTANTE:</small></th>
    <td>Para aprobar ésta cotzación favor enviar “Orden de Servicio” vía e-mail ó confrmación por medio escrito especifcando el número de cotzación (e-mail -
Mensaje de texto - WhatsApp)
</td>
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
      <th style="text-align: center">COTIZACION DE SERVICIO NO.   @if($orden->id < 10)
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

<span style="font-size: 8px;" >Quedamos a su entera disposición para aclarar dudas e inquietudes acerca de la presente cotización.</span>



<!-- TERCERA  PAGINA-->
 <br><table style='page-break-after:always;'></br></table><br>  
<div id="img">
  <img src="./img/logo_all.PNG" style="width: 830px" alt="">
</div>

  <table  id="table">
    <tr>
      <td style="font-size: 8px;"><b>Fecha de Emisión:</b> {{$orden->fecha->format('d/m/Y')}}</td>
      <th style="text-align: center">COTIZACION DE SERVICIO NO.   @if($orden->id < 10)
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

<div class="descripcion" style="font-size: 8px;">
<b>Cordialmente:</b><br><br><br>
<p><b>CONDICIONES GENERALES</b></p>

<div class="text">
	
1. El equipo presentado para calibración, debe tener una identificación (serie o identificación única) que lo diferencie claramente de otros instrumentos de iguales característcas metrológicas. (En
caso de no contar con dicha identificación SET Y GAD SAS asignará una la cual se relaciona en el certificado).

</div>
<div class="text" style="text-decoration: underline;">
2. Todo instrumento recibido para el servicio de calibración en el Laboratorio de Metrología de Set y Gad S.A.S. y que sus resultados no esten dentro de la tolerancia (en los casos en que el cliente
solicite conformidad o el instrumento sea de la marca FLUKE o FLUKE Biomedical) seran reportados en un Certfcado antes de ajuste, el cual se entrega al cliente quien puede tomar la decisión de
ajustarlo o no, ya sea con nuestro laboratorio, cuando se trata de la marca FLUKE o FLUKE Biomedical, o con otro proveedor si es una marca diferente, en ambos casos la calibración debe ser pagada
en su totalidad, con la salvedad de que después de ajustado el instrumento no se cobrará la segunda calibración siempre y cuando el cliente envie el equipo dentro del los 45 días calendario
siguientes a la entrega del certfcado antes de ajuste.
</div>

<div class="text">
3. Cualquier cambio en la oferta inicial generará la emisión de una nueva cotzación.
</div>

<div class="text">
4. SET Y GAD SAS cuenta con el personal competente para realizar las calibraciones.

</div>
<div class="text">
5. El equipo se entrega con su respectvo stcker y certfcado de calibración.

</div>
<div class="text">
6. El equipo debe disponer de todas las conexiones mecánicas y/o eléctricas básicas para su operación y/o confguración.

</div>
<div class="text">
7. El cliente debe suministrar los manuales de operación cuando sea solicitado por el laboratorio.

</div>
<div class="text">
8. El equipo, será sometdo a una prueba de funcionamiento operatvo antes de ejecutar el servicio de calibración, con el fn de confrmar el estado en el que se encuentra; de no encontrarse apto
para realizar la calibración, se informa al cliente para que realice las acciones correctvas correspondientes.

</div>
<div class="text">
9. Para poder realizar el servicio, el cliente no debe encontrarse en mora con la empresa.
10. Cualquier modifcación o copia adicional del certfcado deberá ser solicitada por escrito por parte del cliente, sea en fsico o digital tendrá un costo adicional de: $25.000 + IVA (sin incluir el
envío), la copia digital será enviada al correo relacionado en la presente cotzación.

</div>
<div class="text">
11. La calibración no incluye mantenimiento ni limpieza interna del equipo, por tanto, el cliente deberá realizar actvidades de limpieza, mantenimiento, reparaciones y ajustes necesarios para
garantzar su correcto funcionamiento, antes de iniciar con la actvidad de calibración.

</div>
<div class="text">
12. SET Y GAD garantza la confdencialidad acerca del trabajo realizado y el desempeño obtenido en sus calibraciones. La información que sea suministrada por el cliente al laboratorio de SET Y GAD
SAS será utlizada para los fnes establecidos en la prestación del servicio, teniendo en cuenta que al aceptar los términos de la presente oferta está autorizando al laboratorio al uso de toda la
información requerida, conforme a la polítca de tratamiento de datos POLCAL- 005 ( Acceso por medio de página <a href="">www.setgad.com</a> )y a la ley 1581:2012.

</div>
<div class="text">
13. Si por alguna razón, luego de aprobada esta cotzación acontece un imprevisto para ejecutar la actvidad dentro de los procesos por parte del laboratorio de SET Y GAD SAS, se informará al cliente
la razón por la cual no se puede realizar y se establecerá el proceso a seguir en común acuerdo con el cliente.


</div>
<div class="text">
14. En caso de presentarse quejas, reclamos, sugerencias o felicitaciones por parte del cliente, deberán comunicarse con el departamento de calidad al correo: <a href="">quejasyreclamos@setgad.com</a> o al
PBX: 7559277 ext 104.

</div>
<div class="text">
15. Cuando se hace declaración de cumplimiento, el laboratorio hace referencia a las especifcaciones del fabricante, norma, o requisitos declarados por el cliente. La suma del valor absoluto del
error más la incertdumbre deben estar dentro de especifcación para que la medición se tome como conforme. La regla de decisión aplicada en estos casos sera de aceptación o rechazo simple
segun la ASME B89.7.3.1 numerales 3 y 4.1. La probabilidad de dar una aceptación falsa o un rechazo falso no lo determina el laboratorio de metrologia de Set y Gad SAS, sin embargo se puede
calcular de acuerdo a la guia JCGM 106:2012 según su numeral 8. La regla aplica a los resultados numéricos que se muestran el la columna Pasa/Falla del certfcado de calibración.
</div>

<p>
	
<b>CONDICIONES PARA PRESTACIÓN DE SERVICIO EN LABORATORIO</b><br>
</p>
<div class="text">
1. La programación del servicio se realizará previa disponibilidad asignada por el laboratorio.
</div>
<div class="text">
2. El tempo de realización del servicio se cuenta desde el siguiente día hábil de haber recibido el equipo en las instalaciones de SET Y GAD SAS, dando cumplimiento a las condiciones establecidas en
la oferta comercial, siempre y cuando el cliente haya proporcionado la documentación necesaria antes de la llegada del equipo, tal como la orden.
</div>
<div class="text">
3. Si desea presenciar la calibración de sus equipos, deberá comunicar por escrito al correo <a href="">metrologiasetgad@icloud.com</a> con al menos 2 días hábiles de antcipación y solo podrá presenciar la
calibración de sus equipos; siempre que el laboratorio cuente con disponibilidad en tempo y espacio.
</div>
<div class="text">
4. El equipo debe ser entregado con todos los accesorios necesarios para su operación en perfecto estado, si el equipo funciona con baterías esta deben estar con sufciente carga (preferiblemente
nuevas).
</div>
<div class="text">
5. El equipo debe ser enviado al laboratorio con un embalaje que asegure su protección ante golpes, vibraciones y factores que puedan <b>comprometer</b> la integridad del equipo, y que se encuentre
debidamente rotulado.
</div>
<div class="text">
6. Los costos de seguros, transportes de recogida y entrega del equipo son asumidos por el cliente, a menos de que se pacte lo contrario con el cliente. La empresa SET Y GAD SAS, no asumirá
ninguna responsabilidad por pérdida o daños ocasionados durante el transporte.
</div>
<div class="text">
7. El laboratorio de Set y Gad SAS no se hará responsable de daños causados a los equipos cuando éstos sean por: desastres naturales, terrorismo, incendio, inundación, o casos fortuitos ajenos a las
actvidades del laboratorio.
</div>
<p>
	
<b>
CONDICIONES PARA PRESTACIÓN DE SERVICIO EN SITIO</b><br>
</p>
<div class="text">
1. La ejecución de las actvidades serán programadas previa disponibilidad del laboratorio, la cual será coordinada con el cliente.
</div>
<div class="text">
2. De acuerdo a la condición del numeral 8 de las <b>“condiciones generales”</b> de este mismo documento; si el cliente corrige la falla presentada en el equipo, se realizará la actvidad de calibración
solicitada, siempre y cuando el personal contnúe realizando actvidades en las instalaciones del cliente. En caso contrario se contemplará como un nuevo servicio.
</div>
<div class="text">
3. El cliente debe asignar un responsable encargado de hacer la entrega de los equipos a calibrar y de recibirlos confrmando la ejecución del servicio.
</div>
<div class="text">
4. El personal de SET Y GAD SAS, se presentará en las instalaciones del cliente con el documento de confrmación del presente servicio.
</div>


<table  style="font-size: 9px;width: 600px ; border:1px solid #000; margin-top: 100px; margin-left: 200px;" >
	<tr>
		<th colspan="2">Manifesto Conocer y aceptar todo el contenido de </th>
	</tr>

	<tr>
		<th>la presente cotzaciòn No :</th>
		<th>0000{{$orden->id}}</th>
	</tr>


	<tr>
		<th colspan="2">Firma y nombre : <i style="text-decoration:  underline ; color: #000;
		text-decoration-color: #000"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		 </i></th>
		
	</tr>

	<tr>
		<th colspan="2">
			Fecha : <b style="text-decoration:  underline ; color: #000;
		text-decoration-color: #000">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	</b>	
		
			Sello : <i style="text-decoration:  underline ; color: #000;
		text-decoration-color: #000"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		 </i>
	
	</tr>
</table>


</div>

</body>
</html>