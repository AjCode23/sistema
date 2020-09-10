<!-- Modal -->
<div class="modal fade"  id="edit_pass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="background: #fff">
      <div class="modal-header">
        <h4 class="modal-title center" id="myModalLabel"><i class="mdi mdi-receipt-circle"></i>Gestion de Contraseña. <b id="num"></b> </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body" style="background: #e5e5e5">


  <p> Cambiar Contraseña : <b id="banco"></b></p>

    
      <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      <img src="" id="imgUserEdit" alt="User Image">
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <form class="lockscreen-credentials" action="{{url('users/pass')}}" method="post">
      <div class="input-group">


        {{csrf_field()}}
        <input type="hidden" name="id"  id="idEdit"  required>
        <input type="password" id="claveEdit" name="password" required class="form-control" placeholder="Clave Nueva">

        <div class="input-group-append">
          <button type="submit" class="btn">
            <i class="fas fa-arrow-right text-muted"></i>
          </button>
        </div>
      </div>
    </form>
    <!-- /.lockscreen credentials -->

      </div>
    
      </div>
      <div class="modal-footer">
          
        <button type="button" on class="btn btn-default btn-flat" data-dismiss="modal">Salir</button>
      

   
        
      </div>
    </div>
  </div>
</div>