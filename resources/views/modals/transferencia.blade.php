<!-- Modal -->
<div class="modal fade"  id="transferencia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog " role="document">
    <div class="modal-content" style="background: #fff">
      <div class="modal-header">
        <h4 class="modal-title center" id="myModalLabel"><i class="mdi mdi-receipt-circle"></i>Realizar Transferencia. <b id="num"></b> </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">

 <form action="{{url('pago/nuevo')}}" autocomplete="off" method="post">
                  {{ csrf_field() }}
                 

                  <div class="form-group">
                    <label >Seleccionar Banco</label>
                    <select required name="banco_id" id="select_banco" class="form-control">
                      <option value=""> Elegir Banco</option>
                     @foreach($bancos as $b)
                          
                          @if(strtolower($b->banco) != 'pesos')
                            <option value="{{$b->id}}">
                              {{ucwords($b->banco)}} |
                              {{$b->cta}} 

                            </option>
                          @endif
                          @endforeach
                   
                    </select>
                  </div>



                  


                   <div class="form-group">
                    <label >Monto a Depositar en Pesos:</label>
                    <input required name="monto"  id="monto" class="form-control"/>
                      
                  </div>


                  <div class="form-group">
                    <label >Seleccionar Tipo de Deposito</label>
                   <select name="select_deposito" class="form-control" id="select_deposito">
                     <option value="1">Pesos Externos</option>
                     <option value="2">Disponibles en el Sistema</option>
                   </select> 
                      
                  </div>

                  <span id="puntaje" >

                    <div class="form-group">
                    <label >Puntaje A Transferir</label>
                    <input required name="puntaje" onkeyup="validacion(this,'edit_msj',['numerico'])" type="text"  id="monto" class="form-control"/>
                      
                  </div>
                    
                  </span>
                  
     
    
      </div>
      <div class="modal-footer">
         <button type="submit"  class="btn btn-outline-primary"> <i class="mdi mdi-plus-circle-outline"></i>Registrar Deposito</button>
        <button type="button" on class="btn btn-default btn-flat" data-dismiss="modal">Salir</button>
      </form>

   
        
      </div>
    </div>
  </div>
</div>