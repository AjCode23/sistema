 <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a style="background: #781428;" href="index3.html" class="brand-link text-center">
      <b>3E</b> | SOFT
      
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="background: #fff; color: red !important">
      <!-- Sidebar user panel (optional) -->
    

      <!-- Sidebar Menu -->
      <nav class="mt-2" >
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

               @if(Auth::user()->cliente)
            <li class="nav-item">
                <a href="{{url('/')}}" class="nav-link ">
                  <i class="fa fa-home nav-icon"></i>
                  <p>Inicio</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{url('cliente/cotizaciones')}}" class="nav-link ">
                  <i class="fa fa-list nav-icon"></i>
                  <p>Cotizaciones</p>
                </a>
              </li>



              <li class="nav-item">
                <a href="{{url('cliente/facturas')}}" class="nav-link ">
                  <i class="fa fa-laptop nav-icon"></i>
                  <p>Facturas</p>
                </a>
              </li>


               <li class="nav-item">
                <a href="{{url('cliente/pedidos')}}" class="nav-link ">
                  <i class="mdi mdi-book nav-icon"></i>
                  <p>Pedidos</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{url('cliente/ordenes')}}" class="nav-link ">
                  <i class="fa fa-ticket-alt nav-icon"></i>
                  <p>Certificado</p>
                </a>
              </li>



              <li class="nav-item">
                <a href="{{url('cliente/ordenes')}}" class="nav-link ">
                  <i class="fa fa-question nav-icon"></i>
                  <p>Quejas y Reclamos</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{url('cliente/ordenes')}}" class="nav-link ">
                  <i class="mdi mdi-book-open nav-icon"></i>
                  <p>Encuestas</p>
                </a>
              </li>

               @else


          <li class="nav-item menu-open">
           
            <ul class="nav nav-treeview">

              <li class="nav-item" id="escritorio">
                <a href="{{url('/')}}" class="nav-link ">
                  <i class="fa fa-home nav-icon"></i>
                  <p>Panel de Mando</p>
                </a>
              </li>


               <li class="nav-item" id="ventas">
           <a href="#" class="nav-link">
              <i class="nav-icon mdi mdi-cart"></i>
              <p>
                Ventas
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="mdi mdi-share nav-icon"></i>
                  <p>
                    Cotizaciones
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{url('cotizaciones/create')}}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Nueva Cotizacion</p>
                    </a>
                  </li>

                   <li class="nav-item">
                    <a href="{{url('cotizaciones')}}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>List. Maestro de Cotizaciones</p>
                    </a>
                  </li>
                </ul>
              </li>



              <li class="nav-item" >
                <a href="#" class="nav-link">
                  <i class="mdi mdi-share nav-icon"></i>
                  <p>
                    Ordenes de Ventas
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{url('ordenes/create')}}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Nueva Orden de Venta</p>
                    </a>
                  </li>

                   <li class="nav-item">
                    <a href="{{url('ordenes')}}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>List. Maestro de O.V.</p>
                    </a>
                  </li>
                </ul>
              </li>


              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="mdi mdi-share nav-icon"></i>
                  <p>
                    Gestion de Clientes
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{url('clientes/create')}}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Creacion de Clientes</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{url('clientes')}}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>List. Maestro de Clientes</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{url('encuestas')}}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Encuestas de Satisfaccion</p>
                    </a>
                  </li>
                </ul>
              </li>


              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="mdi mdi-share nav-icon"></i>
                  <p>
                    Pronosticos y Estadisticas
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                </ul>
              </li>
             
            </ul>
          </li>



             
            
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cubes"></i>
              <p>
                Almacen
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

               <li class="nav-item">
                    <a href="{{url('almacen/ingresos')}}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Ingreso de Equipo</p>
                    </a>
                  </li>

                 <li class="nav-item">
                    <a href="{{url('almacen/inspecciones')}}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Inspección Inicial</p>
                    </a>
                  </li>


                  <li class="nav-item">
                    <a href="{{url('ordenes-trabajo')}}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Ordenes de Trabajo</p>
                    </a>
                  </li>



                  <li class="nav-item">
                    <a href="" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Control de Estanteria</p>
                    </a>
                  </li>


                  <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="mdi mdi-share nav-icon"></i>
                  <p>
                    Inventarios
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Equipos FLUKE</p>
                    </a>
                  </li>


                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Equipos de Calibración</p>
                    </a>
                  </li>
                </ul>
              </li>

                 


              <li class="nav-item">
                 <a href="{{url ('articulos')}}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                  <p>Articulos o Servicios</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{url('categorias')}}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                  <p>Categorias</p>
                </a>
              </li>



              <li class="nav-item">
                <a href="{{url('cubiculos')}}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                  <p>Cubiculos</p>
                </a>
              </li>


               <li class="nav-item">
                 <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                  <p>Indicadores</p>
                </a>
              </li>
              
            </ul>
          </li>







<!---------------------------------------------------------------------    --->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon mdi mdi-clipboard-plus"></i>
              <p>
                Laboratorio
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
             
             
            </ul>
          </li>



          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon mdi mdi-credit-card"></i>
              <p>
                Facturación
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
             <li class="nav-item">
                    <a href="{{url('facturaciones/')}}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Listado de Facturacion</p>
                    </a>
                  </li>
             
            </ul>
          </li>


     <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon mdi mdi-cart"></i>
              <p>
                Compras
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">


                  <li class="nav-item">
                    <a href="" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Solic. Clientes Internos</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Ordenes de Compras</p>
                    </a>
                  </li>



                  <li class="nav-item">
                    <a href="{{url('ordenes/compras')}}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Listado Ordenes de Compras</p>
                    </a>
                  </li>


                  <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="mdi mdi-share nav-icon"></i>
                  <p>
                    Evaluacion de Proveedores
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Equipos FLUKE</p>
                    </a>
                  </li>


                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Equipos de Calibración</p>
                    </a>
                  </li>
                </ul>
              </li>

              
             
            </ul>
          </li>




          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon mdi mdi-school"></i>
              <p>
                Gestión Humana
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
            </ul>
          </li>



           <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon mdi mdi-chart-line"></i>
              <p>
                Contabilidad
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
            </ul>
          </li>



         


          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Acceso
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('usuarios')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Usuarios</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('permisos')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Permisos</p>
                </a>
              </li>
             
            </ul>
          </li>



          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon mdi mdi-wrench"></i>
              <p>
                Configuración
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('general')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Datos Generales</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('comprobantes')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Comprobantes</p>
                </a>
              </li>
             
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="mdi mdi-help-circle nav-icon"></i>
              <p> Ayuda</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="mdi mdi-information nav-icon"></i>
              <p>Acerca de...</p>
            </a>
          </li>


         
               @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>