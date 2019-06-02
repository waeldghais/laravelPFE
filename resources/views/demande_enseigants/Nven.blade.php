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

                <div class="card-header">Nouvelle demande </div>

                <div class="card-body">


@if ($demande_enseigants->count()>0)

<table class="table " >
    @if(Session::has("ruf"))
        <div class="alert alert-danger">
            <b>Demande refuser et supprimer</b>
        </div>
    @endif
  @if(Session::has("accepter"))
    <div class="alert alert-success">
      <b>Enseignant Accepter et email envoyer</b>
    </div>
  @endif
  <thead>
    <tr>
      
      <th scope="col">Nom</th>
      <th scope="col">prenom</th>
        <th scope="col">Matière</th>
      <th scope="col"> Email</th>
      <th scope="col">CV</th>
        <th scope="col">Plus d'information</th>
       <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  
    
      @foreach($demande_enseigants as $ens)
     
        <tr>
        
      <th scope="row">{{$ens->name}}</th>
      <th scope="row">{{$ens->prenom}}</th>
      <td>
        {{$ens->matiere}}
      </td>
      <td>
        {{$ens->email}}
      </td>
       <td><a href="{{route('download',$ens->id)}}"><button type="button" class="btn btn-secondary">Télecharger CV</button></a></td> 
      <td><a href="{{route('demande_enseigants.Plusinfo',$ens->id)}}"><button type="button" class="btn btn-light">Plus d'information...</button></a></td> 
       <td><a href="{{route('emails.email',['id'=>$ens->id])}}"><button type="button" class="btn btn-success">Accepter</button></a></td>
      <td><a href="{{route('demande_enseigants.rufse',['id'=>$ens->id])}}"  onclick="return myFunction();"><button type="button" class="btn btn-danger">Réfuser</button></a></td>

        </tr>
@endforeach
   @else
  <p scope="row" class="text-center">Aucune demande</p>  
  @endif
  </tbody>
</table>
            </div>

    </div>
</div>
@endsection


