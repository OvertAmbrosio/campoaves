@extends('templates/template')

@section('navegacion')
    @include('navegacion.navegacion-inicio')
@endsection

@section('cuerpo')
    <div id="cuerpoInicio">
        @foreach(['header', 'nosotros', 'productos', 'servicios', 'blog'] as $s)
            @include('inicio.seccion-'.$s)
        @endforeach
    </div>
@endsection

@section('footer')
    @include('inicio.seccion-contacto')
@endsection

@section('script-local')
<script language="JavaScript" type="text/javascript" src="js/menu_principal.js"></script>
@endsection


