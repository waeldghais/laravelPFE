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
                    <li><a href="{{route('utilisation')}}">Manuel d'utilisation</a></li>
                    <li><a href="{{route('WebSite.contact')}}">Contact</a></li>
                    @if ($etuds)
                        <li><table class="table" style="margin-top: 10px;">
                                <tr class="warning">
                                    <td>{{$etuds->solde}}&nbsp;&nbsp;&nbsp;  DTN</td>
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
                    <h2> Détails</h2>
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
                                <!-- start single sidebar -->
                                <div class="mu-single-sidebar">
                                    <h3>Cours</h3>
                                    <div class="mu-sidebar-popular-courses">
                                        @foreach($cours as $cour)
                                            @if(!$cour->gratuit)
                                                <div class="media">
                                                    <div class="media-left">
                                                        <a href="{{route('detaille_cours',['id_cour'=>$cour->id])}}">
                                                            <img class="media-object" src="{{ URL::asset($cour->photo)}}" alt="img">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <a href="{{route('detaille_cours',['id_cour'=>$cour->id])}}"> <h4 class="media-heading">{{$cour->titel}}</h4></a>
                                                        <span class="popular-course-price">{{$cour->prix}} DTN</span>
                                                    </div>
                                                </div>
                                            @endif
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
                                        <a href="{{route('utilisation')}}">Manuel d'utilisation</a>
                                        <a href="{{route('WebSite.contact')}}">Contact</a>
                                    </div>
                                </div>
                                <!-- end single sidebar -->

                            </aside>
                            <!-- / end sidebar -->
                        </div>

                        <div class="col-md-9" >
                            @if(Session::has('pack_acheter'))
                                <div class="alert alert-success" role="alert">
                                    Pack Acheter.Consulter <a href="{{route('Etudiant.Mes_cours',['etud_id'=>$etuds->id])}}">Mes cours</a> pour voir les video de votre pack !!
                                </div>
                            @endif
                            <div class="card text-white bg-success mb-3" >
                                <div class="col-md-3" >
                                    <div class="tab-content">
                                        <img class="media-object" src="{{  URL::asset($paks->photo)}}" alt="img" width="275px" height="183px">
                                    </div>
                                </div>
                                <div class="col-md-8" >
                                    <div class="tab-content">
                                        <P style="margin-left:8em"><a href="#" class="text-primary">Titre de Packs :</a> {{$paks->titel}}</P>
                                        <P style="margin-left:8em"><a href="#" class="text-primary">Contenu de Packs :</a> {{$paks->content}}</P>
                                        <P style="margin-left:8em"><a href="#" class="text-primary">Prix :</a> {{$paks->prix}} TND</P>

                                        <P style="margin-left:8em"><a href="#" class="text-primary">Ajouter le  :</a> {{$paks->created_at}}</P>
                                        @if ($etuds)
                                            <center><a href="{{route('acheter_pack',['id_etud'=>$etuds->id,'id_pack'=>$paks->id])}}" class="btn btn-success" >Acheter</a></center>
                                        @else
                                            <center><a href="{{route('Etudiant.LoginEtudiant')}}"  class="btn btn-success" >Acheter</a></center>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
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
