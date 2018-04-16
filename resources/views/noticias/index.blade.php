@extends('plantillas.master1')

@section('titulo', 'Noticias')

@section('css')
  <style type="text/css">
    #post {
      white-space:normal !important;
      word-wrap: break-word; 
    }
    body{
      background-color: rgba(12, 11, 11, 0.82); 
    }
    #noticia{
      background: white;
    }
    .back{
      background-color: #5FCF80;
      border-radius: 5px;
      color: #ffffff !important;
      border: 1px solid #5FCF80;
    }
    .back a:hover, .btn-trial a:focus{
      border: 1px solid #5FCF80;
      background-color: #fff;
      color: #5FCF80 !important;
    }
    .panel:hover{
      background-color: #e6e6e6;
    }

  </style>
@endsection

@section('body')

  <div class="container" id="noticia">
    <br><br><br><br>
    @forelse($posts as $post)

        <a class="btn btn-default col-md-4 col-sm-5" style="margin: 1em;" href="{{ url('/Noticias/'.$url.'/'.$post->slug) }}">
          <div class="panel">
            <img class="img-responsive" width="100%" src="{{ Voyager::image(str_replace('.jpg','-cropped.jpg', $post->image)) }}">
            <div class="text-justify" id="post">
              <h3>{{ $post->title }}</h3>
              <p>{{ substr($post->excerpt, 0, 130).'...' }}</p>
              <div class="back text-center"><strong>Ver mas</strong></div>
            </div>
          </div>    
        </a>
   
    @empty
    <br><br><br><br>
    <h3 class="text-center">Aun no hay noticias en esta seccion.  Espera a que generemos nuevo contenido!</h3>
    <br><br><br><br>
    @endforelse
    @guest
    <div class="row">
      <p class="text-center">Estas son solo las noticias p&uacuteblicas.<br><strong>Quieres ver mas?</strong><br>Subscribete a nuestra plataforma, y accede a contenido premium.<br><a href="{{ url('/Registro') }}"><h3 class="text-center">Registrate ya!</h3></a></p>
      <br><br><br><br>
    </div>
      
    @endguest
  </div>

  
  

@endsection
