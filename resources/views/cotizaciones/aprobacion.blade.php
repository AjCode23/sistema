@extends('layouts.app')

@section('name','..|Aprobar Cotizacion|..')

@section('ol')
 <a style="color: #e68618;" href="{{url('home')}}" class="link" title=""><i class="mdi mdi-home"></i> Home
</a>
/
 <a class="link" title=""><i class="mdi mdi-account-location"></i> Aprobación</a>
@endsection

@section('css')

@endsection

@section('js')

<script>
 

 Swal.fire({
  title: 'Confirme?',
  text: "¿Aprueba usted este documento como valido para continuar con el proceso?",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, Apruebo!'
}).then((result) => {
  if (result.value) {
    Swal.fire(
      'Aceptado!',
      'Puede continuar con la aprobacion de la cotizacion!',
      'success'
    )
    $('#section-body').show();
  }else{
    document.location="{{url('cliente/cotizaciones')}}";
  }
})




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

 if(doc.lenght == 0){
   Swal.fire(
        'Información!',
      'Debes incluir los Documentos de Respaldos',
      'warning'
      );
 }else if(o == 1){
    $('#condiciones').modal();
  }else if(o == 2){
    Swal.fire({
              title: 'Confirme!',
              text: "La Cotizacion tiene observaciones, el personal de la empresa debera incluir las observaciones hechas por usted, ¿Desea Confirmar?",
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

  }else{
    Swal.fire(
        'Información!',
      'Debes indicar que tipo de Aprobacion debes hacer',
      'warning'
      );
$('#observacion').focus();
  }
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
          <section class="col-lg-12 connectedSortable" id="section-body" style="display: none">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="mdi mdi-check mr-1"></i>
                  Aprobar Cotizaciones
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                   
                    
                       <li class="nav-item">
                      <a class="nav-link btn-danger active" href="{{url('/cliente/cotizaciones')}}"  style="color: #fff !important;"><i class="mdi mdi-reply"></i> Regresar</a>
                    </li>
                  
                  </ul>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">

                 
                  @include('alerts')
                  
           <form action="{{url('cotizacion/aprobar')}}" id="formulario-aprobar" method="post" enctype="multipart/form-data">
              {{csrf_field()}}
              <input type="hidden" name="id" value="{{$o->id}}">
    <div class="row">
                    
                    <div class="col-sm-4">
                      <label for="">Cliente </label>
                        <input type="text" value="{{$o->cotizacion->cliente->nombres}}"  disabled class="form-control" id="cliente">
                    </div>

                    <div class="col-sm-4">
                      <label for=""> Condicion de Pago </label>
                        <input type="text" value="{{$o->condicion->condicion}}"  disabled class="form-control" id="condicion">
                     
                    </div>

                    <div class="col-sm-4">
                      <label for="">Fecha </label>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                        </div>
                        <input type="date" value="{{$o->fecha->format('Y-m-d')}}" class="form-control" disabled id="fecha">
                      </div>
                    </div>
                  </div>



                  <div class="row">
                    
                    <div class="col-sm-3">
                      <label for=""> Tipo de documento: </label>
                      <input class="form-control " disabled value="Cotizacion" id="tipoDocumento" required >
                      
                    
                    </div>

                    <div class="col-sm-2">
                      <label for=""> Serie:</label>
                      <input type="text"  disabled value="COT-"  class="form-control"  disabled="" >
                    </div>


                    <div class="col-sm-2">
                      <label for=""> Número:</label>

                      <input type="text" value="@if($o->id < 10)
                              {{"00000".$o->id}}
                            @elseif($o->id < 100){
                              {{"0000".$o->id}}
                            @elseif($o->id < 1000){
                              {{"000".$o->id}}
                            @elseif($o->id < 100000){
                              {{"0".$o->id}}

                            @elseif($o->id < 1000000){
                              {{$o->id}}
                            @endif" disabled  class="form-control" id="numero" disabled="" >
                    </div>

                      <div class="col-sm-3">
                      <label for=""> Asesor </label>
                      
                        <input type="text" disabled value="@if($o->asesor) {{$o->asesor->nombre}} @else Ninguno @endif"  name="impuesto" id="asesorName"  class="form-control"  placeholder="">
                    </div>

                    <div class="col-sm-2">
                      <label for="">  Impuesto </label>
                        <input type="text"  disabled  id="impuesto"  class="form-control" value="{{$o->impuesto}}" placeholder="">
                      
                    </div>
                  </div>


        <hr>
        <div class="table-responsive">
          
        <table class="table table-bordered table-striped">

          <tr style="background: #A9D0F5; color: #000">
                      <th style="width: 120px; text-align: center;">Aprobar </th>
                      <th style="width: 50px; text-align: center;"> <input type="checkbox" id="aprobarTodos" title="Aprobar Todos" value="{{$o->cotizaciones}}" onchange="aprobarAll({{$o->cotizaciones}})"></th>
                      <th>Articulo</th>
                      <th>Cantidad</th>
                      <th>Precio Venta</th>
                      <th>Descuento</th>
                      <th>Subtotal</th>
                    
          </tr>
          <tbody >
            <?php $sub=0;$iva=0;$descuento=0;?>
            @foreach($o->cotizaciones as $c)
            
            @if($c->status==2)
                         <tr >
                            <td colspan="2" style="text-align: center;"><input name="aprobar_{{$c->id}}"       id="aprobar_{{$c->id}}" onchange="checkActivate(this)"  type="checkbox"></td>
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
                      <th colspan="5"></th>
                     
                      <th>
                        $<span id="sub" >{{number_format($sub,2,',','.')}}</span><br>
                        $<span  id="iva">{{number_format($iva=($sub *($o->impuesto /100)),2,',','.')}}</span><br>
                        $<span  id="descuento">{{number_format($descuento,2,',','.')}}</span><br>
                        $<span id="total">{{number_format(($sub+$iva)-$descuento,2,',','.')}}</span>
                      </th>
            </tr>
          </tfoot>
        </table>
        </div>
        <hr>

        <div class="row">
          <div class="col-md-4">
            <label for=""> Documentos de Respaldo</label>
            <input type="file" id="documentos" class="form-control" required name="file[]" multiple>
          </div>

          <div class="col-md-3">
          <label for="">Tipo de Observacion</label>
          <select name="observacion" class="form-control" required id="observacion">
            <option value="">Seleccione Observacion</option>
            <option value="1">Sin Observación</option>
            <option value="2">La Cotizacion tiene Observaciones</option>
          </select>
          </div>


          <div class="col-md-3">
          <label for="">Comentario de la Observacion</label>
           <textarea name="comentario" class="form-control" placeholder="Anadir Comentario"></textarea>
          </div>

          <div class="col-md-2">
          <label for="">&nbsp;</label>
            <button type="button" onclick="guardar('formulario-aprobar');" class="btn btn-success">Guardar</button>
          </div>
        </div>  

           </form>        
        

                </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>

@endsection