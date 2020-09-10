
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Cambio De Contraseña</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('vendors/iconfonts/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.addons.css')}}">
 <link href="{{asset('assets/plugins/fontawesome/css/font-awesome.css')}}" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" href="{{asset('css/style2.css')}}">
 
  <link rel="shortcut icon" href="{{asset('image/favicon.png')}}" />
  <style>
  	 .text-red{color: red;}    
    .text-blue{color:#003c75;}    
    .text-yellow{color: yellow;}    
    .text-green{color: green;}    
    .text-orange{color: #e68618;}    
    .center{text-align: center}
    .bold{font-weight: bold}
    .marron{color:#a68473;}
    .card-heading{
      padding: 10px;
    }
    .success{
 color:#3c763d;background-color:#dff0d8;border-color:#d6e9c6
}

  </style>
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auto-form-wrapper">
               <img src="{{asset('imagen/polar.JPG')}}" style=" width: 100%">
              <hr>

				<label for="" class="center text-blue"> <i class="fa fa-lock"></i> Cambio de Contraseña</label><hr>
              @include('alerts')
              <div class="alert alert-info">
                Nota: Es Obligatorio Cambiar La Contraseña!
              </div>
              <form class="m-t-md" method="POST" id="form" action="{{ url('change/pass') }}">
                    {{ csrf_field() }}
                
                <div class="form-group">
                  <label class="label">Contraseña</label>
                  <div class="input-group">
                    <input type="password" class="form-control" id="c1" name="password" placeholder="*********">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>


                 <div class="form-group">
                  <label class="label">Repetir Contraseña</label>
                  <div class="input-group">
                    <input type="password" class="form-control" id="c2" placeholder="*********">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>


                <div class="form-group">
                </div>


                
               
              </form>
                  <button class="btn btn-primary submit-btn btn-block" id="cambiar"><i class="fa fa-sign-in"></i> Cambiar Contraseña</button>
            </div>
            <ul class="auth-footer">
              <li>
                <a href="#">Conditions</a>
              </li>
              <li>
                <a href="#">Help</a>
              </li>
              <li>
                <a href="#">Terms</a>
              </li>
            </ul>
            <p class="footer-text text-center">copyright © 2018 Bootstrapdash. All rights reserved.</p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{asset('vendors/js/vendor.bundle.base.js')}}"></script>
  <script src="{{asset('vendors/js/vendor.bundle.addons.js')}}"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="{{asset('js/off-canvas.js')}}"></script>
  <script src="{{asset('js/misc.js')}}"></script>
  <!-- endinject -->

  <script>
    
    $('#cambiar').on('click',function(){
     
      c1=$('#c1');
      c2=$('#c2');

      if(c1.val().length <=5){
        alert('Disculpe La Clave Debe contener Almenos 6 Caracteres');
      }else{
        if(c1.val() == c2.val()){
          if(confirm('Desea Cambiar La Contraseña')){
            $('#form').submit();
          }

        }else{

        alert('Las Contraseña No Coinciden!');
        }

      }
    });
  </script>
</body>

</html>
                                
