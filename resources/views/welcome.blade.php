
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>CONOS ANGIE S.A.S</title>
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CVarela+Round" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />

    <!-- Owl Carousel -->
    <link type="text/css" rel="stylesheet" href="{{asset('css/owl.carousel.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('css/owl.theme.default.css')}}" />

    <!-- Magnific Popup -->
    <link type="text/css" rel="stylesheet" href="{{asset('css/magnific-popup.css')}}" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{asset('css/style.css')}}" />

     <link rel="stylesheet" href="{{asset('vendors/iconfonts/mdi/css/materialdesignicons.min.css')}}">
</head>

<body>
    <!-- Header -->
    <header id="home">
        <!-- Background Image -->
        <div class="bg-img" style="background-image: url('./imagen/portal.jpg');">
            <div class="overlay"></div>
        </div>
        <!-- /Background Image -->

        <!-- Nav -->
        <nav id="nav" class="navbar nav-transparent">
            <div class="container">

                <div class="navbar-header">
                    <!-- Logo -->
                    <div class="navbar-brand">
                        <a href="index.html">
                          <img style=" width: 100px;"   class="img-circle"  src="{{asset('imagen/logo1.png')}}" alt="logo"></a>
                    </div>
                    <!-- /Logo -->

                    <!-- Collapse nav button -->
                    <div class="nav-collapse">
                        <span></span>
                    </div>
                    <!-- /Collapse nav button -->
                </div>

                <!--  Main navigation  -->
                <ul class="main-nav nav navbar-nav navbar-right">
                    <li><a href="#home">Inicio</a></li>
                    <li><a href="#about">Acerca</a></li>
                    <li><a href="#portfolio">Productos</a></li>
                    <li><a href="#service">Servicios</a></li>
                   
                    <li><a href="#contact">Contacto</a></li>
                     @if (!Auth::guest())

                            @if(Auth::user()->empleado)
                            <li><a href="{{url('home')}}">/Home</a></li>
                            @else
                            <li><a href="{{url('clientes/inicio')}}">/Inicio</a></li>
                            @endif
                    @else

                            <li class="has-dropdown"><a href="{{url('login/cliente')}}">Ingresar</a>
                               
                            </li>

                    @endif
                    
                </ul>
                <!-- /Main navigation -->

            </div>
        </nav>
        <!-- /Nav -->

        <!-- home wrapper -->
        <div class="home-wrapper">
            <div class="container">
                <div class="row">

                    <!-- home content -->
                    <div class="col-md-10 col-md-offset-1">
                        <div class="home-content">
                            <h1 class="white-text">Bienvenido a Conos Angie</h1>
                            <p class="white-text">Le damos la mas cordial Bicenvenida a nuestra plataforma.
                            </p>
                             <p class="white-text"><a href="{{url('login/cliente')}}" class="btn btn-info"> Ingresar a nuestro Portal</a>
                            </p>
                            
                        </div>
                    </div>
                    <!-- /home content -->

                </div>
            </div>
        </div>
        <!-- /home wrapper -->

    </header>
    <!-- /Header -->

    <!-- About -->
    <div id="about" class="section md-padding">

        <!-- Container -->
        <div class="container">

            <!-- Row -->
            <div class="row">

                <!-- Section header -->
                <div class="section-header text-center">
                    <h2 class="title">Acerca de Conos Angie S.A.S</h2>
                </div>
                <!-- /Section header -->

                <!-- about -->
                <div class="col-md-4">
                    <div class="about">
                        <i class="fa fa-black-tie"></i>
                        <h3>Nosotros</h3>
                        <p>Conos Angie es un empresa familiar fundada el 22 de agosto de 1992 nace con la necesidad de ofertar frente al mercado actual en heladerías y fruterías a nivel nacional hoy con un sabor único y productos de alta calidad ofrece a sus clientes, distribuidores y consumidores una experiencia única con la diversidad de sabores y tamaños, para tener una vida llena de momentos dulces.</p>
                       
                    </div>
                </div>
                <!-- /about -->

                <!-- about -->
                <div class="col-md-4">
                    <div class="about">
                        <i class="fa  fa-shopping-cart"></i>
                        <h3>Suministros</h3>
                        <p>
