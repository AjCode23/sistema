<!-- Modal -->
<div class="modal fade "  id="editComercio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content " style="background: #fff;width: 100%">
      <div class="modal-header">
        <h4 class="modal-title center" id="myModalLabel"><i class="mdi mdi-pencil"></i> EDITAR CONTACTO COMERCIAL</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
   <form action="" method="post" id="form-edit-comercio">
          {{csrf_field()}}
             <div class="row">
                      <div class="col-md-3">

                         <label for="">Contacto Comercial <b class="text-red">(*)</b></label>
                        <input class="form-control" type="text" name="nombreComercial" id="edit_nombreComercial"  placeholder="Nombre contacto comercial" required>
                      </div>
                      <div class="col-md-3">
                         <label for="">Correo Contacto <b class="text-red">(*)</b></label>
                        <input class="form-control" type="email" name="emailContacto" id="edit_emailContacto"  placeholder="Correo contacto" required>
                      </div>
                      <div class="col-md-3">
                         <label for="">Telefono Fijo <b class="text-red">(*)</b></label>
                        <input class="form-control" type="number" name="tlfOficina"  id="edit_tlfOficina" placeholder="Numero fijo" required>
                      </div>

                        <div class="col-md-3">
                         <label for="">Telefono Personal <b class="text-red">(*)</b></label>
                        <input class="form-control" type="number" name="tlfPersonal" id="edit_tlfPersonal"  placeholder="Numero personal" required>
                      </div>


                  
                     </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Cancelar</button>
        <button type="submit" id="btn_add" class="btn btn-success btn-flat">Añadir Telefono <i class="mdi mdi-phone"></i> </button>

    
   </form>
        
      </div>
    </div>
  </div>
</div>