@extends('plantillas.master1')

@section('titulo', 'error codigo')

@section('body')
<div>
	<br><br><br><br><br>
</div>
<div class="container-fluid">
	<h1 class="text-center">Error en confirmacion de codigo!</h1>
	<p class="text-center">Este codigo no es valido para confirmar el codigo de ningun usuario... </p>
	<!--<img class="img-responsive center-block" src="{{ asset('img/mantenimiento.jpeg') }}">-->
	<br><br>
	<h2 class="text-center"><span>Si el error persiste, no dudes en comunicarte con nosotros!</span></h2>
</div>

@endsection