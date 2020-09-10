@extends('layouts.app')

@section('name'," Configuracion")



@section('content')

@include('modals.new_user')
@include('modals.edit_user')
                  @include('alerts')
  <div class="row">
    
    <div class="col-md-6"> 

       <div class="card">
                <div class="card-body">
                  <h5><i class="mdi mdi-tie"></i> Configuración de la Empresa</h5>
                  <hr>

                    {!!Form::open(['url' => 'configuration',"method"=>"POST",'class'=>"for"])!!}
                    

                     <div class="form-group">
                      <label for="inputEmail3">RIF:</label>
                      <div >

                        <input type="text" class="form-control" value="{{Session::get('config')->rif}}" name="rif"  placeholder="">
                      </div>


                    </div>


                    <div class="form-group">
                      <label for="inputEmail3" >Nombre Empresa</label>
                     

                        <input type="text" class="form-control" value="{{Session::get('config')->empresa}}" name="empresa"  placeholder="">
                      </div>
                 



                   <div class="form-group">
                      <label for="inputEmail3" >Telefono</label>
                     
                        <input type="text" class="form-control" value="{{Session::get('config')->telefono}}" name="telefono"  placeholder="">
                      </div>
                   




                  <div class="form-group">
                      <label for="inputEmail3" >Dirección</label>
                      <div >

                        <input type="text" class="form-control" value="{{Session::get('config')->direccion}}" name="direccion"  placeholder="">
                      </div>
                    </div>



                    <div class="form-group">
                      <label for="inputEmail3" >Iva % (default)</label>
                     
                        <input type="text" name="iva" value="{{Session::get('config')->iva}}" class="form-control"  placeholder="19">
                      </div>
                   


                    <div class="form-group">
                      <label for="inputEmail3" >Descuento %</label>
                     
                        <input type="text" name="descuento" value="{{Session::get('config')->descuento}}" class="form-control"  placeholder="19">
                      </div>
                  


                    <div class="form-group">
                      <label for="inputPassword3">Moneda</label>
                   
                        <select name="moneda_id" value="202" class="form-control">
                          
                          @foreach($monedas as $m)

                              @if((Session::get('config')->descuento) > 0 && (Session::get('config')->descuento == $m->id))
                              
                                <option selected="selected" value="{{$m->id}}">{{$m->pais}} | {{$m->moneda}} | ({{$m->iso}})</option>
                              @else
        
                                <option value="{{$m->id}}">{{$m->pais}} | {{$m->moneda}} | ({{$m->iso}})</option>
                              @endif

                          @endforeach
                        </select>
                     
                    </div>
                    <div class="form-group">
                      <div class="pull-right"><button class="btn btn-outline-success"> Guardar</button></div>
                    </div>
                    
                  {!!Form::close()!!}

                </div>
       </div>
   </div>




     <div class="col-md-6"> 

       <div class="card" style="display: non">
                <div class="card-body">
                  <h5><i class="mdi mdi-bank"></i> Bancos Registrados</h5>
                
                 <table class="table">
                    <tr>
                      <th>BANCO</th>
                      <th>N° CTA</th>
                      <th>STATUS</th>
                      
                    </tr>

                    <tbody>
                      @foreach($bancos as $b)

                        <tr>
                          <td>{{ucwords($b->banco)}}</td>
                          <td>{{$b->cta}}</td>
                          <td>
                            @if($b->status == 1)
                              <b class="text-green">Activo</b>
                            @elseif($b->status > 2)
                              <b class="text-blue">Pesos</b>
                            @else
                              <b class="text-orange">Inactivo</b>

                            @endif
                          </td>
                        </tr>

                      @endforeach
                    </tbody>
                  </table>

<hr>
                 
                  {!!Form::open(['url' => 'bancos',"method"=>"POST",'class'=>"form-horizontal"])!!}

                   <div class="form-group row">
                          
                          <div class="col-sm-6">
                            <input  required type="text" name="banco" class="form-control" id="exampleInputnumbre2" placeholder="Nombre del Banco">
                          </div>

                           <div class="col-sm-6">
                            <br>
                            <input  required type="number" name="cta" class="form-control" id="exampleInputEmail2" placeholder="Nro de Cuenta">
                          </div>
                        </div>
                       
                       
                  <button class="btn btn-outline-success"> Nuevo Banco</button>
                    
                  {!!Form::close()!!}

                </div>
       </div>
   </div>





  </div>
