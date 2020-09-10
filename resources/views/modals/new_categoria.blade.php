<!-- Modal -->
<div class="modal fade" id="new_categoria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="background: #fff">
      <div class="modal-header">
        <h4 class="modal-title center" id="myModalLabel"><i class="fa fa-plus"></i> REGISTRAR NUEVA CATEGORIA</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">

        <div id="msj" class="alert alert-danger" style="display: none;">
          
        </div>
       <form  id="form-new-categoria" autocomplete="off">
         
        <div class="row">
            <div class="col-md-12">
              
                  
                    <div class="form-group">
                      <label for="exampleInputEmail1">CATEGORIA</label>
                      <input type="text" class="form-control" value="" required  id="categoria_reg" placeholder="">
                    </div>


            </div>
         </div>
                   

           
        
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Cancelar</button>
        <button type="submit" id="reg_cat" class="btn btn-success btn-flat">Registrar</button>

       </form>
   
        
      </div>
    </div>
  </div>
</div>