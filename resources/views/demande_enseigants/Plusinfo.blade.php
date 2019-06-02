@extends('layouts.app')
<script>
    function myFunction() {
        if(!confirm("Êtes-vous sûr de supprimer ceci"))
            event.preventDefault();
    }
</script>
@section('content')
<div >
    <div class="row justify-content-center">
        <div class="col-md-10">

                <div class="card-header">Plus d'information sur <kbd>{{$demande_enseigants->name}}</kbd></div>

                <div class="card-body">



<table class="table " >
  @if(Session::has("accepter"))
    <div class="alert alert-success">
      <b>Enseignant Accepter</b>
    </div>
  @endif
  
 <tr><th scope="col">Nom</th> <td>{{$demande_enseigants->name}}</td><tr>
   <tr><th scope="col">Prenom</th> <td>{{$demande_enseigants->prenom}}</td><tr>
  <tr><th scope="col">Matiere</th> <td>{{$demande_enseigants->matiere}}</td><tr>
    <tr><th scope="col">Email</th> <td>{{$demande_enseigants->email}}</td><tr>
      <tr><th scope="col">Numéro de téléphonie </th> <td>{{$demande_enseigants->phone}}</td><tr>
  <tr><th scope="col">CV </th><td><a href="{{route('download',$demande_enseigants->id)}}"><button type="button" class="btn btn-secondary">Télecharger CV</button></a></td> </tr>
     <tr><th></th> <td><a href="{{route('emails.email',['id'=>$demande_enseigants->id])}}"><button type="button" class="btn btn-success">Accepter</button></a>
             <a href="{{route('demande_enseigants.rufse',['id'=>$demande_enseigants->id])}}"  onclick="return myFunction();"><button type="button" class="btn btn-danger">Réfuser</button></a></td></tr>
      
 
</table>

            </div>

    </div>
</div>
</div>
@endsection


