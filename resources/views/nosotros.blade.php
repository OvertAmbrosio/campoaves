@extends('templates/template')

@section('navegacion')
    @include('navegacion.navegacion-interno')
@endsection

@section('cuerpo')
    <span class="ir-arriba fas fa-chevron-circle-up"></span>
    @include('nosotros.cuerpo-nosotros')

@endsection

@section('footer')
    @include('inicio.seccion-contacto')
@endsection

@section('script-local')
<script language="JavaScript" type="text/javascript" src="js/cuerpo_nosotros.js"></script>
<script language="JavaScript" type="text/javascript" src="js/slider_nosotros.js"></script>
<script language="JavaScript" type="text/javascript" src="js/menu_interno.js"></script>
<script language="JavaScript" type="text/javascript" src="js/jquery.fittext.js"></script>

<script>
  jQuery ( ".responsiveTexto" ).fitText(0.8);
</script>

@endsection
