
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
<?php 
function formato($f){
  $f=explode('-', $f);
  return $f[2].'/'.$f[1].'/'.$f[0];
}
?>
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
	<h3 class="text-center">CIERRE DE  VENTAS
	<p>
    
  <b>DESDE:</b>{{formato($inicio)}}   |  <b>HASTA:</b>{{formato($fin)}}
  </p>
	</h3>

<table class="table table-hover ">
		<?php $i=1;
	 	 $totalPesos=0; $totalBs=0; $abonoPesos=0;
	 	  $abonoBs=0; ?>
	
	 @foreach($ventas as $v)
	 	<?php $total=0;
	 	 $fecha=explode('-', $v->fecha) ?>
		<tr onclick="redirect_venta({{$v->id}})" >
                          			<th colspan="5" style="background:#f0f0f0;"> Fecha: {{$fecha[2]}}/{{$fecha[1]}}/{{$fecha[0]}} | Cliente: <i class="mdi mdi-credit-card"></i> {{$v->cliente->tipo}}-{{$v->cliente->rif}}  <i class="mdi mdi-tie"></i> {{$v->cliente->empresa}} <i class="mdi mdi-account-box-outline"></i> {{$v->cliente->propietario}}</th>
        </tr>

                            <tr>
                              <th>#</th>
                              <th style="width: 350px;">PRODUCTO</th>
                              <th style="width: 100px;">CANTIDAD</th>
                              <th>PVP</th>
                              <th>TOTAL</th>
                            
                            </tr>

                    
      	                     @foreach($v->detalles as $d)
      		                      <tbody >
      		                      	  <tr>
      		                        <td>{{$i++}}</td>
      		                        <td>{{$d->producto->producto}}</td>
      		                        <td>X{{$d->cantidad}}</td>
      		                        <td>{{number_format($d->pvp,2,',','.')}}</td>
      		                        <td>{{number_format($d->pvp *$d->cantidad,2,',','.')}}</td>
      		                        <td style="width: 30px;"></td>
      		                      </tr>
      		                     </tbody>
      		                     <?php $total+= ($d->pvp *$d->cantidad); 
                              
                               ?>
      	                     @endforeach
      	                     


                              <tr> 
                                    <td colspan="5">

                                       <table style="width: 100%;">
                                         <tr>
                                           <th>TOTAL BS: {{number_format($total,2,',','.')}}
                                           </th>
                                           <th>TOTAL COP:
                                              @if($v->pago == 1)

                                                <?php $totalPesos+=$total*$v->precio_bs; 
                                                 $abo=$v->depositos->sum('monto');
                                                  $abonoPesos+=$abo;

                                               ?>
                                                $$: ({{$v->precio_bs}}) {{number_format($total=$total*$v->precio_bs,2,',','.')}}


                                              @else

                                              <?php $totalBs+=$total;
                                              $abo=$v->depositos->sum('monto');
                                              $abonoBs+=$abo; ?>

                                              @endif
                                           </th>
                                           <th>ABONOS:
                                              {{number_format($abo,2,',','.') }}
                                           </th>
                                           <th>RESTA: 
                                              {{number_format($total-$abo,2,',','.')}}
                                           </th>
                                         </tr>
                                       </table>
                                     </td>
                             </tr>

      	                     <tr> 
								<td colspan="5"><hr>
                </td>
      	                     </tr>

      	                    




	 @endforeach

	
</table>





   <h4 >TOTALES EN BOLIVARES Y PESOS.</h4>
<hr>

  
  <table class="table table-bordered " >
    <tr>
      <th>TOTAL EN $$</th>
      <th>ABONOS EN $$</th>
      <th>TOTAL EN BS</th>
      <th>ABONOS EN BS</th>
    </tr>

     <tr>
      <th>{{number_format($totalPesos,2,',','.')}}</th>
      <th>{{number_format($abonoPesos,2,',','.')}}</th>
      <th>{{number_format($totalBs,2,',','.')}}</th>
      <th>{{number_format($abonoBs,2,',','.')}}</th>
    </tr>
    
  </table>



<h4 >TOTALES ENTRADAS Y SALIDAS.</h4>
<hr>

  <table class="table table-bordered" >
    <tr>
      <th>#</th>
      <th>PRODUCTO</th>
      <th>ENTRADA</th>
      <th>SALIDA</th>

    </tr>
  <?php $num=1; 
   ?>
    @foreach($productos as $p)
      @if($num % 2 == 0)
       <tr style="background: #f0f0f0;">
      @else
       <tr>
      @endif
      <td>{{$num++}}</td>
      <td>{{$p->producto}}</td>
      <td>
       <?php /*$venta=App\Venta::where('')->get()*/ 
        $cant=0;
       foreach ($compras as $c) {
        $detalles=$c->detalles->where('producto_id',$p->id);
          foreach ($detalles as $d){
            if($d->status == 1){
            $cant+=$d->cantidad;
            }
          }
       }

        echo  'X'.$cant;
        ?></td>
      <td>
        <?php /*$venta=App\Venta::where('')->get()*/ 
        $cant=0;

         foreach ($ventas as $c) {
        $detalles=$c->detalles->where('producto_id',$p->id);
          foreach ($detalles as $d){
            if($d->status == 1){
            $cant+=$d->cantidad;
            }
          }
       }
        
        echo  'X'.$cant;
        ?>
        
      </td>

    </tr>

    @endforeach
    
  </table>

  <hr>
<h4 >TOTALES DE VENTAS DE CLIENTES.</h4>
<hr>

    <table class="table table-bordered">
      <tr>
        <th>#</th>
        <th>CLIENTE</th>
        <th>VENTA</th>
        <th>ABONOS </th>
        <th>DEUDA </th>

      </tr>
    <?php
     $num=1;
     $clt=App\Cliente::all();
     $id=0;
     ?>

     @foreach($clt as $c)
      @if($num % 2 == 0)
       <tr style="background: #f0f0f0;">
      @else
       <tr>
      @endif
          <td>{{$num++}}</td>
          <td>{{$c->empresa}}</td>
          <td> 
            <?php 

            $totalCliente=0;
            $abonos=0;
            foreach ($ventas->where('cliente_id',$c->id) as $v) {
              $t=0;
              foreach ($v->detalles as $d) {
                $t+=$d->pvp *$d->cantidad;
              }
              if($v->pago ==1){
              $totalCliente+= ($t) * $v->precio_bs ; 
              }else{            
              $totalCliente+= ($t) ;  
              }

              $abonos+=$v->depositos->sum('monto');
            }

             
             ?>  
             @if($c->pago == 1)
              $$.
             @else
              BsS.
             @endif
          {{number_format($totalCliente,2,',','.')}}
           </td>
          
          <td> 

          {{number_format($abonos,2,',','.')}}
          </td>
          <td>
             {{number_format($totalCliente -$abonos,2,',','.')}}
          </td>
        </tr>

     @endforeach
      
    </table>

  <hr>
		



</body>
</html>