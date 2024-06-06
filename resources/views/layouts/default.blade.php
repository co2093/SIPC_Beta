<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SIPC UES</title>
  <title>SIPC UES</title>

  <!-- Custom fonts for this template-->
  <link href="{{ asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="{{ asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/custom.css') }}" rel="stylesheet">



</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">

        </div>
        <div class="sidebar-brand-text mx-3">SIPC <sup>UES</sup></div>
      </a>
      <hr class="sidebar-divider my-0">
      <hr class="sidebar-divider">
    <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="#">
          <span>Inicio</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Perfil y Proyectos
      </div>
      <!-- Heading -->
      <div class="sidebar-heading">
        Perfil y Proyectos
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
          aria-controls="collapseTwo">
          <i class="fas fa-fw fa-user"></i>
          <span>Perfil</span>
        </a>

        @can('propuesta')
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Candidato:</h6>
            <a class="collapse-item" href="{{ route('formacionAcademica') }}">Propuesta</a>
          </div>
        </div>
        @endcan
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
          aria-controls="collapseTwo">
          <i class="fas fa-fw fa-user"></i>
          <span>Perfil</span>
        </a>

        @can('propuesta')
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Candidato:</h6>
            <a class="collapse-item" href="{{ route('formacionAcademica') }}">Propuesta</a>
          </div>
        </div>
        @endcan

        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Curriculum:</h6>
            @can('formacionAcademica')
            <a class="collapse-item" href="{{ route('formacionAcademica') }}">Formación Academica</a>
            @endcan
            <!-- <a class="collapse-item" href=" route('experienciaLaboral') ">Experiencia Laboral</a> -->
            @can('experienciaCientifica')
            <a class="collapse-item" href="{{ route('experienciaCientifica') }}">Experiencia Cientifica</a>
            @endcan
            @can('redInvestigador')
            <a class="collapse-item" href="{{ route('redInvestigador') }}">Red de Investigadores</a>
            @endcan
            @can('proyectos')
            <a class="collapse-item" href="{{ route('proyectoInvestigacion') }}">Proyectos de Investigacion</a>
            @endcan
            @can('otrasCompetencias')
            <a class="collapse-item" href="{{ route('otrasCompetencias') }}">Otras Competencias</a>
            @endcan
          </div>
        </div>

      </li>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Curriculum:</h6>
            @can('formacionAcademica')
            <a class="collapse-item" href="{{ route('formacionAcademica') }}">Formación Academica</a>
            @endcan
            <!-- <a class="collapse-item" href=" route('experienciaLaboral') ">Experiencia Laboral</a> -->
            @can('experienciaCientifica')
            <a class="collapse-item" href="{{ route('experienciaCientifica') }}">Experiencia Cientifica</a>
            @endcan
            @can('redInvestigador')
            <a class="collapse-item" href="{{ route('redInvestigador') }}">Red de Investigadores</a>
            @endcan
            @can('proyectos')
            <a class="collapse-item" href="{{ route('proyectoInvestigacion') }}">Proyectos de Investigacion</a>
            @endcan
            @can('otrasCompetencias')
            <a class="collapse-item" href="{{ route('otrasCompetencias') }}">Otras Competencias</a>
            @endcan
          </div>
        </div>

      </li>


      <!-- Heading -->
      @can('usuario')
      <div class="sidebar-heading">
        Usuarios
      </div>
      @endcan
      <!-- Nav Item - Pages Collapse Menu -->
      @can('role')
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRol" aria-expanded="true"
          aria-controls="collapseRol">
          <i class="fas fa-fw fa-user"></i>
          <span>Roles</span>
        </a>
        <div id="collapseRol" class="collapse" aria-labelledby="headingRol" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('userRol') }}">Usuarios</a>
            <a class="collapse-item" href="{{ route('roles.index') }}">Roles</a>
            <a class="collapse-item" href="{{ route('formacionAcademica') }}">Permisos</a>
          </div>
        </div>
      </li>
      @endcan
      <!-- Heading -->
      @can('usuario')
      <div class="sidebar-heading">
        Usuarios
      </div>
      @endcan
      <!-- Nav Item - Pages Collapse Menu -->
      @can('role')
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRol" aria-expanded="true"
          aria-controls="collapseRol">
          <i class="fas fa-fw fa-user"></i>
          <span>Roles</span>
        </a>
        <div id="collapseRol" class="collapse" aria-labelledby="headingRol" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('userRol') }}">Usuarios</a>
            <a class="collapse-item" href="{{ route('roles.index') }}">Roles</a>
            <a class="collapse-item" href="{{ route('formacionAcademica') }}">Permisos</a>
          </div>
        </div>
      </li>
      @endcan

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
          aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Proyectos</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Componentes:</h6>
            <a class="collapse-item" href="#">Registrar</a>
            <a class="collapse-item" href="#">Consultar</a>
            <a class="collapse-item" href="#">Otros</a>
          </div>
        </div>
      </li>
      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
          aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Proyectos</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Componentes:</h6>
            <a class="collapse-item" href="#">Registrar</a>
            <a class="collapse-item" href="#">Consultar</a>
            <a class="collapse-item" href="#">Otros</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
      <!-- Divider -->
      <hr class="sidebar-divider">

      <div class="sidebar-heading">
        Seguimiento
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
          aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Prueba</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Seguimiento:</h6>
            <a class="collapse-item" href="#">404</a>
            <a class="collapse-item" href="#">404</a>
            <a class="collapse-item" href="#">404</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Otros:</h6>
            <a class="collapse-item" href="#">404</a>
            <a class="collapse-item" href="#">404</a>
          </div>
        </div>
      </li>
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
          aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Prueba</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Seguimiento:</h6>
            <a class="collapse-item" href="#">404</a>
            <a class="collapse-item" href="#">404</a>
            <a class="collapse-item" href="#">404</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Otros:</h6>
            <a class="collapse-item" href="#">404</a>
            <a class="collapse-item" href="#">404</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Otros</span></a>
      </li>
      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Otros</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fas fa-fw fa-table"></i>
          <span>Otros</span></a>
      </li>      
      <hr class="sidebar-divider d-none d-md-block">
      <div class="sidebar-heading">
        Formularios
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCapacidades" aria-expanded="true"
          aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Capacidades Institucionales</span>
        </a>
        <div id="collapseCapacidades" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Indentificaci&oacute;n</h6>
            <a class="collapse-item" href="{{ route('unidadesDeInvestigacion.index') }}">Unidad de Investigaci&oacute;n</a>
            <a class="collapse-item" href="{{ route('dependenciaJerarquica.index') }}">Dependencia Jer&aacute;quica</a>
            <a class="collapse-item" href="{{ route('responsable.index') }}">Cat&aacute;logo de Responsables</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Tipo de Infraestructura</h6>
            <a class="collapse-item" href="{{route('homeInfraestructura')}}">Infraestructura</a>
            <a class="collapse-item" href="{{route('tpInfra')}}">Cat&aacute;logo de Infraestructura</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Actividades de Proyectos</h6>
            <a class="collapse-item" href="{{route('actProHome')}}">Cat&aacutelogo de Actividades</a>
          </div>
        </div>
      </li>
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInvest" aria-expanded="true"
          aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Investigadores, Docentes y Colaboradores</span>
        </a>
        <div id="collapseInvest" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Investigadores</h6>
            <a class="collapse-item" href="{{route('investHome')}}">Cat&aacute;logo de Investigadores</a>
          </div>
        </div>
      </li>
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseImasD" aria-expanded="true"
          aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Investigaci&oacute;n m&aacute;s Desarrollo</span>
        </a>
        <div id="collapseImasD" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Seguimiento:</h6>
            <a class="collapse-item" href="#">404</a>
            <a class="collapse-item" href="#">404</a>
            <a class="collapse-item" href="#">404</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Otros:</h6>
            <a class="collapse-item" href="#">404</a>
            <a class="collapse-item" href="#">404</a>
          </div>
        </div>
      </li>
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>



    </ul>
    <!-- End of Sidebar -->
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <!-- Topbar Search 
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>-->
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>

              <div class="topbar-divider d-none d-sm-block"></div>
              <div class="topbar-divider d-none d-sm-block"></div>

            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                <img class="img-profile rounded-circle" src="{{ asset('img/undraw_profile.svg') }}">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Perfil
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Notificaciones
                </a>

                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Salir
                </a>
              </div>
            </li>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Salir
                </a>
              </div>
            </li>

          </ul>
          </ul>

        </nav>
        <!-- End of Topbar -->
        </nav>
        <!-- End of Topbar -->

        @yield('content')
        @yield('content')

      </div>
      <!-- End of Main Content -->
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Secretaría de Investigaciones Científicas de la Universidad de El Salvador </span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->
    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->
  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Desea Salir?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Seleccione "Cerrar sesión" a continuación si está listo para finalizar su sesión actual.
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" data-toggle="modal" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>

        </div>
      </div>
    </div>
  </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
  <!-- Core plugin JavaScript-->
  <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
  <!-- Custom scripts for all pages-->
  <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

  <!-- Page level plugins -->
  <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
  <!-- Page level plugins -->
  <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
  <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>
  <script src="{{ asset('vendor/locaciones_unidades/locaciones_unidades.js') }}"></script>
</body>

</html>