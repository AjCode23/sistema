<!-- Modal -->
<div class="modal fade "  id="addTlf" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content " style="background: #fff;width: 100%">
      <div class="modal-header">
        <h4 class="modal-title center" id="myModalLabel"><i class="mdi mdi-plus-circle"></i> AÑADIR TELEFONO</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
   <form action="{{url('clientes/add/telefonos',$cliente->id)}}" method="post">
      		{{csrf_field()}}
      		<div class="row">
      			<div class="col-md-5">
      				<label for="">Tipo Telefono <b class="text-red">(*)</b></label>
		                     <select class="form-control select-picker" name="tipo_tlf[]" id="tipo_tlf" required>
		                       <option value="">SELECIONE TIPO DE TELEFONO</option>
		                       <option value="1">TELEFONO PRINCIPAL</option>
		                       <option value="2">TELEFONO SECUNDARIO</option>
		                       <option value="3">TELEFONO MOVIL</option>
		                       
		                     </select>
      			</div>


      			<div class="col-md-5">
      			<label for="">Numero de Telefono <b class="text-red">(*)</b></label>
                        <input class="form-control" type="number" name="numero[]"   placeholder="Numero Telefonico" required>
      			</div>

      			<div class="col-md-2">
      				<label for=""><br>&nbsp; <br></label>
                     		<button type="button" id="btn_telefono_plus" class="btn btn-warning mt-8" onclick='tlf(this)' style="margin-top: 20px;"><i class="fa fa-plus"></i></button>

                     		<button type="button" class="btn btn-default mt-8" onclick='notlf()' style="margin-top: 20px;"><i class="fa fa-trash"></i></button>
      			</div>


      		</div>


      		<div id="masTlf"></div>
							
							   	
        <input type="hidden" id="contadorTlf" value="0">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Cancelar</button>
        <button type="submit" id="btn_add" class="btn btn-success btn-flat">Añadir Telefono <i class="mdi mdi-phone"></i>	</button>

   	
   </form>
        
      </div>
    </div>
  </div>
</div>