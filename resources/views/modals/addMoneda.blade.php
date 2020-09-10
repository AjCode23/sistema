<!-- Modal -->
<div class="modal fade" id="addMoneda" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog  " role="document">
    <div class="modal-content" style="background: #fff">
      <div class="modal-header">
        <h4 class="modal-title center" id="myModalLabel"><i class="fa fa-check"></i> Añadir Moneda</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body table-responsive">
  <form action="{{url('clientes/add/moneda')}}" method="post">
          {{csrf_field()}}
          <div class="row">
            
          <input type="hidden" name="cliente_id" value="{{$cliente->id}}">

            <div class="col-md-12">
            <label for="">Moneda <b class="text-red">(*)</b></label>
                        <input class="form-control" type="text" name="moneda"   placeholder="Especifique la Moneda" required>
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