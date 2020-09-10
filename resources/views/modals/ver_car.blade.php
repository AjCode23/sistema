<!-- Modal -->
<div class="modal fade"  id="ver_car" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog " role="document">
    <div class="modal-content" style="background: #fff">
      <div class="modal-header">
        <h4 class="modal-title center" id="myModalLabel"><i class="mdi mdi-receipt-circle"></i> Orden N. <b id="num"></b> </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">

      	<div class="text-center col-12" id="load">
      		<i class="mdi mdi-book-multiple mdi-spin mdi-24px"></i>
      	</div>

 <table style="width: 100%;">
      <tr>
        <td><b>Fecha:</b>  <span id="fecha"></span></td>
        <td style="text-align: right;"><b>Orden Nro. <span id="orden"></span></b></td>
      </tr>
</table>

<b>Cliente:</b>  <span id="cliente"></span><br>
<b>Nit:</b>   <span id="nit"></span><br>

<br>
     <div class="table-responsive">
      	<table class="table table-hover" id="table" style="display: none">
      	
         <thead>
                  <tr>
                    <th class="bold">CATEGORIA</th>
                    <th class="bold">PRODUCTO</th>
                    <th class="bold">CANTIDAD</th>
                    <th class="bold">PRECIO</th>
                    <th class="bold">TOTAL</th>
                    
                  </tr>
         </thead>

          <tbody id="table-respuesta">
            
          </tbody>
        </table>

      </div>
<hr>
         <table style="width: 100%;">
            <tr>
              <td><b>SUB: </b> <span id="sub"></span></td>
              <td style="text-align: right;"><b><span id="m_sub"></span></b></td>
            </tr>


             <tr>
              <td><b>IVA <span id="iva"></span>%: </b> <span id="sub"></span></td>
              <td style="text-align: right;"><b><span id="m_iva"></span></b></td>
            </tr>


             <tr>
              <td><b>DESCUENTO  <span id="descuento"></span>%:</b>  <span id="sub"></span></td>
              <td style="text-align: right;"><b><span id="m_descuento"></span></b></td>
            </tr>


              <tr>
              <td colspan="2">
                <hr>
               
            
            </tr>

             <tr>
              <td>
                <b>TOTAL:  </b><span id="sub"></span></td>
              <td style="text-align: right;"><b><span id="m_total"></span></b></td>
            </tr>
        </table>
           
<hr>
     <div class="form-group">
                      <label for="exampleInputEmail1">OBSERVACIONES</label>
                      <textarea  type="text" class="form-control" required name="producto" id="observaciones" placeholder=""></textarea>
                    </div>
      </div>
      <div class="modal-footer">
        <button type="button" on class="btn btn-default btn-flat" data-dismiss="modal">Cancelar</button>
        <button type="button" onclick="entregar(this)" id="btn_cliente" class="btn btn-success btn-flat">Entregado <i class="mdi mdi-check-all"></i>	</button>

   
        
      </div>
    </div>
  </div>
</div>