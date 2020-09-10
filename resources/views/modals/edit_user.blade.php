<!-- Modal -->
<div class="modal fade"  id="edit_user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="background: #fff">
      <div class="modal-header">
        <h4 class="modal-title center" id="myModalLabel"><i class="mdi mdi-receipt-circle"></i>Gestion de Cliente. <b id="num"></b> </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">

 <form action="{{url('/users/editar')}}"  id="form-edit" method="POST"  enctype="multipart/form-data">
 	{{csrf_field()}}
 	<input type="hidden" name="id" id="id_editar">
<div class="row">
 	<div class="col-md-6">
 		
			    <div class="form-group ">
			      <label for="">Nombre(*):</label>
			
			      <input class="form-control" type="text" name="nombre" id="nombre" maxlength="100" placeholder="Nombre" required>
			    </div>
			    <div class="form-group ">
			      <label for="">Tipo Documento(*):</label>
			     <select name="tipo_documento" id="tipo_documento" class="form-control select-picker" required>
			       <option value="DNI">CEDULA EXTRANJERA</option>
			       <option value="RUC">RUC</option>
			       <option value="CEDULA">CEDULA</option>
			     </select>
			    </div>
			    <div class="form-group ">
			      <label for="">Numero de Documento(*):</label>
			      <input type="text" class="form-control" name="num_documento" id="num_documento" placeholder="Documento" maxlength="20">
			    </div>
			       <div class="form-group ">
			      <label for="">Direccion</label>
			      <input class="form-control" type="text" name="direccion" id="direccion"  maxlength="70">
			    </div>
			       <div class="form-group ">
			      <label for="">Telefono</label>
			      <input class="form-control" type="text" name="telefono" id="telefono" maxlength="20" placeholder="Número de telefono">
			    </div>


 	</div>


 	<div class="col-md-6">
			    <div class="form-group ">
			      <label for="">Email: </label>
			      <input class="form-control" type="email" name="email" id="email" maxlength="70" placeholder="email">
			    </div>
			    <div class="form-group ">
			      <label for="">Cargo</label>
			   <select name="" class="form-control" id="cargo">
			   	@foreach($cargos as $c)
			   	<option value="{{$c->id}}">{{ strtoupper($c->cargo)}}</option>

			   	@endforeach
			   </select>
			    </div>
			   
			   
			    <div class="form-group ">
			      <label>Permisos:</label>
			      <div id="permisos" style="display: none;">
			       
			      </div>
			    </div>
			        <div class="form-group ">
			      <label for="">Imagen:   <img src="" id="imgUser"  class="img" alt="User Image"></label>
			      <input class="form-control" type="file" name="file" id="imagen">
			     
			     
			    </div>
			  
	</div>
	
</div>

    
      </div>
      <div class="modal-footer">
         <button  onclick="reload()" class="btn btn-outline-primary"><i class="fa fa-save"></i>  Guardar</button>
        <button type="button" on class="btn btn-default btn-flat" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
      

  </form>
   
        
      </div>
    </div>
  </div>
</div>