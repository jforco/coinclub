@extends('plantillas.master1')

@section('titulo', 'Ver Foro')

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

  <div class="container">
    
    <div class="container" style="background-color: white;">
      <br><br><br><br>
      <div style="border-bottom : 1px solid #888; background-color: #eee" >
        <h3>{{ $foro->nombre }}</h3>
        <p>iniciado por {{ $foro->user->name }}</p>
        <p>{{ $foro->created_at }}</p>
        <p>Comentarios:{{ $foro->cantidad }}</p>
      </div>
        
        <br>
    @forelse($comentarios as $comentario)
        <div class="row" style="border-bottom : 1px solid #888; padding: 1em;">
          <div class="text-justify">
            <p>{{ $comentario->comentario }}</p>
            <p><small>{{ $comentario->created_at }} por {{ $comentario->user->name }}</small></p>
          </div>
        </div> 
    @empty 
    
    
    <br><br><br><br>
    <h3 class="text-center">Aun no hay comentarios en este foro.</h3>
    <br><br><br><br>
    @endforelse
    <form role="form" method="post" action="{{ url('/Foro/'.$foro->id) }}">
      <h4>Agregar comentario</h4>
      {{ csrf_field() }}
      <input type="text" name="comentario" placeholder="Comentario" required="">
      <input type="submit" value="Comentar">
    </form>
    <br>
    </div>
  </div>

  
  

@endsection
