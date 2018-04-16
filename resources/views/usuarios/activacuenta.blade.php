@extends('plantillas.master1')

@section('titulo', 'estamos trabajando')

@section('body')
<div>
	<br><br><br><br><br>
</div>
<div class="container-fluid">
	<h1 class="text-center">Tu cuenta no esta activada...</h1>
	<p class="text-center">Ingresa a tu email y entra al correo de confirmacion que te hemos mandado.</p>
	<h3>Revisa tambien tu filtro de Spam, si no lo encuentras en tu bandeja de entrada.</h3>
	<img class="img-responsive center-block" src="{{ asset('img/mantenimiento.jpeg') }}">
	<h2 class="text-center"><span>Confirma tu correo ya! :3</span></h2>
</div>

@endsection
