@extends('templates/template')

@section('navegacion')
<style>
    .tituloAzul{
        justify-content: unset !important;
        text-align: unset !important;
    }
</style>
@include('navegacion/navegacion-interno')
@endsection

@section('id-body')
id="cuerpoBlog"
@endsection

@section('cuerpo')
{{-- LISTA DE CATEGORIAS --}}
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

{{-- -- LISTA DE ENTRADAS -- --}}
<div class="mb-5 row mt-5" id="entradas-blog">
        <h1 class="col-10 tituloAzul azul" style="justify-content: center !important;">Últimas Entradas</h1>
        <div class="card-columns col-10 mt-3">
            @foreach ($entradas as $entrada)
            <div class="card ">
                <div class="img-transform m-2 shadow rounded" style="height: 16rem;">
                @if ($entrada->imagen)
                    <img src="{{$entrada->imagen}}" class="card-img-top h-100 rounded" alt="Imagen Blog">
                @endif
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{$entrada->nombre}}</h5>
                    <p class="card-text fuente-3">{{$entrada->excerpt}}</p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('entrada', $entrada->slug) }}" class="card-link">Leer mas</a>
                </div>
            </div>
            @endforeach
        </div>
</div>
<div class="row mb-5 justify-content-center">
    {!!$entradas->onEachSide(1)->links()!!}
</div>
@endsection

@section('footer')
@include('inicio.seccion-contacto')
@endsection  

@section('script-local')
<script language="JavaScript" type="text/javascript" src="{{ asset('js/menu_interno.js') }}"></script>
<script language="JavaScript" type="text/javascript" src="{{ asset('js/cuerpo_blog.js') }}"></script>
@endsection 