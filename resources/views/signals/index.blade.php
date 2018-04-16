@extends('plantillas.master1')

@section('titulo', 'Señales')

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
    @forelse($signals as $signal)
          <div class="panel col-md-3">
            <div class="text-left" id="post">
              <h4>{{ $signal->nombre }}</h4>
              <p>{{ $signal->descripcion }}</p>
              <p>Moneda:{{ $signal->moneda }}</p>
              <p>Mercado:{{ $signal->mercado }}</p>
              <p>Entrada:{{ $signal->entrada }}</p>
              <p>Salida 1:{{ $signal->salida1 }}</p>
              <p>Salida 2:{{ $signal->salida2 }}</p>
              <p>Salida 3:{{ $signal->salida3 }}</p>
              <p>Stop:{{ $signal->stop }}</p>
              <!--<p>Estado de se���al:{{ $signal->estado }}</p>-->
              @if ($signal->estado === '1')
              <p style="color:blue">Estado de señal:Pendiente</p>
              @elseif ($signal->estado === '2')
              <p style="color:green">Estado de señal:Cumplida</p>
              @else
              <p style="color:red">Estado de señal:Perdida</p>
              @endif
              <p>% Ganancia esperada:{{ $signal->porcentaje }}</p>
              <p><small>Fecha Lanzamiento:{{ $signal->created_at }}</small> </p>
            </div>
          </div>    
        </a>
   
    @empty
    <br><br><br><br>
    <h3 class="text-center">Aun no hay Señales lanzadas.</h3>
    <br><br><br><br>
    @endforelse
  </div>

  
  

@endsection
