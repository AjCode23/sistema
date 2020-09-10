@extends('layouts.app')

@section('name','..|Empleados Registrados|..')

@section('ol')
 <a style="color: #e68618;" href="{{url('home')}}" class="link" title=""><i class="mdi mdi-home"></i> Home
</a>
/
 <a class="link" title=""><i class="mdi mdi-account-location"></i> Empleados</a>
@endsection

@section('css')
  <link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<style>
  .img{
    width: 50px;
    height: 50px;
    border-radius: 50px;
  }
</style>
@endsection
@section('js')
 <!-- DataTables -->
<script src="{{asset('datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>

<script>
 $(function () {
    $(".table").DataTable({
      "responsive": true,
      "autoWidth": false,
    });



  });

function pass(data){
  $('#imgUserEdit').prop('src',"{{asset('imgUsers')}}/"+data.path);
$('#idEdit').val(data.id);
$('#claveEdit').val(data.password);
$('#edit_pass').modal();
}


function buscarPermiso(a,d){
bandera=true;
  console.log(a);
$(a).each((v,k)=>{
  if(k.permiso_id == d){
    bandera=false;
  }
});
return bandera;
}
function editar(data,permisos){

  $('#imgUser').prop('src',"{{asset('imgUsers')}}/"+data.path);
 $('#id_editar').val(data.id);
 $('#nombre').val(data.nombres);
$('#tipo_documento').val(data.tipo_documento);
$('#num_documento').val(data.num_documento);
$('#direccion').val(data.direccion);
$('#telefono').val(data.telefono);
$('#email').val(data.email);
$('#cargo').val(data.cargo);
$('#edit_user').modal();

per=$('#permisos');
per.empty();
$(permisos).each((e,k)=>{

  if(buscarPermiso(data.permisos,k.id)){

  per.append(`<input type="checkbox" name="permisos_`+k.id+`" id="`+k.id+`"> &nbsp;<label for="`+k.id+`"> `+k.permiso+`</label> </br>`);
  }else{
  per.append(`<input type="checkbox" name="permisos_`+k.id+`" checked id="`+k.id+`"> &nbsp;<label for="`+k.id+`"> `+k.permiso+`</label> </br>`);

  }

});
per.show();
}

function desactivar(id){
Swal.fire({
  title: 'Confirme?',
  text: "¿Esta Seguro de Desactivar Este Usuario?",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, Continuar!'
}).then((result) => {
  if (result.value) {
    document.location="{{url('users/desact')}}/"+id;
   
  }
})
}
</script>
@endsection

@section('content')

@include('modals.edit_user')
@include('modals.edit_pass')

        
          @include('alerts')
          <div class="row">
            <div class="col-lg-12 grid-margin">
                  <div class="card">
              <div class="card-header">
                <h2 class="card-title">
                  <i class="mdi mdi-tie mr-1"></i>
                  Usuarios
                </h2>
                  <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <a class="nav-link btn-success active" href="{{url('usuarios/create')}}" style="color: #fff !important;  " ><i class="mdi mdi-plus-circle"></i> Nuevo Usuario</a>
                    </li>
                      &nbsp;
                       <li class="nav-item">
                      <a class="nav-link active" href="{{url('usuarios/pdf')}}"  style="color: #fff !important;"><i class="mdi mdi-file-pdf"></i> Reporte</a>
                    </li>
                  
                  </ul>
                </div>
                 
