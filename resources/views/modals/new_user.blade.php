<!-- Modal -->
<div class="modal fade  bs-example-modal-lg" id="new_user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog  modal-" role="document">
    <div class="modal-content" style="background: #fff">
      <div class="modal-header">
        <h4 class="modal-title center" id="myModalLabel"><i class="fa fa-plus"></i> REGISTRAR NUEVO USUARIO</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>

      <div class="modal-body">

        <div id="msj" class="alert alert-danger" style="display: none;">
          
        </div>
       
       {!!Form::open(['route'=>'users.store','method'=>'post','autocomplete'=>'off'])!!}
       	<table class="table">
       		<tr class="text-center">
       			<th > Datos Personales</th>
       		</tr>
       		<tr>
       			<td>


                    <div class="form-group">
                      <label for="exampleInputEmail1">CEDULA</label>
                      <input type="text" class="form-control" value="" required name="cedula" placeholder="">
                    </div>


                     <div class="form-group">
                      <label for="exampleInputEmail1">NOMBRES</label>
                      <input  type="text" class="form-control" required name="nombres" placeholder="">
                    </div>


                     <div class="form-group">
                      <label for="exampleInputEmail1">APELLIDOS</label>
                      <input type="numeric" min="0" class="form-control" required name="apellidos"  placeholder="">
                    </div>


                     <div class="form-group">
                      <label for="exampleInputEmail1">GENERO</label>
                      <select type="text"  onchange="formato(this)" min=0 class="form-control" required name="genero" placeholder="">
                      	<option value="">Seleccione</option>
                      	<option value="M">Masculino</option>
                      	<option value="F">Femenino</option>
                      </select>
                    </div>

                    

                     <div class="form-group">
                      <label for="exampleInputEmail1">EMAIL</label>
                      <input type="email" onkeyup="formato(this)" onchange="formato(this)" min=0 class="form-control" required name="email"  placeholder="">
                    </div>
       				
       			</td>
       			
       		</tr>


       		<tr class="text-center">
       			<th > Datos del Usuario</th>
       		</tr>

       		<tr>
       			<td>

                     <div class="form-group">
                      <label for="exampleInputEmail1">NIVEL DE USUARIO</label>
                      <select type="text"  onchange="formato(this)" min=0 class="form-control" required name="nivel"  placeholder="">
                      	<option value="">Seleccione</option>
                        <option value="1">Administrador</option>
                        <option value="2">Usuario</option>
                      	
                      </select>
                    </div>


                    
       				
       			</td>
       			
       		</tr>


       	</table>
       
                    
        
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Cancelar</button>
        <button type="submit"  class="btn btn-success btn-flat">Registrar</button>

   
        
      </div>

     {!!Form::close()!!}
    </div>
  </div>
</div>