@extends('templates/template')

@section('token')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('estilo-adicional')
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
@endsection

@section('navegacion')
    @include('navegacion/navegacion-interno')
@endsection

@section('id-body')
id="cuerpoContacto"
@endsection

@section('cuerpo')
<div class="container"> 
    <div class="jumbotron jumbotron-fluid cuerpo-formulario mb-0">
        <div class="row tituloAzul">
            <p class="azul text-center mt-0">Contácto</p>
        </div>
        <div class="card-group col-12">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title tituloAzul2 fuente-2 font-weight-bold text-center">
                        <i class="fas fa-map-marker-alt"></i>&nbsp;Ubícanos
                    </h1>
                    <hr>
                    <p class="card-text">Lima:</p>
                    <p class="card-text text-muted">Jr. Los pollitos pio 123</p><br>
                    <p class="card-text">Puente Piedra:</p>
                    <p class="card-text text-muted">Av. Granjas el Pollon N° 456</p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title tituloAzul2 fuente-2 font-weight-bold text-center">
                        <i class="fas fa-phone"></i>&nbsp;Teléfonos
                    </h1>
                    <hr>
                    <p class="card-text">Pedidos:</p>
                    <h4 class="card-text fuente-3 text-muted">
                        <a href="tel:01 550 1111">01 550 1111 </a>/
                        <a href="tel:01 550 2222"> 01 550 2222</a>
                    </h4><br>
                    <p class="card-text">Atención al Cliente:</p>
                    <h4 class="card-text fuente-3 text-muted">
                        <a href="tel:+51 987 654 321">987 654 321</a>
                    </h4>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title tituloAzul2 fuente-2 font-weight-bold text-center">
                        <i class="fas fa-envelope"></i>&nbsp;Correos
                    </h1>
                    <hr>
                    <p class="card-text">Pedidos:</p>
                    <a href="mailto:ventas@campoaves.com">ventas@campoaves.com</a><br><br>
                    <p class="card-text">Atención al Cliente:</p>
                    <a href="mailto:gerencia@campoaves.com">gerencia@campoaves.com</a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title tituloAzul2 fuente-2 font-weight-bold text-center">
                        <i class="fas fa-clock"></i>&nbsp;Horarios
                    </h1>
                    <hr>
                    <p class="card-text">Lunes a Viernes:</p>
                    <p class="card-text text-muted">9:00 am - 5:00 pm</p>
                    <p class="card-text">Sábados y Domingos:</p>
                    <p class="card-text text-muted">9:00 am - 11:00 am</p>
                </div>
            </div>
        </div>
        {{-- FORMULARIO DE CONTACTO --}}
        <div class="col-8 offset-2 fuente-3 mt-3">
            <h1 class="card-title tituloAzul2 fuente-2 font-weight-bold text-center mt-5 mb-5">Escríbenos y nos pondremos en contacto</h1>
            <form method="POST" action="{{ route('contacto.store') }}">
                @csrf
                <div class="form-group">
                    <label for="">Nombre:</label>
                    <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{ old('nombre') }}" placeholder="Ingresar Nombre Completo" required>

                    @if ($errors->has('nombre'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('nombre') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Correo Electrónico:</label>
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="nombre@ejemplo.com" required>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Teléfono:</label>
                    <input id="telefono" type="number" class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" name="telefono" value="{{ old('telefono') }}" placeholder="Ingresar Número de Celular ó Teléfono Fijo" required>

                    @if ($errors->has('telefono'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('telefono') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Ubicación (opcional):</label>
                    <input id="ubicacion" type="text" class="form-control{{ $errors->has('ubicacion') ? ' is-invalid' : '' }}" name="ubicacion" value="{{ old('ubicacion') }}" placeholder="Ingresar Ubicación">

                    @if ($errors->has('ubicacion'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('ubicacion') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Asunto:</label>
                    <input id="asunto" type="text" class="form-control{{ $errors->has('asunto') ? ' is-invalid' : '' }}" name="asunto" value="{{ old('asunto') }}" placeholder="Ingresar Asunto" required>

                    @if ($errors->has('asunto'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('asunto') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('mensaje') ? ' is-invalid' : '' }}">
                  <label for="exampleFormControlTextarea1">Mensaje:</label>
                  <textarea class="form-control" id="mensaje" rows="3" name="mensaje" value="{{ old('mensaje') }}"></textarea>
                  @if ($errors->has('mensaje'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('mensaje') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>            
            </form>
        </div>
    </div>
</div>

<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d2682.653540928414!2d-77.1127363928839!3d-11.833811260638347!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2spe!4v1550283909057" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>

@endsection

@section('footer')
@include('inicio.seccion-contacto')
@endsection  

@section('script-local')
<script language="JavaScript" type="text/javascript" src="{{ asset('js/menu_interno.js') }}"></script>
<script language="JavaScript" type="text/javascript" src="{{ asset('js/cuerpo_blog.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js"></script>
<script>
toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-bottom-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "3000",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
</script>

@if (session('info'))
<script>
    $(document).ready(function() {
        toastr.success('{{session('info')}}');
    });
</script>
@endif

@if ($errors->any())
    @foreach ($errors->all() as $error)
    <script>
        $(document).ready(function() {
            toastr.error('{{ $error }}');
        });
    </script>
    @endforeach
@endif
@endsection 

