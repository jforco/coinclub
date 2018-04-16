@extends('plantillas.master1')

@section('titulo', 'CoinClub - Inicio')

@section('body')
  <!--Banner-->
  <div class="banner">
    <div class="bg-color">
      <div class="container">
        <div class="row">
          <div class="banner-text text-center">
            <div class="text-border">
              <h2 class="text-dec">CoinClub</h2>
            </div>
            <div class="intro-para text-center quote">
              <p class="big-text">Aprendiendo hoy, Ganando mañana.</p>
              <p class="small-text">Aprende con nosotros como moverte en este nuevo mercado.<br>Aprende a tradear como los grandes!.</p>
              <a href="https://t.me/coinclubacademia" class="btn get-quote">Únete a nuestra comunidad en <i class="fa fa-telegram" style="color:#0088cc;"></i>Telegram</a>
              <a href="{{ asset('/Registro') }}" class="btn get-quote">Registrate</a>
            </div>
            <a href="#footer" class="mouse-hover">
              <div class="mouse"></div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Banner-->
  <!--Feature-->
  <section id="feature" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="header-section text-center">
          <h2>Que ofrecemos</h2>
          <p>Tenemos todo lo que necesitas para iniciarte en el mundo del Trading
          </p>
          <hr class="bottom-line">
        </div>
        <div class="feature-info">
          <div class="fea">
            <div class="col-md-3">
              <div class="heading pull-right">
                <h4>Academia de Trading Online</h4>
                <p>Academia de CriptoTrading Online, de 3 meses de duración</p>
              </div>
              <div class="fea-img pull-left">
                <i class="fa fa-area-chart"></i>
              </div>
            </div>
          </div>
          <div class="fea">
            <div class="col-md-3">
              <div class="heading pull-right">
                <h4>Academia de Mineria</h4>
                <p>Donde te enseñamos a iniciarte en la miner&iacutea de CriptoMonedas</p>
              </div>
              <div class="fea-img pull-left">
                <i class="fa fa-university"></i>
              </div>
            </div>
          </div>
          <div class="fea">
            <div class="col-md-3">
              <div class="heading pull-right">
                <h4>Señales de Criptomonedas</h4>
                <p>Señales enviadas en tiempo real con grandes posibilidades de ganancias.</p>
              </div>
              <div class="fea-img pull-left">
                <i class="fa fa-bar-chart"></i>
              </div>
            </div>
          </div>
          <div class="fea">
            <div class="col-md-3">
              <div class="heading pull-right">
                <h4>WEB &amp BLOG</h4>
                <p>Manejamos información actualizada y oportuna sobre oportunidades de inversión en cripto-divisas.</p>
              </div>
              <div class="fea-img pull-left">
                <i class="fa fa-chrome"></i>
              </div>
            </div>
          </div>
          <div class="fea">
            <div class="col-md-3">
              <div class="heading pull-right">
                <h4>APP para dispositivos móviles</h4>
                <p>App para revisar el contenido de nuestra Web y notificarte con alertas y señales.</p>
              </div>
              <div class="fea-img pull-left">
                <i class="fa fa-android"></i>
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </section>
  <!--/ feature-->
  <section style="background-color: black;">
    <div class="container">
      <div class="text-center"><h1 class="text-white">Gana con nuestras señales</h1></div>
      <div class="row">
        
        <div class="col-md-6">
          <div class="container">
            <h2 class="text-white">Señales del mes de {{ $mes }}</h2>

            <!-- Trigger the modal with a button -->
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal2">Ver estadisticas de Señales</button>

            <!-- Modal -->
            <div id="myModal2" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Señales del mes de {{ $mes }}</h4>
                  </div>
                  <div class="modal-body">
                    <table class="tabla">
                      <tbody>
                        <tr>
                          <td>Señales Enviadas:</td>
                          <td>{{ $MesCant }}</td>
                        </tr>
                        <tr>
                          <td>Señales Cumplidas:</td>
                          <td>{{ $MesActivas }}</td>
                        </tr>
                        <tr>
                          <td>Señales Pendientes:</td>
                          <td>{{ $MesPendientes }}</td>
                        </tr>
                        <tr>
                          <td>Señales Perdidas:</td>
                          <td>{{ $MesPerdidas }}</td>
                        </tr>
                        <tr>
                          <td><strong>Porcentaje de Ganancia:</strong></td>
                          <td><strong>{{ $porcMes }}%</strong></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a href="{{ url('/Signals') }}"><button type="button" class="btn btn-default">Ver las Señales enviadas</button></a>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="container">
            <h2 class="text-white">Señales del Mes Actual</h2>
            
            <!-- Trigger the modal with a button -->
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal1">Ver estadisticas de Señales</button>

            <!-- Modal -->
            <div id="myModal1" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Señales del Mes Actual</h4>
                  </div>
                  <div class="modal-body">
                    <table class="tabla">
                      <tbody>
                        <tr>
                          <td>Señales Enviadas:</td>
                          <td>{{ $MesActualCant }}</td>
                        </tr>
                        <tr>
                          <td>Señales Cumplidas:</td>
                          <td>{{ $MesActualActivas }}</td>
                        </tr>
                        <tr>
                          <td>Señales Pendientes:</td>
                          <td>{{ $MesActualPendientes }}</td>
                        </tr>
                        <tr>
                          <td>Señales Perdidas:</td>
                          <td>{{ $MesActualPerdidas }}</td>
                        </tr>
                        <tr>
                          <td><strong>Porcentaje de Ganancia:</strong></td>
                          <td><strong>{{ $porcMesActual }}%</strong></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
        
        
        
        
      </div>
    </div>
    <br>
  </section>


  <!--Organisations-->
  <section id="organisations" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-5 pull-left">
          <div class="detail-info">
            <hgroup>
              <h3 class="det-txt"> Que es CoinClub?</h3>
            </hgroup>
            <p class="det-p text-justify">Coinclub nace el 10 de Febrero del 2017, en la ciudad de Santa Cruz de la Sierra, Bolivia, como una academia de Criptotrading que visualiza las grandes oportunidades que brinda la nueva economía digital emergente. Desde la creación de la academia se viene realizando programas de capacitación, vía online y presencial, que ha logrado impactar de manera positiva la actividad comercial de nuestros estudiantes en diferentes países que en sus inicios carecían del conocimiento suficiente para realizar un “trading”. En este entendido confirmamos la necesidad de concretar este proyecto ya que proporciona las herramientas y desarrollo de habilidades suficientes para lograr un mejor análisis al momento de hacer inversiones. </p>
          </div>
        </div>
        <div class="col-md-7 pull-right">
          <img class="img-responsive img-thumbnail img-rounded img-fluid" alt="" src="{{ asset('/img/Logo.jpg') }}">
        </div>
      </div>
    </div>
  </section>
  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="detail-info">
            <hgroup>
              <h3 class="det-txt">Proyecto CoinClub</h3>
            </hgroup>
            <p class="det-p text-justify">Nosotros sabemos que el mercado digital brinda oportunidad y como cualquier inversión tiene su nivel de riesgo por lo tanto en ningún momento nosotros (CoinClub) alentamos o fomentamos ni damos consejos sobre inversiones. En este sentido no tenemos ningún tipo de responsabilidad por posibles pérdidas que puedan tener nuestros usuarios. CoinClub maneja una comunidad con bastante aceptación en Redes Sociales. Tenemos el canal de TELEGRAM, donde enviamos señales de Trading con el objetivo de lograr una rentabilidad para nuestros usuarios en los exchangers mas utilizados como bittrex y poloniex. Dichas señales son analizadas meticulosamente por nuestro equipo profesional de traders preparados para este tipo de operaciones. Ahora pretendemos desarrollar la plataforma WEB y la APP para dispositivos móviles para que nuestras señales puedan notificar de forma más oportuna a nuestros suscriptores. </p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <img class="img-responsive img-thumbnail img-rounded" src="{{ asset('/img/roadmap-cc.jpg') }}">
        </div>
        
      </div>
    </div>
    <br>
  </section>
  <!--/ Organisations-->


  <!--Courses-->
  <section id="testimonial" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="header-section text-center">
          <h2 class="white">Testimonios</h2>
          <p class="white">Que opinan de nosotros los que ya han pasado por nuestra academia</p>
          <hr class="bottom-line bg-white">
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-6 padleft-right">
          <figure class="imghvr-fold-up">
            <img src="img/course01.jpg" class="img-responsive">
            <h3 class="text-center">Abdiel Patiño</h3>
            <figcaption>
              <p class="text-justify">"Investigando un poco llegué a los videos de coinclub en Youtube, de todos los canales que he visto, la explicación del equipo de coinclub son las que me han facilitado el aprendizaje de trading y los conceptos que manejan, a su vez las alertas, un 90% me han hecho ganar mínimo un 5% por operación hasta 30%"</p>
            </figcaption>
          </figure>
        </div>
        <div class="col-md-4 col-sm-6 padleft-right">
          <figure class="imghvr-fold-up">
            <img src="img/course05.jpg" class="img-responsive">
            <h3 class="text-center">Pedro Casta</h3>
            <figcaption>
              <p class="text-justify">"Bueno puedo decir que las señales son muy buenas. He estado en varios grupos y las señales de COINCLUB son las mejores. Muy buena atención, Diría que casi personalizada. Las personas que forman el grupo son excelentes personas y muy amables. Puedo decir que por fin me siento instruido de una manera correcta ... Gracias COINCLUB."</p>
            </figcaption>
          </figure>
        </div>
        <div class="col-md-4 col-sm-6 padleft-right">
          <figure class="imghvr-fold-up">
            <img src="img/course08.jpg" class="img-responsive">
            <h3 class="text-center">Raul Pujante</h3>
            <figcaption>
              <p class="text-justify">"Comencé hace unos dias en el mundo del trading, en este poco tiempo puedo asegurar que sus señales han sido muy fiables y personalmente estoy muy contento tanto por las señales como por el trato que nos dan y por el ambiente del grupo. Felicitaciones"</p>
            </figcaption>
          </figure>
        </div>
        <div class="col-md-4 col-sm-6 padleft-right">
          <figure class="imghvr-fold-up">
            <img src="img/course01.jpg" class="img-responsive">
            <h3 class="text-center">Jesus Casas</h3>
            <figcaption>
              <p class="text-justify" style="font-size: 12px">"Empece a investigar sobre el trading en criptomonedas porque lei que mucha gente vive de esto...buscando tutoriales llegue al canal COINCLUB de youtube...empece a mirar uno x uno los videos y tomar apuntes. Luego de cada video me metia en bittrex a analizar graficas, primero mirando las anotaciones y luego de memoria. Asi empece hace 2 semanas y hoy gracias a los videos y el curso puedo decir que aprendi. Si bien todo es dependiente del mercado...el material de los videos del canal es excelente. Vengo teniendo resultados maravillosos y hasta consegui un trabajo de esto. 
            Saludos desde Argentina."</p>
            </figcaption>
          </figure>
        </div>
        <div class="col-md-4 col-sm-6 padleft-right">
          <figure class="imghvr-fold-up">
            <img src="img/course05.jpg" class="img-responsive">
            <h3 class="text-center">Diego Arias</h3>
            <figcaption>
              <p class="text-justify" style="font-size: 12px">"Las señales que mandan día a día, la verdad que han sido muy certeras, logicamente juega la paciencia y el no desesperarse ante cualquier bajada, ya que es algo muy normal en este tipo de mercado, y gracias a los consejos que nos dan día a día sobre estos temas, me han ayudado a subir bastante mi capital, gracias a los consejos de CoinClub y las advertencias que nos dan muchas veces cuando hacemos algo impulsivamente, sigan así con esa gran calidad de contenido!!"</p>
            </figcaption>
          </figure>
        </div>

      </div>
    </div>
  </section>
  <!--/ Courses-->

  <!--Faculity member-->
  <section id="faculity-member" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="header-section text-center">
          <h1>Equipo Coinclub</h1>
          <p>Conoce el equipo de profesionales que te ayudará a incursionar en el mundo del CriptoTrading,<br> y no morir en el intento.</p>
          <h2>Equipo Fundador</h2>
          <hr class="bottom-line">
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="pm-staff-profile-container">
            <div class="pm-staff-profile-image-wrapper text-center">
              <div class="pm-staff-profile-image">
                <img src="img/persona2.jpg" alt="" class="img-thumbnail img-circle" />
              </div>
            </div>
            <div class="pm-staff-profile-details text-center">
              <p class="pm-staff-profile-name">Gonzalo</p>
              <p class="pm-staff-profile-title">CEO Fundador y Master Trade de CoinClub</p>
              <p class="pm-staff-profile-bio">Actualmente es formador de nuevos tradres en la Academia.   Ing. de Sistemas, músico y guitarrista clásico con amplia experiencia en marketing.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="pm-staff-profile-container">
            <div class="pm-staff-profile-image-wrapper text-center">
              <div class="pm-staff-profile-image">
                <img src="img/persona6.jpg" alt="" class="img-thumbnail img-circle" />
              </div>
            </div>
            <div class="pm-staff-profile-details text-center">
              <p class="pm-staff-profile-name">Moira</p>
              <p class="pm-staff-profile-title">Administradora CoinClub</p>
              <p class="pm-staff-profile-bio">Licenciada en Ciencias de la Comunicacion y tecnico medio en Danza y artes escenicas.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="pm-staff-profile-container">
            <div class="pm-staff-profile-image-wrapper text-center">
              <div class="pm-staff-profile-image">
                <img src="img/persona2.jpg" alt="" class="img-thumbnail img-circle" />
              </div>
            </div>
            <div class="pm-staff-profile-details text-center">
              <p class="pm-staff-profile-name">Fabio</p>
              <p class="pm-staff-profile-title">Jefe Investigacion y comunicación en Coinclub</p>
              <p class="pm-staff-profile-bio">Técnico superior en inglés. Dictó clases en unidades educativas, institutos y universidades.
              Investigador en seguridad e innovaciones tecnológicas digitales.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="pm-staff-profile-container">
            <div class="pm-staff-profile-image-wrapper text-center">
              <div class="pm-staff-profile-image">
                <img src="img/persona2.jpg" alt="" class="img-thumbnail img-circle" />
              </div>
            </div>
            <div class="pm-staff-profile-details text-center">
              <p class="pm-staff-profile-name">Claudio</p>
              <p class="pm-staff-profile-title">Master Trade de Coinclub</p>
              <p class="pm-staff-profile-bio">Sus analisis lo convierten en un trader sumamente exacto en el momento de invertir en los mercados.</p>
            </div>
          </div>
        </div>
        
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="pm-staff-profile-container">
            <div class="pm-staff-profile-image-wrapper text-center">
              <div class="pm-staff-profile-image">
                <img src="img/persona2.jpg" alt="" class="img-thumbnail img-circle" />
              </div>
            </div>
            <div class="pm-staff-profile-details text-center">
              <p class="pm-staff-profile-name">Luis</p>
              <p class="pm-staff-profile-title">Desarrollador de software CoinClub</p>
              <p class="pm-staff-profile-bio">Ingeniero de Sistemas,con estudios de postgrado en Seguridad Informática. Con mas de 10 años de experiencia Profesional, apasionado por las nuevas tecnologías. Actualmente dedicándose al desarrollo e implementan de nuevas herramientas tecnológicas.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="pm-staff-profile-container">
            <div class="pm-staff-profile-image-wrapper text-center">
              <div class="pm-staff-profile-image">
                <img src="img/persona2.jpg" alt="" class="img-thumbnail img-circle" />
              </div>
            </div>
            <div class="pm-staff-profile-details text-center">
              <p class="pm-staff-profile-name">Hector Gomez</p>
              <p class="pm-staff-profile-title">Empresario y emprendedor venezolano</p>
              <p class="pm-staff-profile-bio">Cuenta con dos años de experiencia en la industria minera, cyberfanatico.</p>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </section>
  <!--/ Faculity member-->

 
@endsection