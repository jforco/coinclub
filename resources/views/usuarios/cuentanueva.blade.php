@extends('plantillas.master1')

@section('titulo', 'cuenta nueva')

@section('body')
<div>
	<br><br><br><br><br>
</div>
<div class="container-fluid">
	<h1 class="text-center">Felicidades!</h1>
	<p class="text-center">Tu cuenta ha sido creada.<br>Por favor, ve a tu email e ingresa al correo de confirmacion que te hemos enviado.</p>
	<h3>Revisa tambien tu filtro de Spam, si no lo encuentras en tu bandeja.</h3>
	<img class="img-responsive center-block" src="{{ asset('img/suscess.png') }}">
	<h2 class="text-center"><span>Gracias! :3</span></h2>
</div>

@endsection