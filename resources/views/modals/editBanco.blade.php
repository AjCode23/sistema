<!-- Modal -->
<div class="modal fade" id="editBanco" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="background: #fff">
      <div class="modal-header">
        <h4 class="modal-title center" id="myModalLabel"><i class="mdi mdi-pencil"></i> EDITAR DATOS BANCARIOS</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <form action="" method="post" id="form-edit-banco">
          {{csrf_field()}}
       <div class="modal-body">
       <div class="row">
                      <div class="col-md-4">
                        <label for="">Tipo Telefono <b class="text-red">(*)</b></label>
                         <select class="form-control select-picker" name="tipo_cuenta" id="edit_tipo_cuenta" required>
                           <option value="">SELECIONE TIPO DE CUENTA</option>
                           <option value="1">AHORROS</option>
                           <option value="2">CORRIENTE</option>
                           
                         </select>
                      </div>
                      <div class="col-md-4">
                         <label for="">Numero de Cuenta <b class="text-red">(*)</b></label>
                        <input class="form-control" type="number" id="edit_cuenta" name="cuenta"   placeholder="Numero de Cuenta" required>
                      </div>

                      <div class="col-md-4">
                         <label for="">BANCO <b class="text-red">(*)</b></label>
                        <select class="form-control select-picker" name="banco" id="edit_banco" required>
                           <option value="">SELECIONE BANCO</option>
                           <option >BANCO DE BOGOTA</option>
                           <option >BANCO POPULAR</option>
                           <option >BANCOLOMBIA</option>
                           <option >OCCIDENTE</option>
                           <option >BANCO CAJA SOCIAL</option>
                           <option >DAVIVIENDA</option>
                           <option >BANCO W S.A</option>
                           <option >BANCOOMEVA</option>
                           <option >BANCO FINANDINA</option>
                           <option >COOPCENTRAL</option>
                           <option >BANCO MUNDO MUJER S.A</option>
                           <option >BANCO COMPARTIR S.A</option>
                           <option >BANCO SERFINANZA S.A</option>
                           
                           
                         </select>
                      </div>

                    
                  
                     </div>
                     
           
        
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Cancelar</button>
        <button type="submit"  class="btn btn-success btn-flat">Modificar</button>

              </form>
   
        
      </div>
    </div>
  </div>
</div>