<hr>

<div class="row">
  

     <div class="col-md-12" style="display: non"> 

                <div class="card">
                    <div class="card-body table-responsive" >
             <h5><i class="fa fa-users"></i> Administracion de Usuarios</h5>
             <hr>
               <button style="float: left;" class="btn btn-outline-success" onclick="new_usuario()" > Crear Usuario</button>
               <br>
                <hr>
                      <table class="table">
                        <tr>
                         
                          <th>CEDULA</th>
                          <th>NOMBRES Y APELLIDOS</th>
                          <th>EMAIL</th>
                          <th>TELEFONO</th>
                          <th>NIVEL</th>
                          <th>STATUS</th>
                          <th></th>
                        </tr>
                      @foreach($users as $u)
                        <tr>
                          
                          <td>{{$u->cedula}}</td>
                          <td>{{$u->nombres}} {{$u->apellidos}}</td>
                          <td>{{$u->email}}</td>
                          <td>{{$u->telefono}}</td>
                          <td>
                            @if($u->nivel == 1)
                            <b >Administrador</b>

                            @else

                            <b>Usuario</b>

                            @endif
                          </td>
                            <td>

                              @if($u->status == 1)
                            <b class="text-green">Activo</b>

                            @else

                            <b class="text-red">Inabilitado</b>

                            @endif
    
                          </td>
                          <td>
                            <button class="btn btn-outline-primary btn-icons btn-rounded" title="Editar Usuario" onclick="edit({{$u->id}})"> <i class="mdi mdi-pencil"></i></button>
                            <button class="btn btn-outline-warning  btn-icons btn-rounded" title="Restablecer Contraseña" onclick="reset({{$u->id}})"> <i class="mdi mdi-lock"></i></button>
                          </td>
                        </tr>
                      @endforeach

                      </table>
                      
                    </div>
                </div>
            </div>
</div>


<hr>

<div class="row">
  

     <div class="col-md-12" style="display: non"> 

                <div class="card">
                    <div class="card-body table-responsive" >
             <h5><i class="mdi mdi-desktop-mac"></i> Información de la Aplicación</h5>
             <hr>

             <div class="alert alert-info">
               Sistema Desarrollado para Distrubuidores de productos polar Venezuela, basado en el manejo de negocio interno de los mismos!
             </div>

              <div class="alert alert-success">
               Para soporte tecnico, averias, mejoras o Donaciones al sistema comunicarse a los numeros:
                <br><i class="mdi mdi-cellphone"></i> 0412-4328738 <i class="mdi mdi-phone"></i>
                <br><i class="mdi mdi-cellphone"></i> 0426-1374214 <i class="mdi mdi-whatsapp"></i>
                <br><i class="mdi mdi-cellphone"></i> +573188113797 <i class="mdi mdi-whatsapp"></i>
             </div>

             <div class="alert alert-info">
               Version <strong>1.0</strong>
             </div>

                      
                    </div>
                </div>
            </div>
</div>



          
@endsection

@section('js')

<script>
  
  function new_usuario(){
    $('#new_user').modal();
  }



   function edit(id){
    route="{{url('users')}}/"+id;
    $.get(route,function(res){
     // console.log(resp);
     $('#edit_id').val(res.id);
     $('#edit_nombres').val(res.nombres);
     $('#edit_cedula').val(res.cedula);
     $('#edit_apellidos').val(res.apellidos);
     $('#edit_genero').val(res.genero);
     $('#edit_email').val(res.email);
     $('#edit_nivel').val(res.nivel);
     $('#edit_status').val(res.status);
    $('#edit_user').modal();
    });
  }



   function reset(id){
    if(confirm('Desea Restablecer la Contraseña de este usuario?')){
      document.location="{{url('reset/pass')}}/"+id;

    }

  }
</script>

@endsection

