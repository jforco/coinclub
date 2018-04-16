@extends('plantillas.master1')

@section('titulo', 'Registro')

@section('css')
<style>
	body{
		background-image:url({{ asset ('/img/registro.jpg') }});
		background-size: cover; 
	}
	.cuadro{
		background: rgba(0, 0, 0, .7);
	}
	.text-white{
		color: white;
	}

</style>
<script src='https://www.google.com/recaptcha/api.js'></script>
@endsection

@section('body')
<br><br><br><br>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-8 justify-content-end cuadro">
            <div class="">
				<div class="col-md-10">
					<h3 class="text-white ">Registrate</h3>
					<p class="text-white">Ingresa tus datos y se parte de nuestra Comunidad</p>
				</div>
				<div class="col-md-2">
					<br>
					<i class="fa fa-pencil fa-fw" style="font-size: 2em;"></i>
				</div>
			</div>
			<div style="padding-left: 1em; padding-right: 1em;">
				<form role="form" method="post" action="{{ url('/register') }}">
					 {{ csrf_field() }}
					<div class="form-group">
						<label for="nombre">Nombre</label>
						<input type="text" name="nombre" placeholder="Nombre..." class="form-control" id="nombre" required>
						</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" name="email" placeholder="Email..." class="form-control" id="email" required>
					</div>
					<div class="form-group">
						<label for="password">Contraseña</label>
						<input type="password" name="password" placeholder="Contraseña..." class=" form-control" id="password" required>
					</div>
					<div class="g-recaptcha" data-sitekey="6Lc87E0UAAAAAEpDqJ3tw2JFqOh98fsBnhsDqvo4" data-callback="enabledSubmit"></div><br>
					<button type="submit" name="enviar" class="btn">Registrame!</button>
					
				</form>
			</div>
			<br>	
        </div>
    </div>
</div>
<br>
@isset($mensaje)
<script type="text/javascript">
	alert('{{$mensaje}}');
</script>
@endif
@endsection
 
@section('javascript')
<script>
    function enabledSubmit(response) {
        //alert('activo!');
        document.getElementsByName('enviar')[0].disabled = false;
    }
</script>
@endsection
