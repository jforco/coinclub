@extends('plantillas.master1')

@section('titulo', 'Foros')

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
    <br><br><br><br><br><br>
    <form role="form" method="post" action="{{ url('/Foro') }}">
      {{ csrf_field() }}
      <input type="text" name="nombre" placeholder="Nombre del foro" required="">
      <input type="submit" value="Nuevo foro">
    </form>
    
    @forelse($foros as $foro)

        <a class="btn btn-default col-md-4 col-sm-5" style="margin: 1em;" href="{{ url('/Foro/'.$foro->id) }}">
          <div class="panel">
            <div class="text-justify" id="post">
              <h3>{{ $foro->nombre }}</h3>
              <p>iniciado por {{ $foro->user->name }}</p>
              <p>{{ $foro->created_at }}</p>
              <p>Comentarios:{{ $foro->cantidad }}</p>
              <div class="back text-center"><strong>Ver Foro</strong></div>
            </div>
          </div>    
        </a>
   
    @empty
    <br><br><br><br>
    <h3 class="text-center">Aun no hay foros abiertos.</h3>
    <br><br><br><br>
    @endforelse

  </div>

  
  

@endsection
