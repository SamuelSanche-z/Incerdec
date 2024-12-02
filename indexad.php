<?php

include ('conexion.php');
session_start();

if ($_SESSION['rol_id'] != '2'){
   header("location: indexcli.php");
   exit();
}

?>
<!DOCTYPE html>
<html lang="en">
   <head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- site metas -->
    <title>Incerde</title>
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="css/style2.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Other CSS -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <!-- Tweaks for older IEs-->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
   </head>
   <body class="main-layout">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="images/loading.gif" alt="#"/></div>
    </div>
    <!-- end loader -->
    <!-- header -->
    <header>
        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-3 col logo_section">
                        <div class="full">
                            <div class="center-desk">
                                <div class="logo">
                                    <a href="indexad.php"><img src="images/inlogo.png" alt="#" /></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10 offset-md-1">
                        <nav class="navigation navbar navbar-expand-md navbar-dark">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="indexad.php">Hogar</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="about.php">Servicios</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="gallery.php">Galeria </a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            USUARIO
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="perfil.php">PERFIL</a>
                                            <a class="dropdown-item" href="cerrar.php">CERRAR SESION</a>
                                        </div>
                                        <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            OPCIONES ADMIN
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="mostrar.php">VER USUARIOS</a>
                                            <a class="dropdown-item" href="mostrareservas.php">MOSTRAR RESERVAS</a>
                                            <a class="dropdown-item" href="insertcan.php">INSERTAR CANCHAS</a>
                                            <a class="dropdown-item" href="adcanchas.php">CANCHAS</a>
                                            <a class="dropdown-item" href="ingus.php">INSERTAR USUARIOS</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- end header -->

    <!-- banner -->
 <section class="banner_main">
        <div id="myCarousel" class="carousel slide banner" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container">
                        <div class="carousel-caption relative">
                            <div class="row">
                                <div class="col-md-4 col-md-6">
                                    <div class="text-bg">
                                        <h1>Cultura Recreacion <br>Y Deporte</h1>
                                        <span>El camino del bienestar</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
         </div>
      </section>
      <!-- end banner -->

        <!-- about -->
        <div id="about" class="about">
         <div class="container">
            <div class="row">
               <div class="col-md-5">
                  <div class="titlepage">
                     <h2>HISTORIA DEL <span class="green">INCERDE</span></h2>
                     <p>INCERDE, es la entidad que regula el deporte en el municipio de La Ceja y se muestra como una oportunidad para que la comunidad de esta zona de Antioquia, pueda a través  de las diferentes ofertas deportivas hacer uso de los espacios públicos para la practica del deporte en sus diferentes disciplinas. Para el año 2022 se inicia con una amplia oferta para la realización de actividad física, deportiva y recreativa de toda la comunidad cejeña. El Incerde cuenta con el personal idóneo para la atención de cada uno de los programas ofrecidos, obteniendo así un buen desarrollo y obtención de resultados para el municipio.</p>
                   
                  </div>
               </div>
               <div class="col-md-7">
                  <div class="about_img">
                     <figure><img src="images/about.jpg" alt="#"/></figure>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end about -->

      <!-- Averigua Nuestros Espacios -->
<section class="full-page-section">
    <div class="content-section">
        <h1>Averigua Nuestros Espacios</h1>
        <p>Conoce nuestras canchas y réntalas para tus eventos</p> <!-- Nuevo texto agregado -->
        <a href="renta.php" class="button">Explorar Más</a>
    </div>
