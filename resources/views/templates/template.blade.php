<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie-edge">
	<!-- CSRF Token -->
	@yield('token')	
	<title>Campoaves - Avicola</title>
	
 	<link rel="shortcut icon" href="{{ URL::asset('imagenes/icono.png') }}" />
  
 	<!--iconos-->
 	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
 	<!--fuente-->
	<link href="https://fonts.googleapis.com/css?family=Cabin+Condensed|Handlee|Poppins:500" rel="stylesheet">
 	<!--estilo bootstrap-->
 	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
 	<!--mis estilos-->
 	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}">
	@yield('estilo-adicional')

</head>
<body @yield('id-body')>
<!--**************************** -->
<!-- NAVEGACION -->
@yield('navegacion')
<!-- CUERPO -->
@yield('cuerpo')
@yield('footer')

<!--**************************** -->
</body>

<!--links script-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
@yield('script-local')
</html>