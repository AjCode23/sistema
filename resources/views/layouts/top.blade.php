  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background: #781428; color:blue;">
    <!-- Left navbar links -->
    <ul class="navbar-nav" >
      <li class="nav-item">
        <a class="nav-link"  style=" color:#fff;" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
     
    </ul>
 
    



      <div class="navbar-nav ml-auto">
        <ul class="nav navbar-nav">

          <li class="dropdown user user-menu" style="color: #fff;text-decoration: none;">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="text-decoration: none;color: #fff;">
              @if(Auth::user()->path)
              <img src="{{asset('imgUsers/'.'1.jpg')}}" class="user-image" alt="User Image">
              @else
              <img src="{{asset('imgUsers/ni.JPG')}}" class="user-image" alt="User Image">

              @endif
              <span class="hidden-xs " style="color: #fff;">{{strtoupper(Auth::user()->nombres)}}</span>
            </a>
            <ul class="dropdown-menu" >
              <!-- User image -->
              <li class="user-header" style="background: #781428;">

                 @if(Auth::user()->path)
              <img src="{{asset('imgUsers/'.'1.jpg')}}" class="img-circle" alt="User Image">
              @else
              <img src="{{asset('imgUsers/ni.JPG')}}" class="img-circle" alt="User Image">

              @endif

                <p style="color: #fff;">
                {{strtoupper(Auth::user()->nombres)}}
                 
                  <small>
                    @if(Auth::user()->cargo == 1)
                      Administrador
                    @else
                      Usuario
                    @endif

                  </small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="row">
                  <div class="col-md-6"> <a href="#" class="btn btn-default btn-flat">Perfil</a></div>
                  <div class="col-md-6 text-right"> <a href="{{url('logout')}}" class="btn btn-default btn-flat">Salir</a></div>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->

        </ul>
      </div>
  </nav>
  <!-- /.navbar -->