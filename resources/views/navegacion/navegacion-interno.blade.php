<nav id="menu_principal" class="navbar navbar-expand-lg navbar-inicial fixed-top navbar-activo">
  <div class="container">
    <a class="navbar-brand" href="/" id="seccion_0"><img src="{{ URL::asset('imagenes/logo.png') }}" id="logo" ></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
        <nav class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="/nosotros#quienes-somos" id="seccion_n" onclick="seccionActivo(this.id)">NOSOTROS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/productos" id="seccion_p" <!--onclick="seccionActivo(this.id)" -->PRODUCTOS</a> 
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/servicios#capacitacion-de-alimentacion-y-sanidad" id="seccion_s" <!--onclick="seccionActivo(this.id)" -->SERVICIOS</a> 
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/blog" id="seccion_b" <!--onclick="seccionActivo(this.id)" -->BLOG</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/contacto" id="seccion_c" <!--onclick="seccionActivo(this.id)" --> CONTACTO</a>
            </li>
          </ul>
        </nav>
  </div>
</nav>
