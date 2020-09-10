@if(Session::has('msj-danger'))
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Error!</strong> {{Session::get('msj-danger')}}
</div>
@endif


@if(Session::has('msj-info'))
<div class="alert alert-info alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Nota: </strong> {{ Session::get('msj-info') }}
</div>
@endif


@if(Session::has('msj-success'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Nota: </strong> {{ Session::get('msj-success') }}
</div>
@endif



@if(Session::has('msj-warning'))
<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Error!</strong> {{Session::get('msj-warning')}}
</div>
@endif