@extends('templates/template')
@php
//paginas del directorio
$validar_url= 0;
$arreglo_prod = array("pollo-criollo", "pollo-frances", "gallina-roja", "pavo-blanco", "pato-criollo", "pekin", "huevo-rosado");
@endphp

@section('id-body')
//estilo para cambiar el fondo de la pagina
id="cuerpoProductos"
@endsection

@section('estilo-adicional')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css" />
@if(empty($producto) and empty($linea))
<!--estilo del full page-->
<link href="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.6.6/jquery.fullPage.css" rel="stylesheet"> 
@endif
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<![endif]-->
@endsection

@section('navegacion')
    @include('navegacion.navegacion-interno')
@endsection

@section('cuerpo')
    @if(!empty($producto))
        @include('productos.menu-interno-productos')
        @foreach($arreglo_prod as $link_prod)
            @if($link_prod==$producto)
                @include('productos.'.$link_prod)
                @php
                $validar_url=1;
                @endphp
                @break
            @endif
        @endforeach
        @if($validar_url==0)
            @include('productos.producto-error')
        @endif
    @elseif(empty($producto) and !empty($linea)) 
        <script type="text/javascript">document.location = "/productos";</script> 
    @else
        @include('productos.menu-cuerpo-productos')
        @include('productos.cuerpo-productos')
    @endif
@endsection

@section('footer')
    @include('inicio.seccion-contacto')
@endsection

@section('script-local')
@if(empty($producto) and empty($linea))
<!--script full page -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.6.6/jquery.fullPage.min.js"></script>
<!--script local -->
<script language="JavaScript" type="text/javascript" src="{{ URL::asset('js/cuerpo_productos.js') }}"></script>
@else
<!--script local -->
<script language="JavaScript" type="text/javascript" src="{{ URL::asset('js/cuerpo_interno_productos.js') }}"></script>
<!-- script de la galeria de imagenes -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
<script>
    baguetteBox.run('.compact-gallery',{animation:'slideIn'});
</script>
@endif
<script language="JavaScript" type="text/javascript" src="{{ URL::asset('js/menu_interno.js') }}"></script>
<script language="JavaScript" type="text/javascript" src="{{ URL::asset('js/jquery.fittext.js') }}"></script>
<script>
    jQuery( ".responsiveTexto" ).fitText(0.8);
</script>
@endsection



