<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CLV</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        #gauche {
            width: 40%;
            height: 450px;
            float: left;
            margin-left: 200px;
        }

        #droite {
            width: 60%;
            height: 450px;
            float: left;
            margin-left: 20px;

        }
        #parent {
            display: table;
            width: 100%;
        }
        #form_login {
            display: table-cell;
            text-align: center;
            vertical-align: middle;
        }

        .upload-btn-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
        }

        .btn {
            border: 2px solid gray;
            color: rgba(0, 0, 0, 0.7) ;
            background-color: #ffe0b2;
            padding: 8px 20px;
            border-radius: 8px;
            font-size: 20px;
            font-weight: bold;
        }



        .upload-btn-wrapper input[type=file] {
            font-size: 100px;
            position: absolute;
            left:0;
            top: 0;
            opacity: 0;
        }
    </style>

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
    <link href="{{ URL::asset('https://fonts.googleapis.com/css?family=Montserrat:400,700')}}" rel='stylesheet' type='text/css'>
    <link href="{{ URL::asset('https://fonts.googleapis.com/css?family=Roboto:400,400italic,300,300italic,500,700')}}" rel='stylesheet' type='text/css'>

    <link rel="shortcut icon" href="{{ URL::asset('assets/img/LOGO-icon.ico')}}" type="image/x-icon">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <script src="{{ URL::asset('https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js')}}"></script>
    <script src="{{ URL::asset('https://oss.maxcdn.com/respond/1.4.2/respond.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            $(".nav-tabs a").click(function(){
                $(this).tab('show');
            });
        });
    </script>
    <style type="text/css">
        .bga {
            /* The image used */
           /* background-image: url('/assets/img/ground.jpg');*/
background-color: white;


            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;

        }
    </style>
</head>
<body class="bga">

<div id="app" >
        <nav class="navbar navbar-expand-md nav navbar-light  navbar-laravel flex-column" style="background-color: #f0ad4e" >
            <div class="container nav  ">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    <img src="{{ URL::asset('assets/img/LOGO-Pro.png')}}" alt="logo" height="40px" width="100px">
                </a>
 <ul class="nav navbar-nav nav " >
        @if(Auth::user()->admin)
         <li class="nav-item dropdown">
             <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 Paramétres
             </a>
             <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                 <a class="dropdown-item" href="{{route('settings')}}">Show</a>
             </div>
         </li>

  <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

            Utilisateur
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

          <a class="dropdown-item" href="{{route('users')}}">Utilisateur</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{route('demande_enseigants.Nvens')}}">Nouvelle enseignants</a>
        </div>
      </li>

         <li class="nav-item dropdown">
             <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 Paiement
             </a>
             <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                 <a class="dropdown-item" href="{{route('payement.virement')}}">Les Virements</a>
             </div>
         </li>

       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Etudiant
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{route('etud')}}">Nos Etudiants</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Matiere
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

          <a class="dropdown-item" href="{{route('matieres.create')}}">Ajouter Matiere</a>

          <a class="dropdown-item" href="/matieres">Matieres</a>
        </div>
      </li>
     @endif
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Cours
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{route('cours.create')}}">Ajouter Cours Gratuit</a>
            <a class="dropdown-item" href="{{route('cours.create_payent')}}">Ajouter Cours Payant</a>
            <a class="dropdown-item" href="{{route('cours')}}">Nos Cours</a>
        </div>

      </li>


            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Packs
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route('pack.create_pack')}}">Ajouter un Pack</a>
                    <a class="dropdown-item" href="{{route('pack')}}">Nos Packs</a>
                </div>

            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Cours En ligne
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route('cours.livecours')}}">Ajouter Cours En ligne</a>
                    <a class="dropdown-item" href="{{route('cours_en_ligne')}}">Nos Cours En ligne</a>
                </div>

            </li>
    </ul>
                <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto   ">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else

                            <li class="nav-item dropdown" >

                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    @if(Auth::user()->photo)
                                        <img src="{{ URL::asset(Auth::user()->photo)}}" class="rounded-circle" width="20px" height="20px" >
                                    @endif
                                        {{ Auth::user()->name }} {{ Auth::user()->prenom }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-left " aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{route('users.profil',['id'=> Auth::user()->id])}}">
                                        {{ __('Profil ') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Se déconnecter') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{ asset('https://cloud.tinymce.com/5/tinymce.min.js') }}"></script>
@yield('javascripts')
</html>
