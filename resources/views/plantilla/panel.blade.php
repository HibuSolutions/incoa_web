<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="../public/favicon.ico">
  <meta name="description" content="HibuSolutions">
  <meta name="author" content="HibuSolutions">

  <title>INCOA PANEL</title>

  <!-- Custom fonts for this template-->
  <link href="{{asset('panel/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="{{asset('panel/vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('panel/css/sb-admin.css')}}" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">

</head>

<body id="page-top ">

  <nav class="navbar navbar-expand navbar-dark color static-top">

    <a class="navbar-brand mr-1" href="{{route('panelAdministrativo')}}">INCOA</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
<hr>
    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
                  @auth
                          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><img src="{{asset('img/ui/online.png')}}" width="10"> <i class="fa fa-user-o" ></i>

                {{ Auth::user()->name }} <span class="caret"></span>
            </a>
            
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();"><i class="fa fa-share" aria-hidden="true"></i>
            {{ __('Cerrar Sesion') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
            @endauth

            @guest
              
            @endguest
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav color">
          <li class="nav-item">
        <a class="nav-link" href="{{url('/')}}">
          <i class="fas fa-home"></i>
          <span>Inicio</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('panelAdministrativo')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Panel Administrativo</span>
        </a>
      </li>
     
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Secciones</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
        <a class="dropdown-item" href="{{route('usuarios')}}"><i class="fas fa-users"></i> Usuarios</a>
        <a class="dropdown-item" href="{{url('noticia')}}"><i class="far fa-newspaper"></i> Noticias</a>
        <a class="dropdown-item" href="{{url('aviso')}}"><i class="fas fa-flag"></i> Avisos</a>
        <a class="dropdown-item" href="{{route('reporte')}}"><i class="fas fa-bug"></i> Reportes</a>
        <a class="dropdown-item" href="login.html"><i class="fas fa-book"></i> Biblioteca</a>
        <a class="dropdown-item" href="login.html"><i class="fas fa-box-open"></i> Recursos</a>
        <a class="dropdown-item" href="login.html"><i class="fas fa-info-circle"></i> Informacion</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Desarrolladores</span></a>
      </li>

    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">


        @yield('container')

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © HibuSolutions Team 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('panel/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('panel/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('panel/js/demo/datatables-demo.js')}}"></script>
  <script src="{{asset('panel/vendor/datatables/jquery.dataTables.js')}}"></script>
  <script src="{{asset('panel/vendor/datatables/dataTables.bootstrap4.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('panel/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('panel/js/sb-admin.min.js')}}"></script>

</body>

</html>
