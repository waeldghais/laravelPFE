@extends('layouts.app')
<script>
    function myFunction() {
        if(!confirm("Êtes-vous sûr de supprimer ceci"))
            event.preventDefault();
    }
</script>
@section('content')
    <div>
        <div class="row justify-content-center">
            <div class="col-md-10">

                <div class="card-header"><b>Cours en ligne</b></div>
                @if(Session::has("creatmatiere"))
                    <div class="alert alert-success">
                        <b>Cours en ligne Ajouter</b>
                    </div>
                @endif

                @if(Session::has("modfiermatiere"))
                    <div class="alert alert-success">
                        <b>Cours en ligne Modfier</b>
                    </div>
                @endif

                @if(Session::has("supprimer_cours"))
                    <div class="alert alert-danger">
                        <b>Cours en ligne supprimer</b>
                    </div>
                @endif
                <div class="card-body">
                    @if ($cours->count()>0)

                        <table class="table " >
                            <thead>
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">Titre</th>
                                <th scope="col">modfier</th>
                                <th scope="col">supprimer</th>
                                <th scope="col">Ajouter par</th>
                            </tr>
                            </thead>
                            <tbody>


                            @foreach($cours as $cour)

                                <tr>
                                    <th scope="row">
                                        <img src="{{$cour->photo}}" alt="{{$cour->titel}}" width="150px" class="img-thumbnail">

                                    </th>
                                    <td scope="row">{{$cour->titel}}</td>
                                    @if ($cour->user_id == Auth::user()->id)
                                    <td><a class="" href="{{route('cours_live.edit',['id'=>$cour->id])}} ">

                                            <button type="button" class="btn btn-dark">Modfier</button>
                                        </a></td>
                                    <td><a class="" href="{{route('cours_en_ligne.delete',['id'=>$cour->id])}} " onclick="return myFunction();">
                                            <button type="button" class="btn btn-danger">Supprimer</button>
                                        </a></td>
                                    @else
                                        <td>
                                            <button type="button" class="btn btn-dark" disabled>Modfier</button>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-danger" disabled>Supprimer</button>
                                        </td>

                                    @endif
                                    @foreach($users as $user)
                                        @if ($cour->user_id == $user->id)
                                            <th scope="row">{{$user->name}} {{$user->prenom}}</th>
                                        @endif
                                    @endforeach
                                </tr>
                            @endforeach


                            @else
                                <p scope="row" class="text-center">No  cours</p>
                            @endif
                            </tbody>
                        </table>
                </div>

            </div>
        </div>
@endsection