</section>
<!-- end Averigua Nuestros Espacios -->

      <!--  service -->
      <div id="service" class="service">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Nuestros <span class="green">Servicios</span></h2>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-10 offset-md-1">
                  <div class="row">
                     <div class="col-md-4 col-sm-6">
                        <div class="service_box">
                           <i><img src="images/service1.jpg" alt="#"/></i>
                           <h3>FORMACION DEPORTIVA</h3>
                           <p>Programa de formacion en diversos deportes, <br>tanto como para niños,jovenes <br>y adultos</p>
                        </div>
                     </div>
                     <div class="col-md-4 offset-md-1 col-sm-6">
                        <div class="service_box">
                           <i><img src="images/service2.jpg" alt="#"/></i>
                           <h3>Gimnasia y actividades fitness</h3>
                           <p>Espacios destinados<br>a la actividad fisica,<br>como gimnasio <br>o clases de aeróbicos</p>
                        </div>
                     </div>
                     <div class="col-md-4 offset-md-3 col-sm-6 mar_top">
                        <div class="service_box">
                           <i><img src="images/service3.jpg" alt="#"/></i>
                           <h3>Eventos deportivos<br>y recreativos</h3>
                           <p>Organizacion de competencias,<br>torneos y eventos para <br>fomentar la participacio<br>de la comunidad</p>
                        </div>
                     </div>
                     <div class="col-md-4 offset-md-1 col-sm-6 mar_top">
                        <div class="service_box">
                           <i><img src="images/service4.jpg" alt="#"/></i>
                           <h3>Uso de instalaciones deportivas</h3>
                           <p>Alquilar el acceso a canchas,<br>y otros espacios para la practica de deportes</p>
                        </div>
                     </div>
                     <div class="col-md-12">
 
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end service -->
      <!-- gallery -->
      <div id="gallery"  class="gallery">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>LA UNIDAD <span class="green">DEPORTIVA</span></h2>
                     <p>Hay muchas variaciones de deportes y instalaciones deportivas disponibles, aqui te mostramos algunos deportes que manejamos </p>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-4 col-sm-6">
                  <div class="gallery_text">
                     <div class="galleryh3">
                     <h3>DEPORTES </h3>
                        <p>Futbol <br>
                           basquetbol <br>
                           atletismo <br>
                           voleibol
                        </p>
                     </div>
                  </div>
               </div>
               <div class="col-md-4 col-sm-6">
                  <div class="gallery_img">
                     <figure><img src="images/gallery1.png" alt="#"/></figure>
                  </div>
               </div>
               <div class="col-md-4 col-sm-6">
                  <div class="gallery_img">
                     <figure><img src="images/gallery2.png" alt="#"/></figure>
                  </div>
               </div>
               <div class="col-md-4 col-sm-6">
                  <div class="gallery_img">
                     <figure><img src="images/gallery3.png" alt="#"/></figure>
                  </div>
               </div>
               <div class="col-md-4 col-sm-6">
                  <div class="gallery_img">
                     <figure><img src="images/gallery4.png" alt="#"/></figure>
                  </div>
               </div>
               <div class="col-md-4 col-sm-6">
                  <div class="gallery_text">
                     <div class="galleryh3">
                        <h3>OTRAS COSAS MÁS</h3>
                        <p>Tambien nuestro incerde cuenta <br>
                           con otras instalaciones <br>
                            como lucha,taekwondo,gimnasia,entre<br>
                            otras mas...

                        </p>
                     </div>
                  </div>
               </div>
               <div class="col-md-4 col-sm-6">
                  <div class="gallery_text">
                     <div class="galleryh3">
                        <h3>COSAS QUE TIENE NUESTRA UNIDAD</h3>
                        <p>Nuestra unidad deportiva, cuenta <br>
                           con una pista de patinaje, <br>
                           tejo, tiro al arco  <br>
                           entre otras más...
                        </p>
                     </div>
                  </div>
               </div>
               <div class="col-md-4 col-sm-6">
                  <div class="gallery_img">
                     <figure><img src="images/gallery5.png" alt="#"/></figure>
                  </div>
               </div>
               <div class="col-md-4 col-sm-6">
                  <div class="gallery_img">
                     <figure><img src="images/gallery6.png" alt="#"/></figure>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end gallery -->
      <!-- design -->
      <div class="design">
         <div class="container-fluid">
            <div class="row d_flex">
               <div class="col-md-5">
                  <div id="design" class="carousel slide banner_design" data-ride="carousel">
                     <ol class="carousel-indicators">
                        <li data-target="#design" data-slide-to="0" class="active"></li>
                        <li data-target="#design" data-slide-to="1"></li>
                        <li data-target="#design" data-slide-to="2"></li>
                     </ol>
                     <div class="carousel-inner">
                        <div class="carousel-item active">
                           <div class="container">
                              <div class="carousel-caption relative">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="text_de">
                                          <div class="titlepage">
                                             <h2>UNIDAD <span class="green">DEPORTVA</span></h2>
                                          </div>
                                          <p>Aqui te mostramos una presentacion de nuestra unidad deportiva, donde se encuentra <br>la administracioon del incerde, prestamos de nuestros implementos y nuestras canchas de:<br> Futbol, Microfutbol, Patinaje, Tenis, voleibol,basquetbol, y muchas instalaciones mas...</p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
              
 
                     </div>
                  </div>
               </div>
               <div class="col-md-7 pad_roght0">
                  <div class="design_img">
                     <figure><img src="images/desi.png" alt="#"/></figure>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end design -->
      <!-- latest news -->
