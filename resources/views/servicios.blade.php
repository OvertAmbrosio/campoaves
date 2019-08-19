@extends('templates/template')

@section('estilo-adicional')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css" />
@endsection

@section('navegacion')
    @include('navegacion.navegacion-interno')
@endsection

@section('cuerpo')
    @include('servicios.cuerpo-servicios')
@endsection

@section('footer')
    @include('inicio.seccion-contacto')
@endsection

@section('script-local')
<script language="JavaScript" type="text/javascript" src="{{ URL::asset('js/cuerpo_servicios.js') }}"></script>
<script language="JavaScript" type="text/javascript" src="{{ URL::asset('js/menu_interno.js') }}"></script>
<script language="JavaScript" type="text/javascript" src="{{ URL::asset('js/jquery.fittext.js') }}"></script>
<!-- script de la galeria de imagenes -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
<script>
    jQuery( ".responsiveTexto" ).fitText(0.8);
</script>
@endsection