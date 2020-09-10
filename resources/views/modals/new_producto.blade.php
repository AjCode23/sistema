<!-- Modal -->
<div class="modal fade" id="new_producto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="background: #fff">
      <div class="modal-header">
        <h4 class="modal-title center" id="myModalLabel"><i class="fa fa-plus"></i> REGISTRAR NUEVO PRODUCTO</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>

      <div class="modal-body">

        <div id="alpro_new" class="alert alert-danger" style="display: none;">
          
        </div>
       
       <form id="form_new_pro" action="#" autocomplete="off">
        <div class="row">
            <div class="col-md-12">
              
                    <div class="form-group">
                      <label for="exampleInputEmail1">CATEGORIA</label>
                      <select type="text" class="form-control" value="" required name="categoria_id" id="categoria_id" placeholder="">
                        <option value="">Seleccione Categoria</option>
                        @foreach($categorias as $cat)
                        <option value="{{$cat->id}}">{{$cat->categoria}}</option>
      

                        @endforeach
                        
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">PRODUCTO</label>
                      <input type="text" class="form-control" value="" required name="producto" id="producto" placeholder="">
                    </div>


                     <div class="form-group">
                      <label for="exampleInputEmail1">PRESENTACION</label>
                     <input type="text" class="form-control" value="" required name="presentacion" id="presentacion" placeholder="">
                    </div>


                     <div class="form-group">
                      <label for="exampleInputEmail1">STOCK</label>
                      <input type="text" class="form-control" onkeyup="validacion(this,'alpro_new',['numerico'])" required name="stock" id="stock" placeholder="">
                    </div>

                     <div class="form-group" >
                      <label for="exampleInputEmail1">EXCENTO</label>
                      <select name="excento" id="excento" class="form-control">
                        <option value="0">No</option>
                        <option value="1">si</option>
                      </select>
                      
                    </div>

                    <div class="form-group"  >
                      <label for="exampleInputEmail1">UNIDAD DE MEDIDA</label>
                      <select name="um" id="um" class="form-control">
                        <option >CAJ</option>
                        <option >BTO</option>
                      </select>
                    </div>


                     <div class="form-group">
                      <label for="exampleInputEmail1">PRECIO COSTO</label>
                      <input type="text"  onkeyup="validacion(this,'alpro_new',['numerico'])" min=0 class="form-control" required name="costo" id="costo" placeholder="">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">PVP</label>
                      <input type="text" onkeyup="validacion(this,'alpro_new',['numerico'])" onchange="validacion(this,'alpro_new',['numerico'])" min=0 class="form-control" required name="pvp" id="pvp" placeholder="">
                    </div>
            </div>
      

      </div>



           
        
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Cancelar</button>
        <button type="submit"  class="btn btn-success btn-flat">Registrar</button>

   
        
      </div>

     </form>
    </div>
  </div>
</div>