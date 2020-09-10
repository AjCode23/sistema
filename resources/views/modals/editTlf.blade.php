<!-- Modal -->
<div class="modal fade "  id="editTlf" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content " style="background: #fff;width: 100%">
      <div class="modal-header">
        <h4 class="modal-title center" id="myModalLabel"><i class="mdi mdi-pencil"></i> EDITAR TELEFONO</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
   <form action="" id="form-edit-tlf" method="post">
          {{csrf_field()}}
          <div class="row">
            <div class="col-md-6">
              <label for="">Tipo Telefono <b class="text-red">(*)</b></label>
                         <select class="form-control select-picker" name="tipoTlf" id="edit_tipo_tlf" required>
                           <option value="">SELECIONE TIPO DE TELEFONO</option>
                           <option value="1">TELEFONO PRINCIPAL</option>
                           <option value="2">TELEFONO SECUNDARIO</option>
                           <option value="3">TELEFONO MOVIL</option>
                           
                         </select>
            </div>


            <div class="col-md-6">
            <label for="">Numero de Telefono <b class="text-red">(*)</b></label>
                        <input class="form-control" type="number" name="numero" id="edit_numero"  placeholder="Numero Telefonico" required>
            </div>


          </div>


          <div id="masTlf"></div>
              
                  
        <input type="hidden" id="contadorTlf" value="0">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Cancelar</button>
        <button type="submit" id="btn_add" class="btn btn-success btn-flat">Editar Telefono <i class="mdi mdi-phone"></i> </button>

    
   </form>
        
      </div>
    </div>
  </div>
</div>