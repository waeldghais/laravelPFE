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

            <center><h2>Répondez aux message</h2></center>


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
                        <button type="submit" class="btn">Changer</button>
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
                                <button type="submit" class="btn">Ajouter une photo de profil</button>
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
                <div class="col-sm-10"  >

                    <div class="col-sm-5"  >
<br>
                    <form  method='GET' action="{{route('envoyer.message',['user_id' => $users->id,'id'=> $msgs->id])}}" >
                            <div class="form-group">
                                <label for="email">Envoyer à :</label>
                                <input type="text" class="form-control" id="email" value="{{$msgs->email}}">
                            </div>
                            <br>
                            <label for="objet" >Objet</label>
                            <input type="text" name="objet" id="objet" class="form-control"  required>
                        <br>
                        <div class="form-group">
                            <label for="message">Message:</label>
                            <textarea class="form-control" rows="5" id="message" name="message"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Envoyer</button>
                    </form>
                    </div>
                    <div class="col-sm-5" >
                        @if(Session::has("Envoyerr"))
                        <div class="alert alert-success">
                            <b>Message Envoyer</b>
                        </div>
                        @endif
                        <img src="{{asset('assets/img/email.jpg')}}" style="margin-top: 50px; margin-left: 100px;">
                    </div>

                </div>

@endsection

