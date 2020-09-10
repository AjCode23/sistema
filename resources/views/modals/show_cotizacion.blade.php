<!-- Modal -->
<div class="modal fade" id="show_cotizacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="background: #fff">
      <div class="modal-header">
        <h4 class="modal-title center" id="myModalLabel"><i class="fa fa-pencil"></i> <span id="title"></span></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">

    <div class="row">
                    
                    <div class="col-sm-4">
                      <label for="">Cliente </label>
                        <input type="text"  disabled class="form-control" id="cliente">
                    </div>

                    <div class="col-sm-4">
                      <label for=""> Condicion de Pago </label>
                        <input type="text"  disabled class="form-control" id="condicion">
                     
                    </div>

                    <div class="col-sm-4">
                      <label for="">Fecha </label>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                        </div>
                        <input type="date" class="form-control" disabled id="fecha">
                      </div>
                    </div>
                  </div>



                  <div class="row">
                    
                    <div class="col-sm-3">
                      <label for=""> Tipo de documento: </label>
                      <input class="form-control " disabled value="Cotizacion" id="tipoDocumento" required >
                      
                    
                    </div>

                    <div class="col-sm-2">
                      <label for=""> Serie:</label>
                      <input type="text"  disabled value="COT-"  class="form-control"  disabled="" name="serie">
                    </div>


                    <div class="col-sm-2">
                      <label for=""> Número:</label>
                      <input type="text" disabled  class="form-control" id="numero" disabled="" name="numero">
                    </div>

                      <div class="col-sm-3">
                      <label for=""> Asesor </label>
                      
                        <input type="text" disabled   name="impuesto" id="asesorName"  class="form-control"  placeholder="">
                    </div>

                    <div class="col-sm-2">
                      <label for="">  Impuesto </label>
                        <input type="text"  disabled  name="impuesto" id="impuesto"  class="form-control" value="0" placeholder="">
                      
                    </div>
                  </div>


        <hr>
        <div class="table-responsive">  
        <table class="table table-bordered table-striped">

          <tr style="background: #A9D0F5; color: #000">
                      <th>Articulo</th>
                      <th>Cantidad</th>
                      <th>Precio Venta</th>
                      <th>Descuento</th>
                      <th>Subtotal</th>
                    
          </tr>
          <tbody id="body-articulos"></tbody>

          <tfoot>
            <tr>
             
                      <th><span>Subtotal</span><br>
                        <span>I.V.A <span id="iva-text"></span></span><br>
                        <span>total</span></th>
                      <th colspan="3"></th>
                     
                      <th>
                        $<span id="sub" >{{number_format(0,2,',','.')}}</span><br>
                        $<span  id="iva">{{number_format(0,2,',','.')}}</span><br>
                        $<span id="total">{{number_format(0,2,',','.')}}</span>
                      </th>
            </tr>
          </tfoot>
        </table>
        </div>
        <h5>  Archivos de Respaldos</h5>
        <div id="archivos"></div>
       
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Cancelar</button>

   
        
      </div>
    </div>
  </div>
</div>