<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title>@yield('titulo')</title>

  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Candal|Alegreya+Sans">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/imagehover.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
  <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" >
  @yield('css')
</head>

<body>
  <!--Navigation bar-->
 <nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ url('/') }}">
            <img height="70px" style="padding-left:10px;" src="{{ asset('img/Logomini2.jpeg')}}">
        </a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">Noticias<b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="{{ url('/Noticias/Noticias') }}">Noticias</a></li>
              <li><a href="{{ url('/Noticias/ICOs') }}">ICOs</a></li>
              <li><a href="{{ url('/Noticias/Analisis') }}">Analisis</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="">Academia<b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="{{ url('/Academia/Trading') }}">Curso de Trading</a></li>
              <li><a href="{{ url('/Academia/Mineria') }}">Curso de Mineria</a></li>
              <li><a href="{{ url('/Academia/Descargas') }}">Descargas</a></li>
            </ul>
          </li>
          <li><a href="{{ url('/Signals') }}">Señales</a></li>
          <li><a href="{{ url('/Foro') }}">Foro</a></li>
          <li><a href="{{ url('/Videos') }}">Videos</a></li>
          @auth
          <li class="dropdown btn-trial">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">{{ Auth::user()->name }}<b class="caret"></b></a>
            <ul class="dropdown-menu">
              
              <li><a href="{{ url('/Logout') }}">Cerrar Sesion</a></li>
            </ul>
          </li>
          @else
          <li><a href="{{ url('/Login') }}" >Iniciar Sesion</a></li>
          <li class="btn-trial"><a href="{{ url('Registro') }}">Registrate</a></li>
          @endauth
      </ul>
    </div>
  </div>
</nav> 
  
  <!--/ Navigation bar-->
  <!--Modal box
  <div class="modal fade" id="login" role="dialog">
    <div class="modal-dialog modal-sm">
  
      
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center form-title">Iniciar Sesion</h4>
        </div>
        <div class="modal-body padtrbl">

          <div class="login-box-body">
            <p class="login-box-msg">Ingresa a tu cuenta</p>
            <div class="form-group">
              <form name="" id="loginForm">
                <div class="form-group has-feedback">
                  
                  <input class="form-control" placeholder="Email" id="loginid" type="text" autocomplete="off" />
                  <span style="display:none;font-weight:bold; position:absolute;color: red;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginid"></span>
                 
                  <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                  
                  <input class="form-control" placeholder="Password" id="loginpsw" type="password" autocomplete="off" />
                  <span style="display:none;font-weight:bold; position:absolute;color: grey;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginpsw"></span>
                  
                  <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                  <div class="col-xs-12">
                    <div class="checkbox icheck">
                      <label>
                                <input type="checkbox" id="loginrem" > Recuerdame
                              </label>
                    </div>
                  </div>
                  <div class="col-xs-12">
                    <button type="button" class="btn btn-green btn-block btn-flat" onclick="userlogin()">Iniciar Sesion</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  -->
  <!--/ Modal box-->
  @yield('body')

   <!--Footer-->
  <footer id="footer" class="footer" style="padding: 0">
    <div class="container text-center">
      <ul class="social-links" style="padding: 0">
        <li><a href="https://www.facebook.com/CoinClubAcademia" target="_blank"><i class="fa fa-facebook fa-fw"></i></a></li>
        <li><a href="https://twitter.com/xCoinClub" target="_blank"><i class="fa fa-twitter fa-fw"></i></a></li>
        <li><a href="https://www.youtube.com/channel/UCUn2B1N7fJdD3jh1qMMEVng/videos" target="_blank"><i class="fa fa-youtube fa-fw"></i></a></li>
        <li><a href="https://api.whatsapp.com/send?phone=59173123711&text=Hola%20CoinClub,%20megustaria%20mas%20informacion%20acerca%20de%20sus%20servicios" target="_blank"><i class="fa fa-whatsapp fa-fw"></i></a></li>
        <li><a href="https://t.me/coinclubacademia" target="_blank"><i class="fa fa-telegram fa-fw"></i></a></li>
      </ul>
      ©2018 CoinClub. All rights reserved. Edited by FrC.
      <div class="credits">
        <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Mentor
        -->
        ©Mentor Theme, from <a href="https://bootstrapmade.com/">BootstrapMade.com</a>
      </div>
    </div>
  </footer>
  <!--/ Footer-->

  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <!--<script src="{{ asset('js/custom.js') }}"></script>
  <script src="{{ asset('contactform/contactform.js') }}"></script>-->
  @yield('javascript')
</body>

</html>

