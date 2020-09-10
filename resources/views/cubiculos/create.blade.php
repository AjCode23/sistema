@extends('layouts.app')

@section('name','..|Registrar Cubiculos|..')

@section('ol')
 <a style="color: #e68618;" href="{{url('home')}}" class="link" title=""><i class="mdi mdi-home"></i> Home
</a>
/
 <a class="link" title=""><i class="mdi mdi-account-location"></i> Registrar Cubiculo</a>
@endsection

@section('css')

 <link rel="stylesheet" href="{{asset('admin/plugins/bs-stepper/css/bs-stepper.min.css')}}">
	
@endsection

@section('js')
<!--  Plugin for the Wizard -->

	<script src="{{asset('admin/plugins/bs-stepper/js/bs-stepper.min.js')}}"></script>
	<script>
	

</script>


@endsection
@section('content')
 <!-- /.row -->

        <div class="row" style="padding:20px;">
          <div class="col-md-12">
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title"><i class="fa fa-edit"></i> Nuevo Cubiculo</h3>

                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <a class="nav-link btn-outline-danger active " style="color: #fff !important" href="{{url('cubiculos')}}" ><i class="mdi mdi-reply"></i> Cancelar</a>
                    </li>
                      &nbsp;
                      
                  
                  </ul>
                </div>
              </div>


            
             
              <div class="card-body p-0">
                <div class="bs-stepper">
                  <div class="bs-stepper-header" role="tablist">
                    <!-- your steps here -->
                    <div class="step" data-target="#logins-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                        <span class="bs-stepper-circle"><i class="mdi mdi-lock-pattern"></i></span>
                        <span class="bs-stepper-label">Cubiculo</span>
                      </button>
                    </div>
                   


                  </div>
                  <div class="alert alert-success">
                  	Registra un cubiculo o varios cubiculos
                  </div>
                  <hr>
                  <div class="bs-stepper-content">
                    <!-- Datos e los Clientes -->
                    <form action="{{url('cubiculos')}}" method="post">
                      {{csrf_field()}}
                      
                        <table class="table">
                          <tr>
                            <th width="20%">Registrar Cubiculo</th>
                            <td width="200px">
                              <select name="cubiculo" class="form-control">
                                <option >{{$num + 1}}</option>
                              </select>
                            </td>
                            <td><button type="submit" class="btn btn-outline-success"> Crear Cubiculo</button></td>
                          </tr>
                        </table>
                    </form>
                  </div><!-- fin row  -->
<hr>

  <div class="bs-stepper-content">
                    <!-- Datos e los Clientes -->
                    <form action="{{url('cubiculos/create')}}" method="post">
                      {{csrf_field()}}
                          <table class="table">
                            <tr>
                              <th width="20%">Registrar Varios Cubiculo</th>
                              <td  width="200px">
                                <input type="number" required="" name="num_cubiculos" class="form-control" min="1" max="1000">
                              </td>
                              <td><button class="btn btn-outline-success"> Crear Cubiculos</button></td>
                            </tr>
                          </table>
                    </form>
                  </div><!-- fin row  -->
                    </div>


                  



                  
                </div>
              </div>
              <!-- /.card-body -->
             
            </div>
          
@endsection