<div class="latest_news">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage">
                    <h2>Mira nuestras <span class="green">Ultimas noticias</span></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div id="new" class="news_box">
                    <div class="news_img">
                        <figure>
                            <img src="images/blog1.jpg" alt="#"/>
                        </figure>
                    </div>
                    <div class="news_room">
                        <h3>Facebook</h3>
                        <p>A continuación puedes ver nuestra página oficial en Facebook:</p>
                            <!-- Facebook SDK -->
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v21.0"></script>

<!-- Facebook Page Plugin -->
<div class="fb-page" data-href="https://web.facebook.com/INCERDE?_rdc=1&_rdr" 
     data-tabs="timeline" 
     data-width="500" 
     data-height="500" 
     data-small-header="false" 
     data-adapt-container-width="true" 
     data-hide-cover="false" 
     data-show-facepile="true">
    <blockquote cite="https://web.facebook.com/INCERDE?_rdc=1&_rdr" class="fb-xfbml-parse-ignore">
        <a href="https://web.facebook.com/INCERDE?_rdc=1&_rdr">INCERDE La Ceja</a>
    </blockquote>
</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end latest news -->
      <!-- testimonial -->
      <div id="testimonial" class="Testimonial">
         <div class="container-fluid">
            <div class="row d_flex">
               <div class="col-md-8 pad_left0">
                  <div id="testimon" class="carousel slide banner_testimonial" data-ride="carousel">
                     <ol class="carousel-indicators">
                        <li data-target="#testimon" data-slide-to="0" class="active"></li>
                        <li data-target="#testimon" data-slide-to="1"></li>
                        <li data-target="#testimon" data-slide-to="2"></li>
                     </ol>
                     <div class="carousel-inner">
                        <div class="carousel-item active">
                           <div class="container">
                              <div class="carousel-caption relative">
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="text_humai">
                                          <i><img src="images/tett1.png" alt="#"/></i>
                                          <span>HumouThere</span>
                                          <p>T suffered alteration in some form, by injected humouThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humou</p>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="text_humai">
                                          <i><img src="images/tett2.png" alt="#"/></i>
                                          <span>HumouThere</span>
                                          <p>T suffered alteration in some form, by injected humouThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humou</p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="carousel-item">
                           <div class="container">
                              <div class="carousel-caption relative">
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="text_humai">
                                          <i><img src="images/tett1.png" alt="#"/></i>
                                          <span>HumouThere</span>
                                          <p>T suffered alteration in some form, by injected humouThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humou</p>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="text_humai">
                                          <i><img src="images/tett2.png" alt="#"/></i>
                                          <span>HumouThere</span>
                                          <p>T suffered alteration in some form, by injected humouThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humou</p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="carousel-item">
                           <div class="container">
                              <div class="carousel-caption relative">
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="text_humai">
                                          <i><img src="images/tett1.png" alt="#"/></i>
                                          <span>HumouThere</span>
                                          <p>T suffered alteration in some form, by injected humouThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humou</p>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="text_humai">
                                          <i><img src="images/tett2.png" alt="#"/></i>
                                          <span>HumouThere</span>
                                          <p>T suffered alteration in some form, by injected humouThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humou</p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <a class="carousel-control-prev" href="#testimon" role="button" data-slide="prev">
                     <i class="fa fa-angle-left" aria-hidden="true"></i>
                     <span class="sr-only">Previous</span>
                     </a>
                     <a class="carousel-control-next" href="#testimon" role="button" data-slide="next">
                     <i class="fa fa-angle-right" aria-hidden="true"></i>
                     <span class="sr-only">Next</span>
                     </a>
                  </div>
               </div>
               <div class="col-md-4 ">
                  <div class="titlepage">
                     <h2>Administradores y gerentes</h2>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end design -->
      <!--  contact -->
      <div id="contact" class="contact">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Contactanos</h2>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-6">
                  <form id="request" class="main_form">
                     <div class="row">
                        <div class="col-md-12 ">
                           <input class="contactus" placeholder="Nombre" type="type" name="Nombre"> 
                        </div>
                        <div class="col-md-12">
                           <input class="contactus" placeholder="Email" type="type" name="Email"> 
                        </div>
                        <div class="col-md-12">
                           <input class="contactus" placeholder="Numero" type="type" name="Numero ">                          
                        </div>
                        <div class="col-md-12">
                           <textarea class="textarea" placeholder="Mensaje" type="type" Mensaje="mensaje">Mensaje</textarea>
                        </div>
                        <div class="col-md-12">
                           <button class="send_btn">Enviar</button>
                        </div>
                     </div>
                  </form>
               </div>
               <div class="col-md-6">
                  <div class="map_main">
                     <div class="map-responsive">
                     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7935.486651749024!2d-75.43858900666238!3d6.029923677121817!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e46975035977f1f%3A0x49039e2f623f6773!2sUnidad%20deportiva%20de%20La%20Ceja!5e0!3m2!1ses-419!2sco!4v1730984224160!5m2!1ses-419!2sco" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end contact -->
      <!--  footer -->
      <footer>
         <div class="footer">
            <div class="container">
               <div class="row">
                  <div class=" col-md-3 col-sm-6">
                     <ul class="social_icon">
                        <li><a href="https://www.facebook.com/INCERDE"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>

                        <li><a href="https://www.instagram.com/instituto_incerde/"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                     </ul>
                     <p class="variat pad_roght2">Por medio
                        de estas paginas web, puedes encontrar fotos, 
                        de nuestro incerde y nuestras diversidades de 
                        deportes
                     </p>
                  </div>
                  <div class=" col-md-3 col-sm-6">
                     <h3>LET US HELP YOU </h3>
                     <p  class="variat pad_roght2">There are many variat
                        ions of passages of L
                        orem Ipsum available
                        , but the majority h
                        ave suffered altera
                        tion in some form, by 
                     </p>
                  </div>
                  <div class="col-md-3 col-sm-6">
                     <h3>INFORMATION</h3>
                     <ul class="link_menu">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="about.html"> About</a></li>
                        <li><a href="service.html">Services</a></li>
                        <li><a href="gallery.html">Gallery</a></li>
                        <li><a href="testimonial.html">Testimonial</a></li>
                        <li><a href="contact.html">Contact Us</a></li>
                     </ul>
                  </div>
                  <div class="col-md-3 col-sm-6">
                     <h3>OUR Design</h3>
                     <p  class="variat">There are many variat
                        ions of passages of L
                        orem Ipsum available
                        , but the majority h
                        ave suffered altera
                        tion in some form, by 
                     </p>
                  </div>
                  <div class="col-md-6 offset-md-6">
                     <form id="hkh" class="bottom_form">
                        <input class="enter" placeholder="Enter your email" type="text" name="Enter your email">
                        <button class="sub_btn">subscribe</button>
                     </form>
                  </div>
               </div>
            </div>
            <div class="copyright">
               <div class="container">
                  <div class="row">
                     <div class="col-md-10 offset-md-1">
                        <p>© 2019 All Rights Reserved. Design by <a href="https://html.design/"> Free Html Templates</a></p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- end footer -->
      <!-- Javascript files-->
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
   </body>
</html>