<!-- Modal -->
<div class="modal fade" id="add_productos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog  modal-xl" role="document">
    <div class="modal-content" style="background: #fff">
      <div class="modal-header">
        <h4 class="modal-title center" id="myModalLabel"><i class="mdi mdi-receipt-circle"></i> Agregar Productos. <b id="num"></b> </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">

      
  <input type="hidden" id="orden_id" value="@if(isset($orden)) {{$orden->id}} @endif">
      	
     <div class="table-responsive">
      	<table class="table  table-hover table-bordered" id="example1" style="">
      	
         <thead>
              		<tr>
              			<th class="bold">ARTICULO</th>
                    <th class="bold">TIPO</th>
              			<th class="bold">CATEGORIA</th>
              			<th class="bold">CANTIDAD</th>
              			<th class="bold">PRECIO VENTA</th>
                    <th class="bold">DESCUENTO</th>              			
                    <th class="bold"></th>                   
              		</tr>
                  <tbody>
                    
                      @foreach($productos as $p)
                        <tr>
                      <input type="hidden" class="form-control"  value="{{$p->id}}" id="producto_{{$p->id}}">
                        <td class="bold">{{$p->articulo}}</td>
                        <th>@if($p->tipoProducto == 1) Articulo @else Servicio @endif</th>
                        <td class="bold">{{$p->categoria->categoria}}</td>
                        <td class="bold"><input type="number" class="form-control" min="1" value="1" id="cant_{{$p->id}}"></td>
                        <td class="bold"><input type="number" class="form-control" min="1" value="{{$p->pvp}}" id="pvp_{{$p->id}}"></td>
                        <td class="bold"><input type="number" class="form-control" min="1" value="0" id="descuento_{{$p->id}}"></td>
                        <td><button onclick="agregar({{$p->id}})"  class="btn btn-warning"><i class="fa fa-plus"></i></button></td>
                      </tr>
                      @endforeach
                  </tbody>
         </thead>

      		<tbody id="table-respuesta">
      			
      		</tbody>
      	</table>
					 
      </div>
      
      </div>
      <div class="modal-footer">
        <button type="button" on class="btn btn-default btn-flat" data-dismiss="modal">Cancelar</button>
        

   
        
      </div>
    </div>
  </div>
</div>