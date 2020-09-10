
<div class="modal fade" id="edit_pro_compra" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="background: #fff">
      <div class="modal-header">
        <h4 class="modal-title center" id="myModalLabel"><i class="fa fa-plus"></i> EDITAR PRODUCTO DE LA COMPRA</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>

      <div class="modal-body">

        <div id="alpro_new" class="alert alert-danger" style="display: none;">
          
        </div>
       
       <form  action="{{url('compras/edit')}}" autocomplete="off" method="post">
       	{{ csrf_field()}}

       	<input type="hidden" name="id" id="detalle_id">
        <div class="row">
            <div class="col-md-12">
              
                    
                    <div class="form-group">
                      <label for="exampleInputEmail1">PRODUCTO</label>
                      <input type="text" class="form-control" disabled style="background: #fff;" required  id="producto" placeholder="">
                    </div>


                     <div class="form-group">
                      <label for="exampleInputEmail1">PRESENTACION</label>
                     <input type="text" class="form-control" disabled style="background: #fff;" required  id="presentacion" placeholder="">
                    </div>


                     <div class="form-group">
                      <label for="exampleInputEmail1">CANTIDAD</label>
                      <input type="text" class="form-control" onkeyup="validacion(this,'alpro_new',['numerico'])" required name="cantidad" id="cantidad" placeholder="">
                    </div>


                     <div class="form-group">
                      <label for="exampleInputEmail1">PRECIO COSTO</label>
                      <input type="text"  onkeyup="validacion(this,'alpro_new',['numerico'])" min=0 class="form-control" required name="costo" id="costo" placeholder="">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">PVP</label>
                      <input type="text" onkeyup="validacion(this,'alpro_new',['numerico'])" min=0 class="form-control" required name="pvp" id="pvp" placeholder="">
                    </div>
            </div>
      

      </div>



           
        
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Cancelar</button>
        <button type="submit"  class="btn btn-success btn-flat">Modificar</button>

   
        
      </div>

     </form>
    </div>
  </div>
</div>