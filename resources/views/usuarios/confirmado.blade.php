@extends('plantillas.master1')

@section('titulo', 'confirmado')

@section('body')
<div>
	<br><br><br><br><br>
</div>
<div class="container-fluid">
	<h1 class="text-center">Felicidades!</h1>
	<p class="text-center">Tu correo ha sido confirmado, y tu cuenta esta ACTIVA.<br> Por favor, inicia sesion para usar tu cuenta en nuestra plataforma. </p>
	<img class="img-responsive center-block" src="{{ asset('img/suscess.png') }}">
	<h2 class="text-center"><span>Gracias! :3</span></h2>
</div>

@endsection