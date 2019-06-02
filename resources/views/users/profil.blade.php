@extends('layouts.app')
@section('content')
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
<div class="bga">
    <!-- Page breadcrumb -->
    <section >

                        <center><h2>Profil @if ($users->admin) admin @else enseigant @endif</h2></center>


    </section>
    <!-- End breadcrumb -->
    @if($users->photo)
    <div class=col-sm-2>

        <div id="parent">
            <form action="{{route('Updateuserimage',['id' => $users->id ])}}" class="form-inline" enctype="multipart/form-data"
                  id="form_login" method="POST">
                {{csrf_field()}}

                    <img src="{{ URL::asset($users->photo)}}" class="rounded-circle" width="120px" height="100px" alt="">

                <div class="upload-btn-wrapper">
                    <button class="btn">choisissez une image</button>
                    <input type="file" name="file" id="file" accept="image/png, image/jpeg"/>
                </div>
                <br>
                    <button type="submit" class="btn btn">Changer</button>
            </form>
        </div>
        @else
            <div class=col-sm-2 >
        <div id="parent">
            <form class="form-inline" id="form_login" action="{{route('Updateuserimage',['id' => $users->id ])}}" method="POST" enctype="multipart/form-data" >
                {{csrf_field()}}

                <div class="upload-btn-wrapper">
                    <button class="btn">choisissez une image</button>
                    <input type="file" name="file" id="file" accept="image/png, image/jpeg"/>
                </div>
                <br>
                    <button type="submit" class="btn btn">Ajouter une photo de profil</button>
            </form>
        </div>
        @endif

        <br>

        <ul >
            <a href="{{route('users.profil',['id'=> Auth::user()->id])}}"><li class="list-group-item list-group-item-dark" ><span class="glyphicon glyphicon-user"></span>Profil<span class="badge"></span></li></a>
            <br>


            <a href="{{route('users.message',['id'=> Auth::user()->id])}}"><li class="list-group-item list-group-item-dark"> <span class="glyphicon glyphicon-envelope"></span>Message</li></a>
            <br>

            <a href="{{ route('logout') }}"
               onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
              <li class="list-group-item list-group-item-dark"><span class="glyphicon glyphicon-log-out"></span> Se déconnecter
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
              </li>
            </a>

        </ul>

    </div>
            <div class=col-sm-10 >
                <form method="GET"  action={{route('Updateuserprofil',['id' => $users->id ])}} >
                <table class="table " style="width: 100%" >
                    <tr>
                    <th scope="row">Nom</th>
                    <td colspan="2"><div class=col-sm-10>
                            <input type='text' class=form-control id=name name=name value={{$users->name}}>
                        </div>
                    </td>
                    </tr>
                    <tr>
                        <th scope="row">Prenom</th>
                        <td><div class=col-sm-10>
                                <input type="text" class=form-control id=prenom name=prenom value={{$users->prenom}}>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Email</th>
                        <td>
                            <div class=col-sm-10>
                                <input type="email" class=form-control id=email name=email value={{$users->email}}>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Numéro de téléphone</th>
                        <td>
                            <div class=col-sm-10>

                                <input type="tel" class=form-control id=Numero name=Numero value={{$users->phone}}>
                                </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Nom d’utilisateur Facebook</th>
                        <td>
                            <div class=col-sm-10>
                                <input type="text" class=form-control id=facebook name=facebook value={{$users->facebook}}>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button type="submit" class="btn btn-warning">Modfier</button>
                        </td>
                    </tr>
                </table>
                </form>

                    <div class="mu-footer-widget">
                        <ul class="center-block">
                            <li><a href="" data-toggle="collapse" data-target="#demo"><b>Paramètres Mot de passe</b></a></li>
                        </ul>
                    </div>

                <!--mot de passe modfier-->
                @if (Session::has('modfier'))
                    <div class="alert alert-success">{{Session::get('modfier')}}</div>
                @endif
            <!--Nouveau mot de passe != Confirmation-->
                @if (Session::has('nouveau'))
                    <div class="alert alert-danger">{{Session::get('nouveau')}}</div>
                @endif
            <!--mot de passe actuel incorrecte-->
                @if (Session::has('actuel'))
                    <div class="alert alert-danger">{{Session::get('actuel')}}</div>
                @endif



        <table class="table " style="width: 100%" >
            <tr>
                <td colspan="3" >
                    <form method="GET"  action={{route('Updateuserpass',['id' => $users->id ])}}>

                        <div class=col-sm-4>
                            <label for="name">Mot de passe actuel</label>
                        </div>
                        <div class=col-sm-6>
                            <input type="password" class=form-control id=password name=actuel >
                        </div>
                        <div class=col-sm-4>
                            <label for="name">Nouveau mot de passe </label>
                        </div>
                        <div class=col-sm-6>
                            <input type="password" class=form-control id=password name=Nouveau >
                        </div>
                        <div class=col-sm-4>
                            <label for="name">Confirmation </label>
                        </div>
                        <div class=col-sm-6>
                            <input type="password" class=form-control id=password name=Confirmation >
                        </div>
                        <button type="submit" class="btn btn-warning">Modfier</button>
                    </form>
                </td>
            </tr >

        </table>

            </div>
    </div>
</div>

@endsection

