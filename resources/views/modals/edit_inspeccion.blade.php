<!-- Modal -->
<div class="modal fade" id="edit_inspeccion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog  modal-xl" role="document">
    <div class="modal-content" style="background: #fff">
      <div class="modal-header">
        <h4 class="modal-title center" id="myModalLabel"><i class="mdi mdi-receipt-circle"></i>EDITAR INSPECCION  <b id="num"></b> </h4>
        <button type="button" onclick="mostrar();" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
      	<form id="form-edit-insp" method="post">
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
          		
          		<td><b>CLIENTE:</b> &nbsp;<span id="clt_edit"></span> </td>
          		<td><b>EQUIPO:</b>&nbsp; <span id="equi_edit"></span></td>
          		<td><b>MARCA:</b> &nbsp;<span id="mar_edit"></span></td>
          		<td><b>SERIE:</b>&nbsp;<span id="ser_edit"></span> </td>
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
          			<th><select name="opcion[]" id="eopcion_1"  required class="form-control" id="">
          				
          				<option >SI</option>
          				<option >No</option>
          			</select></th>
          			<th><input type="text" name="observacion[]"  id="eobservacion_1" class="form-control"></th>
          		</tr>


          		<tr >
          			<th>Se entrega con accesorios</th>
          			<th><select name="opcion[]" id="eopcion_2"  required class="form-control" id="">
          				<option>SI</option>
          				<option >NO</option>
          			</select></th>
          			<th><input type="text" name="observacion[]" id="eobservacion_2" class="form-control"></th>
          		</tr>

          		<tr  style="background: #f0f0f0;">
          			<th colspan="3">Estado de:</th>
          			
          		</tr>

          		<tr >
          			<th>Carcasa</th>
          			<th><select name="opcion[]" id="eopcion_3"  required class="form-control" id="">
          				
          				<option>OK</option>
          				<option>ROTO</option>
          			</select></th>
          			<th><input type="text" name="observacion[]" id="eobservacion_3"  class="form-control"></th>
          		</tr>

          		<tr >
          			<th>Pintura</th>
          			<th><select name="opcion[]" id="eopcion_4"  required class="form-control" id="">
          				
          				<option>OK</option>
          				<option>DESCARGADA</option>
          			</select></th>
          			<th><input type="text" name="observacion[]" id="eobservacion_4"  class="form-control"></th>
          		</tr>


          		<tr >
          			<th>Botoneria</th>
          			<th><select name="opcion[]" id="eopcion_5" required class="form-control" id="">
          				
          				<option>OK</option>
          				<option>INCOMPLETA</option>
          			</select></th>
          			<th><input type="text" name="observacion[]" id="eobservacion_5"  class="form-control"></th>
          		</tr>

          		<tr >
          			<th>Tornilleria</th>
          			<th><select name="opcion[]" id="eopcion_6" required class="form-control" id="">
          				
          				<option>OK</option>
          				<option>INCOMPLETA</option>
          			</select></th>
          			<th><input type="text" name="observacion[]" id="eobservacion_6"  class="form-control"></th>
          		</tr>

          		<tr >
          			<th>Conectores INPUT/OUTPUT</th>
          			<th><select name="opcion[]" id="eopcion_7" required class="form-control" id="">
          				
          				<option>OK</option>
          				<option>ROTO</option>
          				<option>N/A</option>
          			</select></th>
          			<th><input type="text" name="observacion[]" id="eobservacion_7"  class="form-control"></th>
          		</tr>

          		<tr >
          			<th>El Equipo enciende-apaga</th>
          			<th><select name="opcion[]" id="eopcion_8" required class="form-control" id="">
          				
          				<option>SI</option>
          				<option>NO</option>
          				<option>N/A</option>
          			</select></th>
          			<th><input type="text" name="observacion[]" id="eobservacion_8"  class="form-control"></th>
          		</tr>

          		<tr >
          			<th>Equipo refleja información en Pantalla</th>
          			<th><select name="opcion[]" id="eopcion_9" required class="form-control" id="">
          				
          				<option>SI</option>
          				<option>NO</option>
          				<option>BORROSA</option>
          			</select></th>
          			<th><input type="text" name="observacion[]" id="eobservacion_9"  class="form-control"></th>
          		</tr>

          		<tr >
          			<th>Estado de la Bateria</th>
          			<th><select name="opcion[]" id="eopcion_10" required class="form-control" id="">
          				
          				<option>OK</option>
          				<option>NA</option>
          				<option>DESCARGADA</option>
          				<option>NT</option>
          			</select></th>
          			<th><input type="text" name="observacion[]" id="eobservacion_10"  class="form-control"></th>
          		</tr>

          		<tr >
          			<th>Estado del Display</th>
          			<th><select name="opcion[]" id="eopcion_11" required class="form-control" id="">
          				
          				<option>SI</option>
          				<option>ROTO</option>
          				<option>N/A</option>
          			</select></th>
          			<th><input type="text" name="observacion[]" id="eobservacion_11"  class="form-control"></th>
          		</tr>

          		<tr >
          			<th>Desinfección y Limpieza</th>
          			<th><select name="opcion[]" id="eopcion_12" required class="form-control" id="">
          				
          				<option>OK</option>
          				<option>OBSERVACIONES</option>
          				
          			</select></th>
          			<th><input type="text" name="observacion[]" id="eobservacion_12"  class="form-control"></th>
          		</tr>

				<tr >
          			<th>Sello Calibración</th>
          			<th><select name="opcion[]" id="eopcion_13" required class="form-control" id="">
          				
          				<option>SYG</option>
          				<option>OTROS</option>
          				<option>NT</option>
          				<option>NUEVO</option>
          			</select></th>
          			<th><input type="text" name="observacion[]" id="eobservacion_13"  class="form-control"></th>
          		</tr>


          		<tr >
          			<th>Estado de sello de mantenimiento Garantía</th>
          			<th><select name="opcion[]" id="eopcion_14" required class="form-control" id="">
          				
          				
          				<option>OK</option>
          				<option>ROTO</option>
          				<option>NT</option>
          				<option>N/A</option>
          			</select></th>
          			<th><input type="text" name="observacion[]" id="eobservacion_14"  class="form-control"></th>
          		</tr>
                    <tr  style="background: #f0f0f0;">
          			<th colspan="3">Observaciones en General:</th>
          			
          		</tr>
          		

          		<tr>
          		
          			<td colspan="3"><textarea name="observaciones"  class="form-control" id="observaciones_edit" ></textarea></td>
          		</tr>
          </table>

      
      </div>
      <div class="modal-footer">
        <button type="submit"   class="btn btn-outline-success btn-flat" >Modificar</button>
        <button type="button" on class="btn btn-default btn-flat" onclick="mostrar()"  data-dismiss="modal" aria-label="Close">Cancelar</button>
        

      	</form>
   
        
      </div>
    </div>
  </div>
</div>