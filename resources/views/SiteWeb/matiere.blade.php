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

    <script src="{{ URL::asset('assets/js/maxcdn.js')}}"></script>
    <script src="{{ URL::asset('assets/js/maxcdn2.js')}}"></script>
    <script>
        function Fermer() {
            location.reload();
        }
    </script>
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

 <!-- Page breadcrumb -->
 <section id="mu-page-breadcrumb">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-page-breadcrumb-area">
           <h2> {{$mats->name}}</h2>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- End breadcrumb -->
 <section id="mu-course-content">
   <div class="container">
     <div class="row">
       <div class="col-md-12">

           <div class="mu-course-content-area">
            <div class="row">



              <div class="col-md-3">
                <!-- start sidebar -->
                <aside class="mu-sidebar">
                    <div>
                        @if($mats->name== 'Anglais')
                            <video  width="260" height="200"  controls>
                                <source src="{{ URL::asset('assets/vid/en.mp4')}}" type="video/mp4">
                            </video>

                        @elseif($mats->name== 'Français')
                            <video  width="260" height="200"  controls>
                                <source src="{{ URL::asset('assets/vid/fr.mp4')}}" type="video/mp4">
                            </video>

                        @elseif($mats->name== 'Allemand')
                            <video  width="260" height="200"  controls>
                                <source src="{{ URL::asset('assets/vid/al.mp4')}}" type="video/mp4">
                            </video>
                        @else
                            <div></div>
                        @endif
                    </div>
                    <div class="mu-single-sidebar">
                        <h3>Packs</h3>
                        <div class="mu-sidebar-popular-courses">
                            @foreach($paks as $pack)
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="{{route('detaille_pack',['id_cour'=>$pack->id])}}">
                                                <img class="media-object" src="{{  URL::asset($pack->photo)}}" alt="img">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading"><a href="{{route('detaille_pack',['id_cour'=>$pack->id])}}">{{$pack->titel}}</a></h4>
                                            <span class="popular-course-price">{{$pack->prix}} TND</span>
                                        </div>
                                    </div>
                            @endforeach
                        </div>
                    </div>


                  <!-- start single sidebar -->

                  <!-- end single sidebar -->

                </aside>
                <!-- / end sidebar -->
             </div>

                <div class="col-md-6" >
                    @if(Session::has('Solde_insuffisant'))
                        <div class="alert alert-danger" role="alert">
                            Solde de votre compte insuffisant.Veuillez <a href="{{route('payement.code')}}"><b>recharger</b></a>  votre compte.
                        </div>
                    @endif
                    @if(Session::has('Cour_acheter'))
                        <div class="alert alert-success" role="alert">
                            Coure Acheter.Consulter <a href="{{route('Etudiant.Mes_cours',['etud_id'=>$etuds->id])}}">Mes cours</a> pour voir les video de votre cours !!
                        </div>
                    @endif

                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#Gratuit">Cours Gratuit</a></li>
                        <li><a data-toggle="tab" href="#payant">Cours payant</a></li>
                    </ul>
                    <br>

                    <div class="tab-content">
                    <div id="Gratuit" class="tab-pane fade in active">
                        <div id="vid"></div>

                    @foreach($cours as $cour)
                        @if($cour->gratuit)
                    <div class="mu-from-blog-content" style="margin-top: 20px; margin-left: 20px;" >
                        <HR  size=8 width="100%">
                        <div class="row">
                            <div class="col-md-12 tab-pane fade in active" >

                                <div class="col-md-16 " >
                                        <div class="col-md-4">
                                            <b>{{$cour->titel}}</b>

                                        </div>
                                    <div class="col-md-8">
                                        <p class="text-justify" >{{$cour->content}}</p>
                                    </div>
                                    <div class="col-md-4">
                                       <ol>
                                                @foreach($vids as $vid)
                                                    @if($vid->cour_id == $cour->id)
                                                   <li role="presentation" onclick="document.getElementById('vid').innerHTML =' <center><b>{{$vid->name}}</b></center><h6 align=right><a onclick=Fermer() href>(X) Fermer</a></h6><center><iframe class=embed-responsive-item src={{ URL::asset($vid->video)}} width=570 height=350></iframe></center>' "><a role="menuitem" tabindex="-1" href="#"><p style="color: #b91d19"><span class="glyphicon glyphicon-play-circle"></span> Video de {{$vid->name}} </p></a></li>
                                                                @endif
                                                    @endforeach
                                            </ol>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <HR  size=8 width="100%">
                    </div>
                            @endif
                        @endforeach

                    </div>
                    <div id="payant" class="tab-pane fade">

                            @foreach($cours as $cour)
                                @if(!$cour->gratuit)
                                <div class="card-columns">
                            <div class="col-md-6">
                                <div class="card bg-info">
                                    <div class="card-body text-center">
                                        <img class="card-img-top" src="{{ URL::asset($cour->photo)}}" alt="Card image cap" width="150px" height="150px"><br>
                                        <div class="card-body">
                                            <center><b class="card-title">{{$cour->titel}}</b><br>
                                                <p class="card-text" >{{$cour->content}}.</p><br>
                                                <b style="color: #3495e3">{{$cour->prix}} TND</b></center>
                                            @if ($etuds)
                                                <a href="{{route('acheter_cour',['id_etud'=>$etuds->id,'id_cour'=>$cour->id])}}" class="btn btn-success" >Acheter</a>
                                            @else
                                                <a href="{{route('Etudiant.LoginEtudiant')}}" class="btn btn-success" >Acheter</a>
                                            @endif
                                            <a href="{{route('detaille_cours',['id_cour'=>$cour->id])}}" class="btn btn-info" >Détails</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                </div>
                                @endif
                                @endforeach

                    </div>
                    </div>

                    </div>
                <div class="col-md-3">
                    <!-- start sidebar -->
                    <aside class="mu-sidebar">
                        <!-- start single sidebar -->

                        <!-- end single sidebar -->
                        <!-- start single sidebar -->
                        <div class="mu-single-sidebar">
                            <h3>Cours En Ligne</h3>
                            <div class="mu-sidebar-popular-courses">
                                @foreach($courslive as $courslives)
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="{{route('WebSite.live')}}">
                                                <img class="media-object" src="{{  URL::asset($courslives->photo)}}" alt="img">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading"><a href="{{route('WebSite.live')}}">{{$courslives->titel}}</a></h4>
                                            <span class="popular-course-price">{{$courslives->prix}} TND</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>


                        <!-- end single sidebar -->
                        <!-- start single sidebar -->
                        <div class="mu-single-sidebar">
                            <div class="tag-cloud">
                                <a href="{{ route('index')}}">Accueil</a>
                                @foreach($categories as $cat)
                                    <a href="{{ route('WebSite.matiere',['matiere_id'=>$cat->id]) }}">{{$cat->name}}</a>
                                @endforeach
                                <a href="{{route('packs')}}">Packs</a>
                                <a href="{{route('utilisation')}}">Manuel D'utilisation</a>
                                <a href="{{route('WebSite.contact')}}">Contact</a>
                            </div>
                        </div>
                        <!-- end single sidebar -->
                    </aside>
                </div>
           </div>

         </div>
       </div>
     </div>
   </div>
 </section>

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


  <!-- Custom js -->
  <script src="{{ URL::asset('assets/js/custom.js')}}"></script>

  </body>
</html>
