<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CLV</title>
    <!-- Font awesome -->
    <link href="{{ URL::asset('assets/css/font-awesome.css')}}" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="{{ URL::asset('assets/css/bootstrap.css')}}" rel="stylesheet">
    <!-- Slick slider -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/slick.css')}}">
    <!-- Fancybox slider -->
    <link rel="stylesheet" href="{{ URL::asset('assets/css/jquery.fancybox.css')}}" type="text/css" media="screen" />
    <!-- Theme color -->
    <link id="switcher" href="{{ URL::asset('assets/css/theme-color/default-theme.css')}}" rel="stylesheet">

    <!-- Main style sheet -->
    <link href="{{ URL::asset('assets/css/style.css')}}" rel="stylesheet">


    <!-- Google Fonts -->
    <link href="{{ URL::asset('assets/css/Montserrat.css')}}" rel='stylesheet' type='text/css'>
    <link href="{{ URL::asset('assets/css/Roboto.css')}}" rel='stylesheet' type='text/css'>

    <link rel="shortcut icon" href="{{ URL::asset('assets/img/LOGO-icon.ico')}}" type="image/x-icon">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->



</head>
<body>


<!-- Start header  -->
<header id="mu-header">

    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="mu-header-area">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="mu-header-top-left">
                                <div class="mu-top-email">
                                    <i class="fa fa-envelope"></i>
                                    <span>{{$Settings->blog_email}}</span>
                                </div>
                                <div class="mu-top-phone">
                                    <i class="fa fa-phone"></i>
                                    <span>{{$Settings->other_Phone}}</span>
                                </div>
                                <div class="mu-top-phone">
                                    <i class="glyphicon glyphicon-phone"></i>
                                    <span >{{$Settings->phone_number}}</span>
                                </div>
                                <div class="mu-top-phone">
                                    <b>RIB:</b>
                                    <span >{{$Settings->RIB}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="mu-header-top-right">
                                <nav>
                                    <ul class="mu-top-social-nav">
                                        @if ($etuds)


                                                     <li class="dropdown">
                                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>{{$etuds->name}} {{$etuds->prenom}}</b> <span class="fa fa-angle-down"></span></a>
                                                            <ul class="dropdown-menu" role="menu">
                                                                <li><a href="{{ route('Etudiant.profil',['etud_id'=>$etuds->id]) }}">{{ __('Profil') }}</a></li><br>
                                                                <li><a href="{{ route('Etudiant.logout') }}">{{ __('Se déconnecter') }}</a></li>

                                                            </ul>
                                                        </li>
                                                    </td>


                                        @else
                                            <li><a href="{{route('login')}}"><b>Espace Enseignant</b> <span class="fa fa-users"></span></a></li>
                                            <a href="{{route('Etudiant.LoginEtudiant')}}"><b>Espace étudiant</b> <span class="fa fa-user"></span></a>
                                        @endif
                                    </ul>

                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
  <!-- End header  -->
  <!-- Start menu -->
  <section id="mu-menu">
    <nav class="navbar navbar-default" role="navigation">  
      <div class="container">
        <div class="navbar-header">
          <!-- LOGO -->              
          
          <!-- IMG BASED LOGO  -->
              <a class="navbar-brand" href=""><img src="{{ URL::asset('assets/img/LOGO-Pro.png')}}" alt="logo" height="50px" width="100px"></a>
            <a class="navbar-brand" href="{{ route('index')}}"><h2 style="color:#ab8e81; ">LEARNING </h2></a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
          <ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
            <li class="active"><a href="{{ route('index')}}">Accueil</a></li>   
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Matieres <span class="fa fa-angle-down"></span></a>
              <ul class="dropdown-menu" role="menu">
                @foreach($categories as $cat)
                <li><a href="{{ route('WebSite.matiere',['matiere_id'=>$cat->id]) }}">{{$cat->name}}</a></li>                
                @endforeach             
              </ul>
            </li>
              <li><a href="{{route('packs')}}">Packs</a></li>
              <li><a href="{{route('WebSite.live')}}">Cours en direct</a></li>
              <li><a href="{{route('utilisation')}}">Manuel d'utilisation</a></li>
              <li><a href="{{route('WebSite.contact')}}">Contact</a></li>

              @if ($etuds)
              <li><table class="table" style="margin-top: 10px;">
                      <tr class="warning">
                          <td>{{$etuds->solde}}&nbsp;&nbsp;&nbsp;  TND</td>
                          <td><a href="{{route('payement.code')}}"><span class="glyphicon glyphicon-plus"></span></a></td>
                      </tr></table></li>
@endif
           
          </ul> 
                            
        </div><!--/.nav-collapse -->        
      </div>     
    </nav>

  </section>
  <!-- End menu -->
  <!-- Start search box -->
  <div id="mu-search">
    <div class="mu-search-area">      
      <button class="mu-search-close"><span class="fa fa-close"></span></button>
      <div class="container">
        <div class="row">
          <div class="col-md-12">            
            <form class="mu-search-form">
              <input type="search" placeholder="Type Your Keyword(s) & Hit Enter">              
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End search box -->
  <!-- Start Slider -->
  <section id="mu-slider">
      <div class="mu-slider-single">
          <div class="mu-slider-img">
              <figure>
                  <img src="{{ URL::asset('assets/img/LOGO-Pro.png')}}" alt="img">
              </figure>
          </div>
      </div>
      <!-- Start single slider item -->
      <div class="mu-slider-single">
          <div class="mu-slider-img">
              <figure>
                  <img src="{{ URL::asset('assets/img/slider-img2.jpg')}}" alt="img">
              </figure>
          </div>
      </div>
      <!-- Start single slider item -->
      <!-- Start single slider item -->
    <div class="mu-slider-single">
      <div class="mu-slider-img">
        <figure>
          <img src="{{ URL::asset('assets/img/classe.jpg')}}" alt="img">
        </figure>
      </div>

    </div>
    <!-- Start single slider item -->
    <!-- Start single slider item -->
    <div class="mu-slider-single">
      <div class="mu-slider-img">
        <figure>
          <img src="{{ URL::asset('assets/img/mapall.jpg')}}" alt="img">
        </figure>
      </div>
    </div>
    <!-- Start single slider item -->

  </section>
  <!-- End Slider -->
  <!-- Start service  -->
  <section id="mu-service">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="mu-service-area">
            <!-- Start single service -->
            <div class="mu-service-single">
              <span class="fa fa-book"></span>
              <h3>Cours en ligne</h3>
              <p>Des cours des langues sont disponible en tous les niveaux</p>
            </div>
            <!-- Start single service -->
            <!-- Start single service -->
            <div class="mu-service-single">
              <span class="fa fa-users"></span>
              <h3>Nos enseignant</h3>
              <p>Nous avons des expert enseignant dans chaque langue disponible sur notre platform</p>
            </div>
            <!-- Start single service -->
            <!-- Start single service -->
            <div class="mu-service-single">
              <span class="fa fa-table"></span>
              <h3>Education en ligne</h3>
              <p>Des diffusions en direct par group pour chaque langue</p>
            </div>
            <!-- Start single service -->
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End service  -->

  <!-- Start about us -->
  <section id="mu-about-us">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-about-us-area">           
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <div class="mu-about-us-left">
                  <!-- Start Title -->

                    <h2>À PROPOS DE NOUS</h2>
<br><br><br>
                  <!-- End Title -->
                  <p class="text-justify"> CLV-Tunis est un centre de langues vivantes agrée par l’Etat, spécialisé dans l’apprentissage de la langue allemande français et anglais pour adultes et étudiants. Lancé en 2014, CLV-Tunis adopte une
                      nouvelle approche de formation orientée vers la pratique et l’interactivité entre formateurs et formés.</p>
                  <p></p>
                </div>
              </div>
              <div class="col-lg-6 col-md-6">
                  
                <video width="570" height="350" controls>
                <source src="{{ URL::asset('assets/vid/output_free.mp4')}}" type="video/mp4">
                </video>               
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End about us -->
<!-- End our teacher -->

 @extends('layouts.footer')

  <!-- jQuery library -->
  <script src="{{ URL::asset('assets/js/jquery.min.js')}}"></script>  
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="{{ URL::asset('assets/js/bootstrap.js')}}"></script>   
  <!-- Slick slider -->
  <script type="text/javascript" src="{{ URL::asset('assets/js/slick.js')}}"></script>
  <!-- Counter -->
  <script type="text/javascript" src="{{ URL::asset('assets/js/waypoints.js')}}"></script>
  <script type="text/javascript" src="{{ URL::asset('assets/js/jquery.counterup.js')}}"></script>  
  <!-- Mixit slider -->
  <script type="text/javascript" src="{{ URL::asset('assets/js/jquery.mixitup.js')}}"></script>
  <!-- Add fancyBox -->        
  <script type="text/javascript" src="{{ URL::asset('assets/js/jquery.fancybox.pack.js')}}"></script>
<script src="{{ URL::asset('assets/js/maxcdn.js')}}"></script>
<script src="{{ URL::asset('assets/js/maxcdn2.js')}}"></script>
  
  <!-- Custom js -->
  <script src="{{ URL::asset('assets/js/custom.js')}}"></script>

  </body>
</html>
