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

            <center><h2>Message</h2></center>


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
            @if($msgs->count()>0)
                <div class="col-sm-10">
                    @if($users->admin)
                        <hr>
                        <div class=col-sm-2>
                            <b>Nom Prenom</b>
                        </div>
                        <div class=col-sm-2>
                            <b>Objet</b>
                        </div>
                        <div class=col-sm-6>
                            <b>Message</b>
                        </div>
                        <div class=col-sm-1>
                            <b>Rép/Sup</b>
                        </div>

                    @foreach($msgs as $msg)
                            <br><br><hr>
                        <div class=col-sm-2>
                            <p>{{$msg->nom}} {{$msg->prenom}}</p>
                        </div>
                        <div class=col-sm-2>
                            <p>{{$msg->subject}}</p>
                        </div>
                        <div class=col-sm-6>
                            <p class="text-justify">{{$msg->comment}}</p>
                        </div>
                            <div class="btn-group-vertical col-sm-1">
                                <a href="{{route('send.message',['user_id' => $users->id,'id'=> $msg->id])}}" ><span class="glyphicon glyphicon-paste"></span></a>
                                <a href="{{route('message.delete',['user_id' => $users->id,'id'=> $msg->id])}}" onclick="return myFunction();"><span class="glyphicon glyphicon-trash"></span></a>
                            </div>
                    @endforeach
                    @else
                        <hr>
                        <div class=col-sm-2>
                            <b>Nom Prenom</b>
                        </div>
                        <div class=col-sm-2>
                            <b>Objet</b>
                        </div>
                        <div class=col-sm-6>
                            <b>Message</b>
                        </div>
                        <div class=col-sm-1>

                        </div>
                        @foreach($msgs as $msg)
                            @if($msg->matiere == $users->matiere)
                                <br><br><hr>
                                <div class=col-sm-2>
                                    <p>{{$msg->nom}} {{$msg->prenom}}</p>
                                </div>
                                <div class=col-sm-2>
                                    <p>{{$msg->subject}}</p>
                                </div>
                                <div class=col-sm-6>
                                    <p class="text-justify">{{$msg->comment}}</p>
                                </div>
                                <div class="btn-group-vertical col-sm-1">
                                    <a href="{{route('send.message',['user_id' => $users->id,'id'=> $msg->id])}}" ><span class="glyphicon glyphicon-paste"></span></a>
                                    <a href="{{route('message.delete',['user_id' => $users->id,'id'=> $msg->id])}}" onclick="return myFunction();"><span class="glyphicon glyphicon-trash"></span></a>
                                </div>
                            @endif
                        @endforeach
                    @endif
                    @else
                        <h1 style="margin-top: 20%;"><center>Aucune Message !! </center></h1>
                         @endif
                </div>
    </body>
@endsection

