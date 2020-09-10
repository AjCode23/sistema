@extends('layouts.app')

@section('name','..|Visualizacion de Vehiculos y Pagos|..')

@section('ol')
 <a style="color: #e68618;" href="{{url('home')}}" class="link" title=""><i class="mdi mdi-home"></i> Home
</a>
/
 <a class="link" title=""><i class="mdi mdi-bank"></i> Pagos</a>
@endsection

@section('content')

       

        
          <div class="row" id="row_clientes">
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                <div class="row">
                  
                    <div class="col-sm-6">
                       <b class="card-title"> <i class="menu-icon mdi mdi-truck"></i> Vehiculos y Conductores</b>

                    </div>
                   
                </div>

                         


                    <hr>
<div class="table-responsive"  style="overflow: auto;  max-height: 900px;">
  
<table class="table table-hover ">
  <thead>
    <tr>
      <td style="font-weight: bold" class="text-blue"> <i class="mdi mdi-truck"></i> Vehiculos Registrados</td>
    </tr>
  </thead>
  <tr>
    <th style="width: 20px;">#</th>
    <th>TIPO VEHICULO</th>
    <th>PLACAS</th>  
    <th></th>
  </tr>
  <?php $i=1; ?>
  @foreach($vehiculos as $v)
       <tr>
          <td>{{$i++}}</td>
          <td>{{strtoupper($v->tipo)}}</td>  
          <td>{{strtoupper($v->placa)}}</td>  
          
          <td><a href="{{url('vehiculos',$v->id)}}" class="btn  btn-outline-secondary btn-rounded"><i class="fa fa-pencil"></i></a> </td>
        </tr>

  @endforeach
  
</table>

</div>
<br>
<div class="col-md-2 col-md-offset-10">
  <button class="btn btn-success">Nuevo Vehiculo</button>
</div>
<br>

<br>
<div class="table-responsive"  style="overflow: auto; max-height: 900px;">
    <table class="table table-hover">
      <thead>
        <tr>
          <th style="font-weight: bold" class="text-blue"><i class="mdi mdi-steering"></i> Conductores Registrados</th>
        </tr>
      </thead>
      <tr>
        <th style="width: 20px;">#</th>
        <th>CEDULA</th>
        <th>NOMBRE DEL CONDUCTOR</th>
        <th>STATUS</th>
        <th></th>
      </tr>

<?php $i=1; ?>
  @foreach($conductores as $c)
       <tr>
          <td>{{$i++}}</td>
          <td>{{strtoupper($c->cedula)}}</td>  
          <td>{{strtoupper($c->nombres)}}</td>  
          
          <td> <a href="{{url('conductores',$c->id)}}" class="btn btn-outline-secondary btn-rounded"><i class="fa fa-pencil"></i></a></td>
        </tr>

  @endforeach
  
     
    </table>

    <br>
<div class="col-md-2 col-md-offset-10">
  <button class="btn btn-success">Nuevo Conductor</button>
</div>
<br>
</div>
       
        </div>
          </div>
          </div>
          </div>
          </div>

             
@endsection



@section('js')
</script>
@endsection