@extends('layouts.app')



@section('js')

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

<script>

  var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: {
        labels: ['ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO','AGOSTO','SEPTIEMBRE','OCTUBRE','NOVIEMBRE','DICIEMBRE'],
        datasets: [{
            label: 'My First dataset',
            backgroundColor: 'rgba(0, 84, 160, 0.5)',
            borderColor: 'rgb(0, 84, 160, 0.8)',
            data: [5000 , 10000, 500, 20000, 200000, 30000, 4005]
        }]
    },

    // Configuration options go here
    options: {}
});



  var mes = document.getElementById('mes').getContext('2d');
var chart = new Chart(mes, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: {
        labels: ['ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO','AGOSTO','SEPTIEMBRE','OCTUBRE','NOVIEMBRE','DICIEMBRE'],
        datasets: [{
            label: 'My First dataset',
            backgroundColor: 'rgba(0, 84, 160, 0.5)',
            borderColor: 'rgb(0, 84, 160, 0.8)',
            data: [5 , 10, 1, 0, 6, 2, 1]
        }]
    },

    // Configuration options go here
    options: {}
});



</script>
@endsection
@section('content')

 <!-- Small boxes (Stat box) -->
        <div class="row">



          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
  <div class="small-box bg-yellow " style="color: #fff !important">
    <div class="inner">
      <h4 style="font-size: 20px;">
        <strong>0 </strong>
      </h4>
      <p>Compras</p>
    </div>
    <div class="icon">
      <i class="fa fa-cart-plus" aria-hidden="true"></i>
    </div>
    <a href="ingreso.php" class="small-box-footer">Compras <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div>

<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
  <div class="small-box bg-primary" style="background: #0054a0 !important">
    <div class="inner">
      <h4 style="font-size: 20px;">
        <strong>0</strong>
      </h4>
      <p>Ventas</p>
    </div>
    <div class="icon">
       <i class="fa fa-shopping-cart" aria-hidden="true"></i>
    </div>
    <a href="venta.php" class="small-box-footer">Ventas <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div>

<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
  <div class="small-box bg-aqua" style="background: #828282 !important;color:#fff !important">
    <div class="inner">
      <h4 style="font-size: 20px;">
        <strong>{{$clt}}</strong>
      </h4>
      <p>Nuestros Clientes</p>
    </div>
    <div class="icon">
       <i class="fa fa-user-plus" aria-hidden="true"></i>
    </div>
    <a href="cliente.php" class="small-box-footer">Clientes <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div>

<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
  <div class="small-box bg-red" style="background: #781428 !important;color:#fff !important">
    <div class="inner">
      <h4 style="font-size: 20px;">
        <strong>0 </strong>
      </h4>
      <p>Nuestros Proveedores</p>
    </div>
    <div class="icon">
       <i class="fa fa-users" aria-hidden="true"></i>
    </div>
    <a href="proveedor.php" class="small-box-footer">Proveedores <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div>
<div class="col-md-4">
<div class="info-box bg-green"  style="background: #0054a0 !important;color:#fff !important">
            <span class="info-box-icon"><i class="fa fa-files-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Categorias de Equipos</span>
              <span class="info-box-number">{{$cat}}</span>

              <div class="progress">
              <div class="progress-bar" style="width: {{$cat}}%"></div>
               
              </div>
              <span class="progress-description">
                    {{$cat}}% total de categorias
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
</div>

<div class="col-md-4">
<div class="info-box bg-green" style="background: #0054a0 !important;color:#fff !important">
            <span class="info-box-icon"><i class="fa fa-th"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Equipos disp. para Ventas</span>
              <span class="info-box-number"> {{$art}}</span>

              <div class="progress">
              <div class="progress-bar" style="width: {{$art/1000}}%"></div>
                
              </div>
              <span class="progress-description">
                    {{$art/1000}} % de la capacidad de almacen
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
</div>

<div class="col-md-4">
<div class="info-box bg-green" style="background: #0054a0 !important;color:#fff !important">
            <span class="info-box-icon"><i class="fa fa-files-o"></i></span>

             <div class="info-box-content">
              <span class="info-box-text">Servicios SET Y GAD SAS</span>
             <span class="info-box-number"> {{$serv}}</span>

              <div class="progress">
              <div class="progress-bar" style="width: {{$serv/1000}}%"></div>
                
              </div>
              <span class="progress-description">
                   {{$serv/1000}} % total de servicios
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
</div>




  
  <!-- Left col -->
          <section class="col-lg-6 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
           <!-- STACKED BAR CHART -->
            <div class="card ">
              <div class="card-header">
                <h3 class="card-title">Compras de los ultimos 10 dias</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="myChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>



                  <section class="col-lg-6 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
           <!-- STACKED BAR CHART -->
            <div class="card ">
              <div class="card-header">
                <h3 class="card-title">Ventas de los ultimos 12 meses</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                <canvas id="mes"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>

@endsection