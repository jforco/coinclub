@extends('plantillas.master1')

@section('titulo', 'Cursos')

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

  </style>
@endsection

@section('body')
  <div class="container" >
    <br><br><br><br>
    <div class="row">
      <div class="col-md-10 col-md-offset-1" id="noticia">
        <br>
        <h1 class="text-center">{{ $pagina->title }}</h1>
        <br>
        <div class="text-justify" style="color: rgb(70, 70, 70);">{!! $pagina->body !!}</div>
      </div>
    </div>
    <br>
  </div>

@endsection
