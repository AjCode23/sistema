<!-- Modal -->
<div class="modal fade" id="addBanco" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg " role="document">
    <div class="modal-content" style="background: #fff">
      <div class="modal-header">
        <h4 class="modal-title center" id="myModalLabel"><i class="fa fa-check"></i> Añadir Banco</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body table-responsive">
  <form action="{{url('clientes/add/Banco')}}" method="post">
          {{csrf_field()}}
          <div class="row">
            
          <input type="hidden" name="cliente_id" value="{{$cliente->id}}">

                      <div class="col-md-4">
                        <label for="">Tipo Telefono <b class="text-red">(*)</b></label>
                         <select class="form-control select-picker" name="tipo_cuenta" id="tipo_cuenta" required>
                           <option value="">SELECIONE TIPO DE CUENTA</option>
                           <option value="1">AHORROS</option>
                           <option value="2">CORRIENTE</option>
                           
                         </select>
                      </div>
                      <div class="col-md-4">
                         <label for="">Numero de Cuenta <b class="text-red">(*)</b></label>
                        <input class="form-control" type="number" min="10000" name="cuenta"   placeholder="Numero de Cuenta" required>
                      </div>

                      <div class="col-md-4">
                         <label for="">BANCO <b class="text-red">(*)</b></label>
                        <select class="form-control select-picker" name="banco" id="banco" required>
                           <option value="">SELECIONE BANCO</option>
                           <option >BANCO DE BOGOTA</option>
                           <option >BANCO POPULAR</option>
                           <option >BANCOLOMBIA</option>
                           <option >OCCIDENTE</option>
                           <option >BANCO CAJA SOCIAL</option>
                           <option >DAVIVIENDA</option>
                           <option >BANCO W S.A</option>
                           <option >BANCOOMEVA</option>
                           <option >BANCO FINANDINA</option>
                           <option >COOPCENTRAL</option>
                           <option >BANCO MUNDO MUJER S.A</option>
                           <option >BANCO COMPARTIR S.A</option>
                           <option >BANCO SERFINANZA S.A</option>
                           
                           
                         </select>
                      </div>

                      
                  
                     


          </div>


      </div>
      <div class="modal-footer">
        <button type="submit" id="btn-add-succesfull" class="btn btn-success btn-flat"><i class="mdi mdi-check-all"></i> Anadir</button>
        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Cancelar</button>
     
      </form>
   
        
      </div>
    </div>
  </div>
</div>