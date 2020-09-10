@extends('layouts.app')

@section('name'," Configuracion")



@section('content')

  <div class="row">
    
    <div class="col-md-5 col-md-offset-3 center "> 

       <div class="card">
                <div class="card-body">
                  <h3>Cambiar Contraseña</h3>
                  <hr>
                   <div class="nav-link">
              <div class="user-wrapper">
                <div class="profile-image">
                  <img src="{{asset('images/faces/face1.jpg')}}" alt="profile image">
                </div>
                <div class="text-wrapper">
                  <p class="profile-name"> {{ Auth::user()->empleado->nombres }} </p>
                  <div>
                    <small class="designation text-muted">
                        
                            @if(Auth::user()->group_id == 1)
                                Administrador

                            @elseif(Auth::user()->group_id == 2)
                                Gerencia
                            @elseif(Auth::user()->group_id == 3)
                                Logistica
                            @elseif(Auth::user()->group_id == 4)
                                Mensajero
                            @endif
<input type="hidden" value="{{csrf_token()}}" id="_token">


                    </small>
                    <span class="status-indicator online"></span>
                  </div>
                </div>
              </div>

             @if(Auth::user()->group_id == 5) <button class="btn btn-success btn-block">Nueva Compra
                <i class="mdi mdi-plus"></i>
              </button>
              @else
              <hr style="border-bottom:1px solid #f0f0f0; width: 100%; margin: 0px;">
              @endif
            </div>
                  @include('alerts')

                    {!!Form::open(['url' => 'change_pass',"method"=>"POST",'class'=>"form-horizontal",'autocomplete'=>'off'])!!}


                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Contraseña Actual</label>
                      <div class="col-sm-9">
                        <input type="password" class="form-control"  name="nombre_emp" id="inputEmail3" placeholder="123456789">
                      </div>
                    </div>
	<hr>

                     <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Contraseña Nueva</label>
                      <div class="col-sm-9">
                        <input type="password" class="form-control" name="nit_emp" id="inputEmail3" placeholder="***************">
                      </div>
                    </div>



                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Repita Contraseña</label>
                      <div class="col-sm-9">
                        <input type="password" name="iva" class="form-control"  id="inputEmail3" placeholder="*************">
                      </div>
                    </div>


                  
                    <div class="form-group">
                      <div class="pull-right"><button class="btn btn-outline-success"> Cambiar</button></div>
                    </div>
                    
                  {!!Form::close()!!}

                </div>
       </div>
   </div>
  </div>
<hr>
          
@endsection

@section('js')



@endsection

