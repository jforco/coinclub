@extends('plantillas.master1')

@section('titulo', 'Videos')

@section('body')
<div class="container">
	<div class="row">
		<br><br><br><br><br>
		@forelse($videos as $video)
		<div class="col-sm-6 col-md-4">
			<h5>{{ $video->nombre_video }}</h5>
			<iframe width="100%" height="300px;" src="{{ str_replace('watch?v=', 'embed/', $video->url) }}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
		</div>
		@empty
		<p>Visitamos en youtube.com</p>
		@endforelse
	</div>
</div>
@endsection