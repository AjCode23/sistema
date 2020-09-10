<!-- Modal -->
<div class="modal fade "  id="comprar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-large" role="document">
    <div class="modal-content " style="background: #fff;width: 100%">
      <div class="modal-header">
        <h4 class="modal-title center" id="myModalLabel"><i class="mdi mdi-cards"></i> Confirmar Compra</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">

	<div class="alert alert-success">
		Estas a punto de confirmar una compra... <p>Debes especificar el metodo de pago</p>
	</div>
      	<div id="van" style="background: #000; color: #5983e8; width: 100%; padding: 10px; font-size:2em; text-align: right;">
      		{{number_format($total, 2, ",", ".") }}

      	</div>
<hr>
      	<div class="form-horizontal">
										  <div class="form-group">
										    <label for="inputEmail3" class="col-sm-4 control-label">Medio de Pago</label>
										    <div class="col-sm-8">
										      <select  class="form-control" style='background: #FFF; border:0px;border-bottom: 1px solid #f0f0f0'   id="pago">
										      	<option value="">Seleccione medio de pago</option>
										      	<option value="1">Efectivo</option>
										      	<option value="2">Deposito Bancario</option>
										      </select>
										    </div>
										  </div>
	    </div>

      					
							   
        
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Cancelar</button>
        <button type="button" value="@if(count($carrito) > 0){{$carrito->id}}@endif" id="confirmar" class="btn btn-success btn-flat">Confirmar <i class="mdi mdi-cards"></i>	</button>

   
        
      </div>
    </div>
  </div>
</div>