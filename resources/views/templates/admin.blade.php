<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Panel de Control | Campoaves</title>

  <link rel="shortcut icon" href="{{ URL::asset('imagenes/icono.png') }}" />
  <meta name="csrf-token" content="{{csrf_token()}}">

  <link rel="stylesheet" href="/css/app.css">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
    </ul>
    <!-- SEARCH FORM -->
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" @keyup="searchit" v-model="search" type="search" placeholder="Buscar" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" @click="searchit">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div> 
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/ca-admin" class="brand-link">
      <img src="../img/logo.png" alt="Panel de Control Logo" class="brand-image img-circle elevation-3">
      <span class="brand-text font-weight-light">Panel de Control</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{'/img/perfil/'.Auth::user()->photo}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
            {{Auth::user()->name}}
            <p>{{Auth::user()->type}}</p>
          </a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
              <router-link to="/ca-admin/escritorio" append class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt blue"></i>
                  <p>
                  Escritorio
                  </p>
              </router-link>
          </li>
          <li class="nav-item">
              <router-link to="/ca-admin/mensaje" append class="nav-link">
                  <i class="nav-icon fas fa-envelope purple"></i>
                  <p>
                  Mensajes
                  </p>
              </router-link>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-thumbtack green"></i>
              <p>
                Entradas
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/ca-admin/lista-entradas" class="nav-link">
                  &nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-folder-plus nav-icon green"></i>
                  <p>Todas las entradas</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to="/ca-admin/mis-entradas" class="nav-link">
                  &nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-list-alt nav-icon green"></i>
                  <p>Mis entradas</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to="/ca-admin/categorias" class="nav-link">
                    &nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-th-large nav-icon green"></i>
                    <p>Categorias</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to="/ca-admin/etiquetas" class="nav-link">
                  &nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-tags nav-icon green"></i>
                  <p>Etiquetas</p>
                </router-link>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-cog cyan"></i>
              <p>
                Administracion
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/ca-admin/usuarios" class="nav-link">
                  &nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-users nav-icon cyan"></i>
                  <p>Usuarios</p>
                </router-link>
              </li>
            </ul>
          </li>
          @can('esAdministrador')
          <li class="nav-item">
            <router-link to="/ca-admin/desarrollador" class="nav-link">
              <i class="nav-icon fas fa-cogs orange"></i>
              <p>Desarrollador</p>
            </router-link>
          </li>
          @endcan
          <li class="nav-item">
            <router-link to="/ca-admin/perfil" append class="nav-link">
              <i class="nav-icon fas fa-user teal"></i>
              <p>Perfil</p>
            </router-link>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              <i class="nav-icon fa fa-power-off red"></i>
              <p>{{ __('Salir') }}</p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <router-view></router-view>
        <vue-progress-bar></vue-progress-bar>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      <a href="/">CampoAves.com</a>
    </div>
    <!-- Default to the left -->
    <strong>Hecho por <a >Overt Ambrosio</a> - </strong> Desarrollador web.
  </footer>
</div>
<!-- ./wrapper -->

@auth
<script>
  window.user = @json(auth() -> user());
</script>
@endauth

<script src="/js/app.js"></script>

</body>
</html>
