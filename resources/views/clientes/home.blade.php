@extends('layouts.app')


@section('content')

 <!-- Small boxes (Stat box) -->
        <div class="row">




<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
  <div class="small-box bg-primary" style="background: #0054a0 !important">
    <div class="inner">
      <h4 style="font-size: 20px;">
        <strong>0</strong>
      </h4>
      <p>COTIZACIONES</p>
    </div>
    <div class="icon">
       <i class="fa fa-shopping-cart" aria-hidden="true"></i>
    </div>
    <a href="venta.php" class="small-box-footer">Ver mas! <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div>

<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
  <div class="small-box bg-aqua" style="background: #828282 !important;color:#fff !important">
    <div class="inner">
      <h4 style="font-size: 20px;">
        <strong>0</strong>
      </h4>
      <p>PEDIDOS</p>
    </div>
    <div class="icon">
       <i class="fa fa-user-plus" aria-hidden="true"></i>
    </div>
    <a href="cliente.php" class="small-box-footer">Ver mas! <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div>

<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
  <div class="small-box bg-red" style="background: #781428 !important;color:#fff !important">
    <div class="inner">
      <h4 style="font-size: 20px;">
        <strong>0 </strong>
      </h4>
      <p>FACTURACIONES</p>
    </div>
    <div class="icon">
       <i class="fa fa-users" aria-hidden="true"></i>
    </div>
    <a href="proveedor.php" class="small-box-footer">Ver mas! <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div>



<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
  <div class="col-md-12">
<div class="info-box bg-green" style="background: #0054a0 !important;color:#fff !important">
            <span class="info-box-icon"><i class="mdi mdi-folder"></i></span>

             <div class="info-box-content">
              <span class="info-box-text text-success bold">CERTIFICADOS 3 MESES</span>
             <span class="info-box-number"></span>

              <div class="progress">
              <div class="progress-bar" style="width: 0%"></div>
                
              </div>
              <span class="progress-description">
                    0% 
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
</div>



<div class="col-md-12">
<div class="info-box bg-green" style="background: #0054a0 !important;color:#fff !important">
            <span class="info-box-icon"><i class="mdi mdi-folder"></i></span>

             <div class="info-box-content">
              <span class="info-box-text text-orange bold">CERTIFICADOS 2 MESES</span>
             <span class="info-box-number"></span>

              <div class="progress">
              <div class="progress-bar" style="width: 0%"></div>
                
              </div>
              <span class="progress-description">
                    0% 
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
</div>



<div class="col-md-12">
<div class="info-box bg-green" style="background: #0054a0 !important;color:#fff !important">
            <span class="info-box-icon"><i class="mdi mdi-folder"></i></span>

             <div class="info-box-content">
              <span class="info-box-text text-orange bold">CERTIFICADOS 1 MES</span>
             <span class="info-box-number"></span>

              <div class="progress">
              <div class="progress-bar" style="width: 0%"></div>
                
              </div>
              <span class="progress-description">
                    0% 
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
</div>



<div class="col-md-12">
<div class="info-box bg-green" style="background: #0054a0 !important;color:#fff !important">
            <span class="info-box-icon"><i class="mdi mdi-folder"></i></span>

             <div class="info-box-content">
              <span class="info-box-text text-red bold">CERTIFICADOS VENCIDOS</span>
             <span class="info-box-number"></span>

              <div class="progress">
              <div class="progress-bar" style="width: 0%"></div>
                
              </div>
              <span class="progress-description">
                    0% 
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
</div>

</div>

<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
  <div class="small-box bg-aqua" style="background: #ffc82d !important;color:#fff !important">
    <div class="inner">
      <h4 style="font-size: 20px;">
        <strong>0</strong>
      </h4>
      <p>QUEJAS Y RECLAMOS</p>
    </div>
    <div class="icon">
       <i class="fa fa-user-plus" aria-hidden="true"></i>
    </div>
    <a href="cliente.php" class="small-box-footer">Ver mas! <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div>

<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
  <div class="small-box bg-red" style="background: #781428 !important;color:#fff !important">
    <div class="inner">
      <h4 style="font-size: 20px;">
        <strong>0 </strong>
      </h4>
      <p>ENCUESTAS DE SATISFACCIÓN</p>
    </div>
    <div class="icon">
       <i class="fa fa-users" aria-hidden="true"></i>
    </div>
    <a href="proveedor.php" class="small-box-footer">Ver mas! <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div>










@endsection