<br>
              <hr>

                  <div class="table-responsive" >
                 
                    <table class="table table-hover" id="table">
                      <thead>
                        <tr style="font-weight: bold">
                          <th style="font-weight: bold">
                            OPERACIONES
                          </th>
                         
                          <th style="font-weight: bold">
                            Foto
                          </th>
                          <th style="font-weight: bold">
                            Nombres
                          </th>
                          <th style="font-weight: bold">
                             Documento
                          </th>

                           <th style="font-weight: bold">
                            Numero Documento
                          </th>
                          
                          <th style="font-weight: bold">
                            Telefono
                           </th>
                          <th style="font-weight: bold">
                            Email
                          </th>
                          <th style="font-weight: bold">
                            Login
                          </th>

                           <th style="font-weight: bold">
                            Estado
                          </th>
                        </tr>
                      </thead>
                      <tbody id="respuesta">
                        @foreach($users as $u)
                          <tr >
                          <td >
                           <button onclick="editar({{$u}},{{$permisos}})" class="btn btn-outline-warning btn-xs"><i class="mdi mdi-pencil"></i></button>

                           <button onclick="desactivar({{$u->id}})" class="btn btn-outline-danger btn-xs"><i class="mdi mdi-account-remove"></i></button>
                           <button onclick="pass({{$u}})" class="btn btn-outline-secondary btn-xs"><i class="mdi mdi-account-key"></i></button>
                          </td>
                         
                          <td >
                            @if($u->path)
                   
 

                            <img src="{{asset('imgUsers/'.$u->path)}}" class="img"   alt="">
                      
                            @else 

                            <img src="{{asset('ni.jpg')}}" class="img"   alt="">
                         

                            @endif
                          </td>
                          <td >
                            {{strtoupper($u->nombres)}} {{$u->permiso}}
                          </td>
                          <td >
                            {{$u->tipo_documento}}
                          </td>
                          
                          <td >
                            {{$u->num_documento}}
                           </td>
                          <td >
                            {{$u->telefono}}
                          </td>
                          <td >
                            {{$u->email}}
                          </td>

                          <td >
                            {{$u->usuario}}
                          </td>

                           <td >
                          @if($u->status == 1)
                        <b class="text-green"> <i class="mdi mdi-check"></i></b>

                      @else

                        <b class="text-red"> <i class="mdi mdi-close"></i></b>

                      @endif
                          </td>
                        </tr>
          
                        @endforeach
                     </tbody>
                      
                    </table>
<hr>

                  
                  </div>
                </div>
              </div>
            </div>
          </div>











        
          <div class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <b class="card-title"><i class="fa fa-users mdi-24px"></i> CLIENTES</b>
                 

                 
<br>
              <hr>

                  <div class="table-responsive" >
                 
                    <table class="table table-hover" >
                      <thead>
                        <tr style="font-weight: bold">
                          <th style="font-weight: bold">
                            OPERACIONES
                          </th>
                         
                          <th style="font-weight: bold">
                            Foto
                          </th>
                          <th style="font-weight: bold">
                            Nombres
                          </th>
                          <th style="font-weight: bold">
                             Documento
                          </th>

                           <th style="font-weight: bold">
                            Numero Documento
                          </th>
                          
                          <th style="font-weight: bold">
                            Telefono
                           </th>
                          <th style="font-weight: bold">
                            Email
                          </th>
                          <th style="font-weight: bold">
                            Login
                          </th>

                           <th style="font-weight: bold">
                            Estado
                          </th>
                        </tr>
                      </thead>
                      <tbody id="respuesta">
                        @foreach($clts as $u)
                           <tr >
                          <td >
                            OPERACIONES
                          </td>
                         
                          <td >
                            @if($u->path)
                   
 

                            <img src="{{asset('imgUsers/'.$u->path)}}" class="img"   alt="">
                      
                            @else 

                            <img src="{{asset('imgUsers/ni.jpg')}}" class="img"   alt="">
                         

                            @endif
                          </td>
                          <td >
                            {{strtoupper($u->cliente->nombres)}}
                          </td>
                          <td >
                            {{$u->cliente->tipoDocumento}}
                          </td>
                          
                          <td >
                            {{$u->cliente->numDocumento}}
                           </td>
                          <td >
                            {{$u->cliente->tlf->numero}}
                          </td>
                          <td >
                            {{$u->cliente->email}}
                          </td>

                          <td >
                            {{$u->usuario}}
                          </td>

                           <td >
                          @if($u->status == 1)
                        <b class="text-green"> <i class="mdi mdi-check"></i></b>

                      @else

                        <b class="text-red"> <i class="mdi mdi-close"></i></b>

                      @endif
                          </td>
                        </tr>
                        @endforeach
                     </tbody>
                      
                    </table>
<hr>

                  
                  </div>
                </div>
              </div>
            </div>
          </div>



        
@endsection



@section('js')

<script>

//reload();

function new_user(){

  $('#new_user').modal('toggle');

}
</script>
@endsection