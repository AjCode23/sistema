<!-- Modal -->
<div class="modal fade" id="new_inspeccion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog  modal-xl" role="document">
    <div class="modal-content" style="background: #fff">
      <div class="modal-header">
        <h4 class="modal-title center" id="myModalLabel"><i class="mdi mdi-receipt-circle"></i>Equipos ingresados pendiente por inspeccionar. <b id="num"></b> </h4>
        <button  type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">

                   <table id="example1" class="table table-bordered table-striped">
                  <thead>
                 <tr>
                    <th>Opciones</th>
                    <th>Cliente</th>
                    <th>Equipo</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Num. Serie</th>
                    <th  class="text-center">Estado</th>
                  </tr>
                  </thead>

                  <tbody>
                  @foreach($equipos as $c)
                  <tr id="tr_{{$c->id}}">
                    <td width="30px;" class="text-center">
                     
                      <a title="Inspeccionar" onclick="ocultar({{$c}})" data-toggle="modal" data-target="#add_inspeccion" class="btn btn-outline-success btn-xs"><i class="mdi mdi-check-all"></i></a>
		                     
                    </td>
                    <td>{{($c->cliente->nombres)}}</td>
                    <td>{{($c->articulo->articulo)}}</td>
                    <td>{{($c->marca)}}</td>
                    <td>{{($c->modelo)}}</td>
                    <td>{{($c->numero)}}</td>
                    <td class="text-center">
               			<span id="status_{{$c->id}}">
               				
		                      @if($c->status == 0)
		                        <b class="text-red" title="Categoria Inactiva"> <i class="mdi mdi-alert-circle"></i> <small>Inactiva</small> </b> 	

		                      @else

		                       
		                         
		                        <b class="text-info" title="Categoria Activar"> <i class="fa fa-check"></i> <small>Abierta</small></b>
		                  

		                   
		                      @endif
               			</span>

                    </td>
                    
                   
                  </tr>
                  @endforeach
                </table>

      
      </div>
      <div class="modal-footer">
        <button type="button" on class="btn btn-default btn-flat" data-dismiss="modal">Cancelar</button>
        

   
        
      </div>
    </div>
  </div>
</div>