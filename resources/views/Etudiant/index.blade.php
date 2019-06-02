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

                <div class="card-header"><b>Etudiants</b></div>

                <div class="card-body">


@if ($etudiants->count()>0)

<table class="table " >
  <thead>
    <tr>
      <th scope="col">Image</th>
      <th scope="col">Nom et prenom</th>
      
      <th scope="col">Email</th>
        <th scope="col">Solde</th>
      <th scope="col">Inscrit le</th>
      
    </tr>
  </thead>
  <tbody>
  
    
      @foreach($etudiants as $etudiant)
     
        <tr>
        <th scope="row">
            @if($etudiant->photo)
            <img src="{{ URL::asset($etudiant->photo)}}" alt="" width="50px" height="50px" class="img-thumbnail"></th>
            @else
                <img src="/uploads/avatar/1.png" alt="" width="50px" height="50px" class="rounded-circle">
            @endif
     	 <td scope="row">{{$etudiant->name}} {{$etudiant->prenom}}</td>
     	 <td scope="row">{{$etudiant->email}}</td>
            <td scope="row">{{$etudiant->solde}}</td>
      	<td>{{$etudiant->created_at}}</td>
            <td><a class="" href="{{route('etudiant.delete',['id'=>$etudiant->id])}} " onclick="return myFunction();">
                    <button type="button" class="btn btn-danger">Supprimer</button>
                </a></td>
      @endforeach
   @else
  <p scope="row" class="text-center">No  Etudiant</p>  
  @endif
  </tbody>
</table>

        </div>
    </div>
</div>
@endsection