<p>•   Conos para todo el país (Domicilios a nivel nacional)</p>
<p>•   Venta de suministros para heladería al mayor y detal.</p>
<p>•   Productos 100% colombianos</p>

                            
                        </p>
                       
                    </div>
                </div>
                <!-- /about -->

                <!-- about -->
                <div class="col-md-4">
                    <div class="about">
                        <i class="fa fa-bank"></i>
                        <h3>Medios De Pago</h3>
                      
<p>•   Efectivo</p>

<p>•   Cuenta Corriente</p>
                       
                    </div>
                </div>
                <!-- /about -->

            </div>
            <!-- /Row -->

        </div>
        <!-- /Container -->

    </div>
    <!-- /About -->


    <!-- Portfolio -->
    <div id="portfolio" class="section md-padding bg-grey">

        <!-- Container -->
        <div class="container">

            <!-- Row -->
            <div class="row">

                <!-- Section header -->
                <div class="section-header text-center">
                    <h2 class="title">Nuestros Productos</h2>
                </div>
                <!-- /Section header -->

                <!-- Work -->
                <div class="col-md-4 col-xs-6 work"  style="border:1px solid #d0d0d0" style="border:1px solid #d0d0d0">
                    <img class="img-responsive" style="max-width: 450px; width:100%;max-height: 340px; height:100%; "  src="{{asset('imagen/GALLCUADRADA.jpg')}}" alt="">
                    <div class="overlay"></div>
                    <div class="work-content">
                        <span>Category</span>
                        <h3>Galleta Cuadrada</h3>
                        <div class="work-link">
                            <a href="#"><i class="fa fa-external-link"></i></a>
                            <a class="lightbox" href="./img/work1.jpg"><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                </div>
                <!-- /Work -->
                  <!-- Work -->
                <div class="col-md-4 col-xs-6 work"  style="border:1px solid #d0d0d0">
                    <img class="img-responsive" style="max-width: 450px; width:100%;max-height: 340px; height:100%; "  src="{{asset('imagen/GALLCORAZON.jpg')}}" alt="">
                    <div class="overlay"></div>
                    <div class="work-content">
                         <span><b> GALLETAS</b></span>
                        <h3>Galleta Corazon</h3>
                        <div class="work-link">
                              <a href="#"><i class="fa fa-list"></i></a>
                          </i></a>
                        </div>
                    </div>
                </div>
                <!-- /Work -->

                  <!-- Work -->
                <div class="col-md-4 col-xs-6 work"  style="border:1px solid #d0d0d0">
                    <img class="img-responsive" style="max-width: 450px; width:100%;height: 340px; "  src="{{asset('imagen/CONO 1.jpg')}}" alt="">
                    <div class="overlay"></div>
                    <div class="work-content">
                        <span><b> CONOS</b></span>
                        <h3>Cono Pequeño</h3>
                        <div class="work-link">
                            <a href="#"><i class="fa fa-list"></i></a>
                           </i></a>
                        </div>
                    </div>
                </div>
                <!-- /Work -->


                  <!-- Work -->
                <div class="col-md-4 col-xs-6 work"  style="border:1px solid #d0d0d0">
                    <img class="img-responsive" style="max-width: 450px; width:100%;height: 340px; "  src="{{asset('imagen/CONO 3.jpg')}}" alt="">
                    <div class="overlay"></div>
                    <div class="work-content">
                        <span><b> CONOS</b></span>
                        <h3>Cono Mediano</h3>
                        <div class="work-link">
                            <a href="#"><i class="fa fa-list"></i></a>
                           </i></a>
                        </div>
                    </div>
                </div>
                <!-- /Work -->


                  <!-- Work -->
                <div class="col-md-4 col-xs-6 work"  style="border:1px solid #d0d0d0">
                    <img class="img-responsive" style="max-width: 450px; width:100%;height: 340px; "  src="{{asset('imagen/CANASTILLASMALL.jpg')}}" alt="">
                    <div class="overlay"></div>
                    <div class="work-content">
                        <span><b> CANASTILLAS</b></span>
                        <h3>Canastilla Pequeña</h3>
                        <div class="work-link">
                            <a href="#"><i class="fa fa-list"></i></a>
                           </i></a>
                        </div>
                    </div>
                </div>
                <!-- /Work -->


                   <!-- Work -->
                <div class="col-md-4 col-xs-6 work"  style="border:1px solid #d0d0d0">
                    <img class="img-responsive" style="max-width: 450px; width:100%;height: 340px; "  src="{{asset('imagen/CANASTILLA BIG.jpg')}}" alt="">
                    <div class="overlay"></div>
                    <div class="work-content">
                        <span><b> CANASTILLAS</b></span>
                        <h3>Canastilla Grande</h3>
                        <div class="work-link">
                            <a href="#"><i class="fa fa-list"></i></a>
                           </i></a>
                        </div>
                    </div>
                </div>
                <!-- /Work -->


                    <!-- Work -->
                <div class="col-md-4 col-xs-6 work"  style="border:1px solid #d0d0d0">
                    <img class="img-responsive" style="max-width: 450px; width:100%;height: 340px; "  src="{{asset('imagen/BARQUILLOTRAD.jpg')}}" alt="">
                    <div class="overlay"></div>
                    <div class="work-content">
                        <span><b> BARQUILLOS</b></span>
                        <h3>Barquillo tradicional</h3>
                        <div class="work-link">
                            <a href="#"><i class="fa fa-list"></i></a>
                           </i></a>
                        </div>
                    </div>
                </div>
                <!-- /Work -->

                     <!-- Work -->
                <div class="col-md-4 col-xs-6 work"  style="border:1px solid #d0d0d0">
                    <img class="img-responsive" style="max-width: 450px; width:100%;height: 340px; "  src="{{asset('imagen/BARQUILLOESPE.jpg')}}" alt="">
                    <div class="overlay"></div>
                    <div class="work-content">
                        <span><b> BARQUILLOS</b></span>
                        <h3>Barquillo Especial</h3>
                        <div class="work-link">
                            <a href="#"><i class="fa fa-list"></i></a>
                           </i></a>
                        </div>
                    </div>
                </div>
                <!-- /Work -->


                    <!-- Work -->
                <div class="col-md-4 col-xs-6 work"  style="border:1px solid #d0d0d0">
                    <img class="img-responsive" style="max-width: 450px; width:100%;height: 340px; "  src="{{asset('imagen/OBLEAMINI.jpg')}}" alt="">
                    <div class="overlay"></div>
                    <div class="work-content">
                        <span><b> OBLEAS</b></span>
                        <h3>Oblea Mini</h3>
                        <div class="work-link">
                            <a href="#"><i class="fa fa-list"></i></a>
                           </i></a>
                        </div>
                    </div>
                </div>
                <!-- /Work -->


                    <!-- Work -->
                <div class="col-md-4 col-xs-6 work"  style="border:1px solid #d0d0d0">
                    <img class="img-responsive" style="max-width: 450px; width:100%;height: 340px; "  src="{{asset('imagen/OBLEAGRAN.jpg')}}" alt="">
                    <div class="overlay"></div>
                    <div class="work-content">
                        <span><b> OBLEAS</b></span>
                        <h3>Oblea Grande</h3>
                        <div class="work-link">
                            <a href="#"><i class="fa fa-list"></i></a>
                           </i></a>
                        </div>
                    </div>
                </div>
                <!-- /Work -->  <!-- /Work -->  <!-- /Work -->
  <!-- Work -->
                <div class="col-md-4 col-xs-6 work"  style="border:1px solid #d0d0d0">
                    <img class="img-responsive" style="max-width: 450px; width:100%;height: 340px; "  src="{{asset('imagen/GOLOCHIPS.jpg')}}" alt="">
                    <div class="overlay"></div>
                    <div class="work-content">
                        <span><b> ADEREZOS</b></span>
                        <h3>GOLOCHIPS</h3>
                        <div class="work-link">
                            <a href="#"><i class="fa fa-list"></i></a>
                           </i></a>
                        </div>
                    </div>
                </div>

                  <!-- Work -->
                <div class="col-md-4 col-xs-6 work"  style="border:1px solid #d0d0d0">
                    <img class="img-responsive" style="max-width: 450px; width:100%;height: 340px; "  src="{{asset('imagen/CHIPSCHOCO.jpg')}}" alt="">
                    <div class="overlay"></div>
                    <div class="work-content">
                        <span><b> ADEREZOS</b></span>
                        <h3>Chips de Chocolate</h3>
                        <div class="work-link">
                            <a href="#"><i class="fa fa-list"></i></a>
                           </i></a>
                        </div>
                    </div>
                </div>


                  <!-- Work -->
                <div class="col-md-4 col-xs-6 work"  style="border:1px solid #d0d0d0">
                    <img class="img-responsive" style="max-width: 450px; width:100%;height: 340px; "  src="{{asset('imagen/AREQUIPE.jpg')}}" alt="">
                    <div class="overlay"></div>
                    <div class="work-content">
                        <span><b> ADEREZOS</b></span>
                        <h3>Arequipe</h3>
                        <div class="work-link">
                            <a href="#"><i class="fa fa-list"></i></a>
                           </i></a>
                        </div>
                    </div>
                </div>


                  <!-- Work -->
                <div class="col-md-4 col-xs-6 work"  style="border:1px solid #d0d0d0">
                    <img class="img-responsive" style="max-width: 450px; width:100%;height: 340px; "  src="{{asset('imagen/LECHECONDEN.jpg')}}" alt="">
                    <div class="overlay"></div>
                    <div class="work-content">
                        <span><b> ADEREZOS</b></span>
                        <h3>Leche Condensada</h3>
                        <div class="work-link">
                            <a href="#"><i class="fa fa-list"></i></a>
                           </i></a>
                        </div>
                    </div>
                </div>


                  <!-- Work -->
                <div class="col-md-4 col-xs-6 work"  style="border:1px solid #d0d0d0">
                    <img class="img-responsive" style="max-width: 450px; width:100%;height: 340px; "  src="{{asset('imagen/SALSAS.jpg')}}" alt="">
                    <div class="overlay"></div>
                    <div class="work-content">
                        <span><b> ADEREZOS</b></span>
                        <h3>Salsas</h3>
                        <div class="work-link">
                            <a href="#"><i class="fa fa-list"></i></a>
                           </i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xs-6 col-md-offset-8 col-xs-offset-4 work">

                        <div class="pull-right">
                            <a href="" class="btn btn-info">
                                Ver Todos nuestros Productos
                            </a>
                        </div>
                </div>


            </div>
            <!-- /Row -->

        </div>
        <!-- /Container -->

    </div>
    <!-- /Portfolio -->

    <!-- Service -->
    <div id="service" class="section md-padding">

        <!-- Container -->
        <div class="container">

            <!-- Row -->
            <div class="row">

                <!-- Section header -->
                <div class="section-header text-center">
                    <h2 class="title">Nuestros Servicios</h2>
                </div>
                <!-- /Section header -->

                <!-- service -->
                <div class="col-md-4 col-sm-6">
                    <div class="service">
                        <i class="fa fa-laptop"></i>
                        <h3>Compras Online</h3>
                        <p>Con nuestra plataforma online podras realizar tus compras desde la comodida de tu hogar, trabajo o donde quieras que te encuentres!</p>
                    </div>
                </div>
                <!-- /service -->

                <!-- service -->
                <div class="col-md-4 col-sm-6">
                    <div class="service">
                        <i class="mdi mdi-account-box-outline"></i>
                        <h3>Progreso</h3>
                        <p>Podras ver el progreso de tu compra y status actual desde que haces el pedido hasta que es entregado</p>
                    </div>
                </div>
                <!-- /service -->

                <!-- service -->
                <div class="col-md-4 col-sm-6">
                    <div class="service">
                        <i class="fa fa-cogs"></i>
                        <h3>Observaciones</h3>
                        <p>Tu opinion es muy importante para nosotros, por ello podras realizar observaciones de nuestros servicios con el fin de mejorar, Animate has Tu Compra!..</p>
                    </div>
                </div>
                <!-- /service -->


            </div>
            <!-- /Row -->

        </div>
        <!-- /Container -->

    </div>
    <!-- /Service -->



    <!-- Contact -->
    <div id="contact" class="section md-padding">

        <!-- Container -->
        <div class="container">

            <!-- Row -->
            <div class="row">

                <!-- Section-header -->
                <div class="section-header text-center">
                    <h2 class="title">Contacto</h2>
                </div>
                <!-- /Section-header -->

                <!-- contact -->
                <div class="col-sm-4">
                    <div class="contact">
                        <i class="fa fa-phone"></i>
                        <h3>Telefonos: </h3>
                        <p>Telefono: +57 (1) 542 20 72</p>
                        <p>Celular: +57 315 229 6361</p>
                    </div>
                </div>
                <!-- /contact -->

                <!-- contact -->
                <div class="col-sm-4">
                    <div class="contact">
                        <i class="fa fa-envelope"></i>
                        <h3>Email</h3>
                        <p>ventasconosangie@gmail.com</p>
                    </div>
                </div>
                <!-- /contact -->

                <!-- contact -->
                <div class="col-sm-4">
                    <div class="contact">
                        <i class="fa fa-map-marker"></i>
                        <h3>Direccion: </h3>
                        <p>Carrera 107b # 70 - 65 Barrio Villas Del Dorado, Bogotá – Colombia</p>
                       
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="contact">
                        <i class="fa fa-reloj"></i>
                        <h3>Horarios de atencion: </h3>
                        <p>Lunes a viernes 8:00am a 5:00pm</p>
                        <p>Sabados 8:00am a 1:00pm</p>
                       
                    </div>
                </div>
                <!-- /contact -->


            </div>
            <!-- /Row -->

        </div>
        <!-- /Container -->

    </div>
    <!-- /Contact -->


    <!-- Footer -->
    <footer id="footer" class="sm-padding bg-dark">

        <!-- Container -->
        <div class="container">

            <!-- Row -->
            <div class="row">

                <div class="col-md-12">

                    <!-- footer logo -->
                    <div class="footer-logo" >
                        <a  ><img style=" height: 600px;"   class="img-circle"  src="{{asset('imagen/IMG.CA.png')}}" alt="logo"></a>
                    </div>
                    <!-- /footer logo -->

                    <!-- footer copyright -->
                    <div class="footer-copyright">
                        <p>Copyright © 2018. All Rights Reserved. <a href="" target="_blank">Conos Angie</a></p>
                    </div>
                    <!-- /footer copyright -->

                </div>

            </div>
            <!-- /Row -->

        </div>
        <!-- /Container -->

    </footer>
    <!-- /Footer -->

    <!-- Back to top -->
    <div id="back-to-top"></div>
    <!-- /Back to top -->

    <!-- Preloader -->
    <div id="preloader">
        <div class="preloader">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <!-- /Preloader -->

    <!-- jQuery Plugins -->
    <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.magnific-popup.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/main.js')}}"></script>

</body>

</html>
