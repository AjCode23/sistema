@extends('layouts.app')

@section('name','..|Editar Cubiculos|..')

@section('ol')
 <a style="color: #e68618;" href="{{url('home')}}" class="link" title=""><i class="mdi mdi-home"></i> Home
</a>
/
 <a class="link" title=""><i class="mdi mdi-account-location"></i> Editar Cubiculo</a>
@endsection

@section('css')

 <link rel="stylesheet" href="{{asset('admin/plugins/bs-stepper/css/bs-stepper.min.css')}}">
  
@endsection

@section('js')
<!--  Plugin for the Wizard -->

  <script src="{{asset('admin/plugins/bs-stepper/js/bs-stepper.min.js')}}"></script>
  <script>
  
  $('#cubiculo').on('change',()=>{
   // alert();
    route="{{url('cubiculos/editar')}}";
    a=$('#cubiculo_anterior').val();
    n=$('#cubiculo').val();
    $.get(route,{cub1:a,cub2:n},(r)=>{

      if(r == 1){
               $('#btn').html(``);

        $('#alcu').html(`<span id="alcu" class="text-danger"> <i class="mdi mdi-close-circle-outline"></i> &nbsp;No Disponible</span>`);
      }else{
        $('#btn').html(`<button type="submit" class="btn btn-outline-success"> Editar</button>`);
        $('#alcu').html(`<span id="alcu" class="text-green"> <i class="fa fa-check"></i> &nbsp;Disponible</span>`);

      }
    });
  })

</script>


@endsection
@section('content')
 <!-- /.row -->
<button type="submit" class="btn btn-outline-success"> Editar Cubiculo</button>
        <div class="row" style="padding:20px;">
          <div class="col-md-12">
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title"><i class="fa fa-edit"></i> Editar Cubiculo</h3>

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
                
                  <div class="bs-stepper-content">
                    <!-- Datos e los Clientes -->
                    <form action="{{url('cubiculos/edit',$cubiculo->id)}}" method="post">
                      {{csrf_field()}}
                      
                        <table class="table">
                          <tr>
                            <th width="20%">Editar Cubiculo</th>
                            <td width="200px">
                             <input type="hidden" name="cubiculo" id="cubiculo_anterior" value="{{$cubiculo->cubiculo}}" class="form-control">
                             <input type="number" name="cubiculo" id="cubiculo" value="{{$cubiculo->cubiculo}}" class="form-control">
                            </td>
                            <td width="20%"><span id="alcu" class="text-green"> <i class="fa fa-check"></i> &nbsp;Disponible</span></td>
                            <td> <span id="btn"><button type="submit" class="btn btn-outline-success"> Editar</button></span></td>
                          </tr>
                        </table>
                    </form>
                  </div><!-- fin row  -->
            
                </div>
              </div>
              <!-- /.card-body -->
             
            </div>
          
@endsection