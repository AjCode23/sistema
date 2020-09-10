<!-- Modal -->
<div class="modal fade" id="opc_venta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="background: #fff">
      <div class="modal-header">
        <h4 class="modal-title center" id="myModalLabel"><i class="fa fa-question"></i> OPCIONES VENTA</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">

      

        <select  id="select_opciones" class="form-control" >
            <option value="">Seleccione Opcion</option>
            <option value="1">Ver Abonos</option>
            <option value="2">Abonar</option>
            <!--<option value="3">Diferencia de Precios</option>-->
            <option value="4">Cancelar Compra</option>
        </select>
     
<hr>

     <div style="display:none" id="ver_abonos">

     	<table class="table">
     		<tr>
     			<th>#</th>
                <th>ABONO</th>
     			<th>FECHA</th>
                <th>STATUS</th>
     			<th></th>
     		</tr>
     		<tbody id="body-abonos">
     			<tr> 
     				<th colspan="3"> Sin Abonos</th></tr>
     		</tbody>
     	</table>
     	
     </div>


     <div style="display:none" id="new_abono">

            
            <input type="hidden" id="cliente_id_opc"  >
        <form action="#" id="form-abono" autocomplete="off" >
            <input type="hidden" id="venta_id" name="venta_id" >
            <div class="form-group">
                <label for="">Banco</label>
                <select name="banco_id" required class="form-control" id="banco_id">
                      <option value="">Seleccionar Banco</option>
                      @foreach($bancos as $b)

                          <option value="{{$b->id}}"> {{ucwords($b->banco)}} | {{$b->cta}}</option>

                      @endforeach
                </select>
             </div>



               <div class="form-group">
                <label for=""> Resta:</label>
                <input type="text" disabled name="resta"  class="form-control" style="background: #fff;" id="resta_input" >

            
            </div>




            <div class="form-group">
                <label for=""> Nuevo Abono</label>
                <input type="text" name="abono" onkeyup="validacion(this,'msj-alert',['numerico'])"  class="form-control" id="abono" required>

            </div>

                <button type="submit" class="btn btn-success"> Registrar Abono</button>

        </form>
        

     </div>


      <div style="display:none" id="new_pagado">
        <div class="alert alert-success"> No Tienes Abonos por Realizar, venta Fue pagada en su totalidad</div>

     </div>



      <div style="display:none" id="diferencia">

            
 
        <form action="#" id="form-diferencia" autocomplete="off" >
            <div class="form-group">
                <label for=""> Producto:</label>
                <select  id="select_pro_opc" name="producto_id" class="form-control" >
                    <option value="">Seleccione Producto</option>
                   
                </select>

            </div>
            
            <div class="form-group">
                <label for=""> Cajas | bulto:</label>
                <input type="text" onkeyup="validacion(this,'msj-alert',['numerico'])"   class="form-control" name="cantidad" id="cantidad" >         
             </div>




            <div class="form-group">
                <label for=""> Monto:</label>
                <input type="text" name="monto" onkeyup="validacion(this,'msj-alert',['numerico'])"  class="form-control" id="abono" required>

            </div>

                <button type="submit" class="btn btn-success"> Agregar Diferencia</button>

        </form>
        

     </div>



         
       
                   

           
        
        
      </div>
      
    </div>
  </div>
</div>