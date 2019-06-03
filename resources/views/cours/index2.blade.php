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
                                    <td><a class="" href="{{route('cours_live.edit',['id'=>$cour->id])}} ">

                                            <button type="button" class="btn btn-dark">Modfier</button>
                                        </a></td>
                                    <td><a class="" href="{{route('cours_en_ligne.delete',['id'=>$cour->id])}} " onclick="return myFunction();">
                                            <button type="button" class="btn btn-danger">Supprimer</button>
                                        </a></td>

                                    @foreach($users as $user)
                                        @if ($cour->user_id == $user->id)
                                            <th scope="row">{{$user->name}}</th>
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
