@extends('layouts.app')

@section('name','..|Estado Orden de Venta|..')

@section('ol')
 <a style="color: #e68618;" href="{{url('home')}}" class="link" title=""><i class="mdi mdi-home"></i> Home
</a>
/
 <a class="link" title=""><i class="mdi mdi-account-location"></i> Estado</a>
@endsection

@section('css')

@endsection

@section('js')

<script>
 
/*
 Swal.fire({
  title: 'Confirme?',
  text: "¿Esta Seguro de procesar esta orden de Venta?",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, Continuar!'
}).then((result) => {
  if (result.value) {
    Swal.fire(
      'Aceptado!',
      'Puede continuar con el proceso de la orden de venta!',
      'success'
    )
    $('#section-body').show();
  }else{
    document.location="{{url('ordenes')}}";
  }
})


*/

  function aprobarAll(data){  
    cuadro=$('#aprobarTodos');
    if(cuadro.is(":checked")){
      $.each(data,(k,v)=>{
        $('#aprobar_'+v.id).prop('checked',true);
      });
    }else{
      $.each(data,(k,v)=>{
        $('#aprobar_'+v.id).prop('checked',false);
      });
    }

  }

  function checkActivate(input=null){
    cuadro=$('#aprobarTodos');
    if(cuadro.is(":checked")){
      cuadro.prop('checked',true);
    }

  }


function guardar(form){
  o=parseInt($('#observacion').val());
  doc=parseInt($('#documentos').val());

 
    Swal.fire({
              title: 'Confirme!',
              text: "La Orden de venta se procesará se dividira a los departamentos  correspondiente ¿Desea Confirmar?",
              icon: 'question',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Si!'
            }).then((result) => {
              if (result.value) {
                $('#formulario-aprobar').submit();
              }
            })

  

}

