<!-- Modal -->
<div class="modal fade" id="add_inspeccion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog  modal-xl" role="document">
    <div class="modal-content" style="background: #fff">
      <div class="modal-header">
        <h4 class="modal-title center" id="myModalLabel"><i class="mdi mdi-receipt-circle"></i>FORMATO DE INSPECCION INICIAL DE EQUIPOS <b id="num"></b> </h4>
        <button type="button" onclick="mostrar();" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
      	<form id="form-insp" method="post">
      		{{csrf_field()}}

          <table class="table table-bordered">
          	<tr>
          		<td rowspan="2" style="width: 300px">
          			<img src="{{asset('img/logo.jpeg')}}" style="width: 300px" alt="">
          		</td>
          		<th>Código:</th>
          		<th>Versión:</th>
          		<th>Aprobación</th>
          		<th>Página</th>
          	</tr>
          	<tr>
          		<td>R-IE-005</td>
          		<td>1</td>
          		<td>2020-09-02</td>
          		<td>1 de 1</td>
          	</tr>
          	
          </table>         
          <table class="table ">
          	<tr>
          		
          		<td><b>CLIENTE:</b> &nbsp;<span id="cliente_id"></span> </td>
          		<td><b>EQUIPO:</b>&nbsp; <span id="equipo"></span></td>
          		<td><b>MARCA:</b> &nbsp;<span id="marca"></span></td>
          		<td><b>SERIE:</b>&nbsp;<span id="serie"></span> </td>
          	</tr>
          </table>
          <table class="table table-bordered table-hover">
          		<tr style="background: #f0f0f0;" class="text-center">
          			<th>FACTOR</th>
          			<th>REVISION</th>
          			<th>OBSERVACIONES</th>
          		</tr>


          		<tr>
          			<th>Se recibe con accesorios</th>
          			<th><select name="opcion[]" required class="form-control" id="">
          				<option value=""></option>
          				<option >SI</option>
          				<option >No</option>
          			</select></th>
          			<th><input type="text" name="observacion[]" class="form-control"></th>
          		</tr>


          		<tr >
          			<th>Se entrega con accesorios</th>
          			<th><select name="opcion[]" required class="form-control" id="">
          				<option value=""></option>
          				<option >SI</option>
          				<option >NO</option>
          			</select></th>
          			<th><input type="text" name="observacion[]" class="form-control"></th>
          		</tr>

          		<tr  style="background: #f0f0f0;">
          			<th colspan="3">Estado de:</th>
          			
          		</tr>

          		<tr >
          			<th>Carcasa</th>
          			<th><select name="opcion[]" required class="form-control" id="">
          				<option value=""></option>
          				<option >OK</option>
          				<option >ROTO</option>
          			</select></th>
          			<th><input type="text" name="observacion[]" class="form-control"></th>
          		</tr>

          		<tr >
          			<th>Pintura</th>
          			<th><select name="opcion[]" required class="form-control" id="">
          				<option value=""></option>
          				<option >OK</option>
          				<option >DESCARGADA</option>
          			</select></th>
          			<th><input type="text" name="observacion[]" class="form-control"></th>
          		</tr>


          		<tr >
          			<th>Botoneria</th>
          			<th><select name="opcion[]" required class="form-control" id="">
          				<option value=""></option>
          				<option >OK</option>
          				<option >INCOMPLETA</option>
          			</select></th>
          			<th><input type="text" name="observacion[]" class="form-control"></th>
          		</tr>

          		<tr >
          			<th>Tornilleria</th>
          			<th><select name="opcion[]" required class="form-control" id="">
          				<option value=""></option>
          				<option >OK</option>
          				<option >INCOMPLETA</option>
          			</select></th>
          			<th><input type="text" name="observacion[]" class="form-control"></th>
          		</tr>

          		<tr >
          			<th>Conectores INPUT/OUTPUT</th>
          			<th><select name="opcion[]" required class="form-control" id="">
          				<option value=""></option>
          				<option >OK</option>
          				<option >ROTO</option>
          				<option >N/A</option>
          			</select></th>
          			<th><input type="text" name="observacion[]" class="form-control"></th>
          		</tr>

          		<tr >
          			<th>El Equipo enciende-apaga</th>
          			<th><select name="opcion[]" required class="form-control" id="">
          				<option value=""></option>
          				<option >SI</option>
          				<option >NO</option>
          				<option >N/A</option>
          			</select></th>
          			<th><input type="text" name="observacion[]" class="form-control"></th>
          		</tr>

          		<tr >
          			<th>Equipo refleja información en Pantalla</th>
          			<th><select name="opcion[]" required class="form-control" id="">
          				<option value=""></option>
          				<option >SI</option>
          				<option >NO</option>
          				<option >BORROSA</option>
          			</select></th>
          			<th><input type="text" name="observacion[]" class="form-control"></th>
          		</tr>

          		<tr >
          			<th>Estado de la Bateria</th>
          			<th><select name="opcion[]" required class="form-control" id="">
          				<option value=""></option>
          				<option >OK</option>
          				<option >NA</option>
          				<option >DESCARGADA</option>
          				<option >NT</option>
          			</select></th>
          			<th><input type="text" name="observacion[]" class="form-control"></th>
          		</tr>

          		<tr >
          			<th>Estado del Display</th>
          			<th><select name="opcion[]" required class="form-control" id="">
          				<option value=""></option>
          				<option >SI</option>
          				<option >ROTO</option>
          				<option >N/A</option>
          			</select></th>
          			<th><input type="text" name="observacion[]" class="form-control"></th>
          		</tr>

          		<tr >
          			<th>Desinfección y Limpieza</th>
          			<th><select name="opcion[]" required class="form-control" id="">
          				<option value=""></option>
          				<option >OK</option>
          				<option >OBSERVACIONES</option>
          				
          			</select></th>
          			<th><input type="text" name="observacion[]" class="form-control"></th>
          		</tr>

				<tr >
          			<th>Sello Calibración</th>
          			<th><select name="opcion[]" required class="form-control" id="">
          				<option value=""></option>
          				<option >SYG</option>
          				<option >OTROS</option>
          				<option >NT</option>
          				<option >NUEVO</option>
          			</select></th>
          			<th><input type="text" name="observacion[]" class="form-control"></th>
          		</tr>


          		<tr >
          			<th>Estado de sello de mantenimiento Garantía</th>
          			<th><select name="opcion[]" required class="form-control" id="">
          				
          				<option value=""></option>
          				<option >OK</option>
          				<option >ROTO</option>
          				<option >NT</option>
          				<option >N/A</option>
          			</select></th>
          			<th><input type="text" name="observacion[]" class="form-control"></th>
          		</tr>
                      <tr  style="background: #f0f0f0;">
                         <th colspan="3">Observaciones en General:</th>
                         
                    </tr>
                    

                    <tr>
                    
                         <td colspan="3"><textarea name="observaciones"  class="form-control"  ></textarea></td>
                    </tr>
          </table>
      
      </div>
      <div class="modal-footer">
        <button type="submit"   class="btn btn-outline-success btn-flat" >Guardar</button>
        <button type="button" on class="btn btn-default btn-flat" onclick="mostrar()" data-dismiss="modal">Cancelar</button>
        

      	</form>
   
        
      </div>
    </div>
  </div>
</div>