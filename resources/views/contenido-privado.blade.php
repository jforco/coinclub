@extends('plantillas.master1')

@section('titulo', 'Privado')

@section('body')
<div>
	<br><br><br><br><br>
</div>
<div class="container-fluid">
	<h1 class="text-center">Contenido Privado!</h1>
	<p class="text-center">Este contenido es solo para usuarios premium.</p>
	<p>Subscribete ahora a nuestra plataforma, y accede a este y mas contenido premium.<br><a href="{{ url('/Registro') }}">Registrate ya!</a></p>
</div>

@endsection