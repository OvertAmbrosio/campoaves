@extends('templates/template')

@php
    \Date::setLocale('es');
    $n_dia = ucwords(Date::parse($entrada->created_at)->format('l'));
    $dia = Date::parse($entrada->created_at)->format('d');
    $mes = ucwords(Date::parse($entrada->created_at)->format('F'));
    $anio = Date::parse($entrada->created_at)->format('Y');
    $date = $n_dia.' '.$dia.' de '.$mes.' del '.$anio; 

    $fecha_entrada = $date; 
@endphp

@section('id-body')
id="cuerpoBlog"
@endsection

@section('navegacion')
<style>
    .tituloAzul{
        justify-content: unset !important;
        text-align: unset !important;
    }
</style>
@include('navegacion/navegacion-interno')
@endsection

@section('cuerpo')
{{-- MENU DE CATEGORIAS DE ENTRADAS --}}
<div id="cont-categorias">
    <nav class="navbar navbar-expand-lg fuente-3 mt-2" id="nav-categorias">
        <a class="navbar-brand text-t-1-4" id="p-categorias">Categorias</a>
        <button class="navbar-toggler" id="btn-categorias" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-angle-down i-categoria"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav flex-column" id="ul-categorias">
                <li class="nav-item" id="tituloNavCate">
                    <a class="nav-link text-t-2-1" href="{{ asset('blog') }}" style="color:#007bff;" >Categorias</a>
                    <hr class="hr-gr">
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="noticias" href="{{ asset('blog/categoria/noticias') }}">Noticias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="actualizaciones" href="{{ asset('blog/categoria/actualizaciones') }}">Actualizaciones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="recetas" href="{{ asset('blog/categoria/recetas') }}">Recetas</a>
                </li>
            </ul>
        </div>
    </nav>
</div>
{{-- SECCION ENTRADA --}}
<div class="container mt-5 mb-4 fuente-3">
    <div class="col-md-11 offset-md-1">
        <div class="card">
            <div class="card-header d-flex ">
                <div>
                    Categoria:
                    <a href="{{ route('categoria', $entrada->categoria->slug) }}">{{ $entrada->categoria->nombre}}</a>
                </div>
                <div class="ml-auto">
                    {{$fecha_entrada}}
                </div>
            </div>
            <div class="card-body">
                <h1 class="mb-3 azul" style="text-shadow: 1px 1px 1px rgba(0,0,0,0.2) !important;">{{ $entrada -> nombre }}</h1>
                <hr>
                @if ($entrada->imagen)
                <img src="{{$entrada->imagen}}" class="img-fluid mb-2" alt="imagen Campoblog">
                @endif
                @if ($entrada->excerpt)
                <p class="blockquote-footer font-italic mb-2 mt-2">{{$entrada->excerpt}}</p>
                <hr>
                @endif
                <h3>{!!$entrada->cuerpo!!}</h3>
            </div>
            <div class="card-footer d-flex">
                Etiquetas:&nbsp
                @foreach ($entrada->etiquetas as $etiqueta)
                <a href="{{ route('etiqueta', $etiqueta->slug) }}">
                    {{ $etiqueta->nombre }}
                </a>&nbsp&nbsp
                @endforeach
                <div class="ml-auto">
                    <a href="{{ route('blog') }}" class="btn btn-primary">Ver Más</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
@include('inicio.seccion-contacto')
@endsection  

@section('script-local')
<script language="JavaScript" type="text/javascript" src="{{ asset('js/menu_interno.js') }}"></script>
<script language="JavaScript" type="text/javascript" src="{{ asset('js/cuerpo_blog.js') }}"></script>
@endsection 