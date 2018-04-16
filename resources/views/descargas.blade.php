<!--
<div>
	<br><br><br><br><br>
</div>
<div class="container-fluid">
	<h1 class="text-center">Proyecto CoinClub</h1>
	<p class="text-center"><a href="{{ asset('/whitepaper_coinclub.pdf') }}" target="blank">Descargar</a></p>
	<br>
	<h1 class="text-center">Hoja de control de Trading</h1>
	<p class="text-center"><a href="{{ asset('/control-trading-diario.xlsx.xlsx') }}" target="blank">Descargar</a></p>
	<br><br><br><br><br>
</div>
-->
@extends('plantillas.master1')

@section('titulo', 'Descargas')

@section('body')
<div class="container">
	<div class="row">
		<br><br><br><br><br>
		@forelse($descargas as $descarga)
		<div class="col-sm-6 col-md-4">
			<h5>{{ $descarga->nombre }}</h5>
			<a href="{{ url('/Descarga/'.$descarga->id) }}">descarga</a>
		</div>
		@empty
		<p>Visitamos en youtube.com</p>
		@endforelse
	</div>
</div>
@endsection