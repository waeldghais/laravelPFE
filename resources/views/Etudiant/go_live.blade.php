<!DOCTYPE html>
<html lang="fr" xmlns="http://www.w3.org/1999/html">
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
    <link href="{{ URL::asset('https://fonts.googleapis.com/css?family=Montserrat:400,700')}}" rel='stylesheet' type='text/css'>
    <link href="{{ URL::asset('https://fonts.googleapis.com/css?family=Roboto:400,400italic,300,300italic,500,700')}}" rel='stylesheet' type='text/css'>

    <link rel="shortcut icon" href="{{ URL::asset('assets/img/LOGO-icon.ico')}}" type="image/x-icon">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <style type="text/css">
        .bga {
            /* The image used */
            background-image: url('/assets/img/ground.jpg');



            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;

        }
    </style>
    <style>
        .upload-btn-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
        }

        .btn {

            color: gray;
            background-color: orange;
            padding: 8px 1px;
            border-radius: 8px;
            font-size: 15px;
            font-weight: bold;
        }

        .upload-btn-wrapper input[type=file] {
            font-size: 100px;
            position: absolute;
            left:0;
            top: 0;
            opacity: 0;
        }
        hr.new2 {
            border-top: 1px dashed red;
        }
    </style>
    <script>
        function Fermer() {
            location.reload();
        }
    </script>
</head>
<body class="bga">


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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- End header  -->
<!-- Page breadcrumb -->

<!-- End breadcrumb -->

<section>

    <div class=col-sm-2>
        @if($etuds->photo)
            <center><img src="{{ URL::asset($etuds->photo)}}" class="img-thumbnail" width="100px" ></center>

            <form class="form-inline" action="{{route('Updateimage',['id' => $etuds->id ])}}" method="POST" enctype="multipart/from-data" >
                {{csrf_field()}}

                <center><div class="upload-btn-wrapper">
                        <button class="btn">choisissez une image</button>
                        <input type="file" name="file" id="file" accept="image/png, image/jpeg"/>
                    </div>
                    <br>
                    <button type="submit" class="btn btn">Changer</button></center>
            </form>
        @else
            <form class="form-inline" action="{{route('Updateimage',['id' => $etuds->id ])}}" method="POST" enctype="multipart/from-data" >
                {{csrf_field()}}

                <div class="form-group">
                    <div class="upload-btn-wrapper">
                        <button class="btn">choisissez une image</button>
                        <input type="file" name="file" id="file" accept="image/png, image/jpeg"/>
                    </div>
                </div>
                <button type="submit" class="btn btn-info">Ajouter une photo de profil</button>
            </form>
        @endif
        <br>
        <table class="table">
            <tr class="warning"><td>{{$etuds->solde}}&nbsp;&nbsp;&nbsp;  TND</td> <td><a href="{{route('payement.code')}}"><span class="glyphicon glyphicon-plus"></span></a></td></tr>
        </table>

        <ul>
            <a href="{{ route('Etudiant.profil',['etud_id'=>$etuds->id]) }}" ><li class="list-group-item list-group-item-dark"><span class="glyphicon glyphicon-user"></span>Profil</li></a>
            <br>
            <a href="{{ route('index')}}"><li class="list-group-item list-group-item-dark"><span class="glyphicon glyphicon-home"></span> Acceuil</li></a>
            <br>
            <a href="{{route('Etudiant.Mes_cours',['etud_id'=>$etuds->id])}}"><li class="list-group-item list-group-item-dark"><span class="glyphicon glyphicon-book"></span> Mes Cours<span class="badge"></span></li></a>
            <br>
            <a href="{{ route('Etudiant.logout') }}"><li class="list-group-item list-group-item-dark"><span class="glyphicon glyphicon-log-out"></span> Se déconnecter </li></a>
        </ul>

    </div>



                    <div class="col-md-6">
                        <iframe src="https://player.twitch.tv/?channel=clvtunis" frameborder="0" allowfullscreen="true" scrolling="no" height="500" width="900"  style="margin-left: 30px; margin-top: 30px;"></iframe>
                    </div>
            <div class="col-md-4">
                <iframe src="https://www.twitch.tv/embed/clvtunis/chat" frameborder="0" scrolling="no" height="500" width="350" style="margin-left: 30px; margin-top: 30px;"></iframe>
            </div>
        </div>

    <script src="{{ URL::asset('https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js')}}"></script>
    <script src="{{ URL::asset('https://oss.maxcdn.com/respond/1.4.2/respond.min.js')}}"></script>
</section>