$('#form-acep').on('submit',(e)=>{
  e.preventDefault();
             Swal.fire({
              title: 'Confirme!',
              text: "Autoriza a la empresa para considerar este documento como legal para proceder con la orden de venta?",
              icon: 'question',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Si!'
            }).then((result) => {
             if (result.value) {
               $('#formulario-aprobar').submit();
              }
            })

});
</script>
@endsection
@section('content')
@include('modals.condiciones')


  
  <!-- Left col -->
          <section class="col-lg-12 connectedSortable" id="section-body" style="display: non">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="mdi mdi-check mr-1"></i>
                  Estado de compra de venta
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                   
                    
                       <li class="nav-item">
                      <a class="nav-link btn-danger active" href="{{url('/ordenes')}}"  style="color: #fff !important;"><i class="mdi mdi-reply"></i> Regresar</a>
                    </li>
                  
                  </ul>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">

                 
                  @include('alerts')
                  
          
    <div class="row">
                    
                    <div class="col-sm-4">
                      <label for="">Cliente </label>
                        <input type="text" value="{{$orden->cotizacion->cliente->nombres}}"  disabled class="form-control" id="cliente">
                    </div>

                    <div class="col-sm-4">
                      <label for=""> Condicion de Pago </label>
                        <input type="text" value="{{$orden->condicion->condicion}}"  disabled class="form-control" id="condicion">
                     
                    </div>

                    <div class="col-sm-4">
                      <label for="">Fecha </label>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                        </div>
                        <input type="date" value="{{$orden->fecha->format('Y-m-d')}}" class="form-control" disabled id="fecha">
                      </div>
                    </div>
                  </div>



                  <div class="row">
                    
                    <div class="col-sm-3">
                      <label for=""> Tipo de documento: </label>
                      <input class="form-control " disabled value="Orden de Venta" id="tipoDocumento" required >
                      
                    
                    </div>

                    <div class="col-sm-2">
                      <label for=""> Serie:</label>
                      <input type="text"  disabled value="OV-"  class="form-control"  disabled="" >
                    </div>


                    <div class="col-sm-2">
                      <label for=""> Número:</label>

                      <input type="text" value="@if($orden->id < 10)
                              {{"00000".$orden->id}}
                            @elseif($orden->id < 100){
                              {{"0000".$orden->id}}
                            @elseif($orden->id < 1000){
                              {{"000".$orden->id}}
                            @elseif($orden->id < 100000){
                              {{"0".$orden->id}}

                            @elseif($orden->id < 1000000){
                              {{$orden->id}}
                            @endif" disabled  class="form-control" id="numero" disabled="" >
                    </div>

                      <div class="col-sm-3">
                      <label for=""> Asesor </label>
                      
                        <input type="text" disabled value="@if($orden->asesor) {{$orden->asesor->nombre}} @else Ninguno @endif"  name="impuesto" id="asesorName"  class="form-control"  placeholder="">
                    </div>

                    <div class="col-sm-2">
                      <label for="">  Impuesto </label>
                        <input type="text"  disabled  id="impuesto"  class="form-control" value="{{$orden->impuesto}}" placeholder="">
                      
                    </div>
                  </div>


        <hr>


        <div class="row">
        	<div class="col-md-6">
        		<div class="table-responsive">
          <h4>Articulos:</h4>
        		<b>NOTA: los Articulos seran enviados al departamento Compras.</b>
        		<hr>
        <table class="table table-bordered table-striped2">

          <tr style="background: #A9D0F5; color: #000">
                     
                      <th>Articulo</th>
                      <th>Cantidad</th>
                      <th>Precio Venta</th>
                      <th>Descuento</th>
                      <th>Subtotal</th>
                    
          </tr>
          <tbody >
            <?php $sub=0;$iva=0;$descuento=0;?>
            @foreach($orden->cotizaciones as $c)
            
            @if($c->status >=2 && $c->articulo->tipoProducto == 1)
                          <tr @if($c->status == 3) class="table-success"  @elseif($c->status == 4) class="table-warning" @elseif($c->status == 5) class="table-danger" @endif>
                          
                            <td>{{$c->articulo->articulo}}</td>
                            <td>{{number_format($c->cantidad,2,',','.')}}</td>
                            <td>{{number_format($c->pvp,2,',','.')}}</td>
                            <td>{{$c->descuento}}% - {{number_format($des=($c->cantidad * $c->pvp * ($c->descuento /100)),2,',','.')}}</td>
                            <td>{{number_format($sum=($c->cantidad * $c->pvp),2,',','.')}}</td>
                                    
                          </tr>

            <?php 
            $sub+=$sum;
            $descuento+=$des;


            ?>
            @endif
            @endforeach
          </tbody>

          <tfoot>
            <tr>
             
                      <th><span>Subtotal</span><br>
                        <span>I.V.A <span id="iva-text"></span></span><br>
                        <span>Descuento</span><br>
                        <span>Total</span></th>
                      <th colspan="3"></th>
                     
                      <th>
                        $<span id="sub" >{{number_format($sub,2,',','.')}}</span><br>
                        $<span  id="iva">{{number_format($iva=($sub *($orden->impuesto /100)),2,',','.')}}</span><br>
                        $<span  id="descuento">{{number_format($descuento,2,',','.')}}</span><br>
                        $<span id="total">{{number_format(($sub+$iva)-$descuento,2,',','.')}}</span>
                      </th>
            </tr>
          </tfoot>
        </table>
        </div>
        	</div>
        	<div class="col-md-6">
        		<div class="table-responsive">
          
        		<h4>Servicios:</h4>
        		<b>NOTA: los Servicios seran enviados al departamento encargado.</b>
        		<hr>
        <table class="table table-bordered table-striped2">
      
        		
          <tr style="background: #A9D0F5; color: #000">
                     
                      <th>Servicio</th>
                      <th>Cantidad</th>
                      <th>Precio Venta</th>
                      <th>Descuento</th>
                      <th>Subtotal</th>
                    
          </tr>
          <tbody >
            <?php $sub=0;$iva=0;$descuento=0;?>
            @foreach($orden->cotizaciones as $c)
            
            @if($c->status >= 2 && $c->articulo->tipoProducto == 2)
                         <tr @if($c->status == 3) class="table-success"  @elseif($c->status == 4) class="table-warning" @elseif($c->status == 5) class="table-danger" @endif>
                           
                            <td>{{$c->articulo->articulo}}</td>
                            <td>{{number_format($c->cantidad,2,',','.')}}</td>
                            <td>{{number_format($c->pvp,2,',','.')}}</td>
                            <td>{{$c->descuento}}% - {{number_format($des=($c->cantidad * $c->pvp * ($c->descuento /100)),2,',','.')}}</td>
                            <td>{{number_format($sum=($c->cantidad * $c->pvp),2,',','.')}}</td>
                                    
                          </tr>

            <?php 
            $sub+=$sum;
            $descuento+=$des;


            ?>
            @endif
            @endforeach
          </tbody>

          <tfoot>
            <tr>
             
                      <th><span>Subtotal</span><br>
                        <span>I.V.A <span id="iva-text"></span></span><br>
                        <span>Descuento</span><br>
                        <span>Total</span></th>
                      <th colspan="3"></th>
                     
                      <th>
                        $<span id="sub" >{{number_format($sub,2,',','.')}}</span><br>
                        $<span  id="iva">{{number_format($iva=($sub *($orden->impuesto /100)),2,',','.')}}</span><br>
                        $<span  id="descuento">{{number_format($descuento,2,',','.')}}</span><br>
                        $<span id="total">{{number_format(($sub+$iva)-$descuento,2,',','.')}}</span>
                      </th>
            </tr>
          </tfoot>
        </table>
        </div>
        	</div>
        </div>
        
        <hr>

        <div class="row">
          
          <div class="col-md-3 well">
         <i class="mdi mdi-checkbox-blank-circle-outline mdi-24px "></i> Pendiente enviar cliente
          </div>

          <div class="col-md-3 well">
        <i class="mdi mdi-circle mdi-24px text-green"></i> Ingreso a Calibración
          </div>

          <div class="col-md-3 well">
         <i class="mdi mdi-circle mdi-24px text-orange"></i> Equipo Calibrado
          </div>

          <div class="col-md-3 well">
         <i class="mdi mdi-circle mdi-24px text-red"></i> Equípo Facturado
          </div>
        </div>  

          
        

                </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>

@endsection