<!-- Modal -->
<div class="modal fade" id="form_producto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="background: #fff">
      <div class="modal-header">
        <h4 class="modal-title center" id="myModalLabel"><i class="fa fa-pencil"></i> Agregar Producto</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">

       <form id="form-add-resumen">

 <input type="hidden" id="vt_id" name="producto_id"  required="">
		<div class="row">
			<div class="col-md-6">
  			  <div class="form-group">				
				 <label for="exampleInputEmail1">Categoria</label>
					 <input type="text" disabled style="background: #fff;" class="form-control" id="vt_categoria">
			  </div>				
			</div>
			<div class="col-md-6">
				<div class="form-group">
					 <label for="exampleInputPassword1">Producto</label>
					  <input type="text"  disabled style="background: #fff;" class="form-control" id="vt_producto" >
				 </div>
			</div>
		</div>


<div class="row">
	<div class="col-md-6">
		  <div class="form-group">
			   <label for="exampleInputPassword1">Presentacion</label>
			   <input type="text"  disabled style="background: #fff;" class="form-control" id="vt_presentacion" >
			</div>

	</div>
	<div class="col-md-6">
		
		<div class="form-group">
		    <label >Stock</label>
		     <input type="text" name="stock" required disabled style="background: #fff;" class="form-control" id="vt_stock" >
		 </div>

	</div>
</div>



<div class="row">
	<div class="col-md-6">
		  <div class="form-group">
			  <label >Pvp</label>
			   <input type="text" name="pvp" required disabled style="background: #fff;" class="form-control" id="vt_pvp" >
		  </div>
	</div>
	<div class="col-md-6">
		 <div class="form-group">
			<label >Cantidad</label>
			<input type="text" name="cantidad" required  class="form-control" id="vt_cantidad" placeholder="> 0">
		 </div>
	</div>
</div>
					
											 
											  <button type="submit" class="btn btn-success btn-block"> Agregar</button>
											</form>
       
      
        
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Cancelar</button>
     
   
        
      </div>
    </div>
  </div>
</div>