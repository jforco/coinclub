@extends('plantillas.master1')

@section('titulo', 'estamos trabajando')

@section('body')
<div>
	<br><br><br><br><br>
</div>
<div class="container-fluid">
	<h1 class="text-center">Estamos trabajando aun.</h1>
	<p class="text-center">Nuestros ingenieros estan trabajando arduamente para desarrollar estas funcionalidades en nuestra amplia plataforma. </p>
	<img class="img-responsive center-block" src="{{ asset('img/mantenimiento.jpeg') }}">
	<h2 class="text-center"><span>Ten paciencia! :3</span></h2>
</div>

@endsection
