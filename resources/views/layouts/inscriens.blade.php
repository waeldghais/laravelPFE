<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CLV</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style type="text/css">
    body, html {
  height: 100%;
}
.bg {
  /* The image used */
  background-image: url('/assets/img/back.jpg');

  /* Full height */
  height: 100%;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;

}

 </style>
</head>
<body>
    <div id="app" class="bg">
        <nav class="navbar navbar-expand-md nav navbar-light  navbar-laravel flex-column"   >
            <div class="container nav  ">
                

                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                        
                   <a href="{{url('/')}}"> <img src="{{ URL('/assets/img/LOGO-Pro.png') }}"  alt="logo" height="50px" width="100px"> 
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto   ">

                        <!-- Authentication Links -->
                       
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Connexion') }}</a>
                            </li>
                           
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('demande_enseigants.Denseigant') }}">{{ __('Devenir Enseignant') }}</a>
                                </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ route('Etudiant.LoginEtudiant') }}">{{ __('Espace étudiant') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>






        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
