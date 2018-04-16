@extends('plantillas.master1')

@section('titulo', 'Noticias')

@section('css')
  <style type="text/css">
    body{
      background-color: rgba(12, 11, 11, 0.82); 
    }
    #noticia{
      background: white;
      padding-right: 2em;
      padding-left: 2em;
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
  </style>
@endsection

@section('body')
  <div class="container" >
    <br><br><br><br>
    <div class="row">
      <div class="col-md-8 col-md-offset-2" id="noticia">
        <a class="back fa fa-arrow-left" href="{{ url('/Noticias/'.$from) }}">Volver atras</a>
        <br>
        <h1 class="text-left">{{ $post->title }}</h1>
        <small style="color: rgb(150,150,150);">Publicado el {{ $fecha }}</small>
        <br>
        <img class="center-block" src="{{ Voyager::image( $post->image ) }}" style="width:80%;">
        <br>
        <div class="text-justify" style="color: rgb(70, 70, 70);">{!! $post->body !!}</div>
      </div>
    </div>
    <br>
  </div>

@endsection
