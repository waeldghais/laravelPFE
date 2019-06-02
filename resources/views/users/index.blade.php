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

                <div class="card-header"><b>Utilisateur</b></div>

                <div class="card-body">


@if ($users->count()>0)

<table class="table " >
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">Nom</th>
      <th scope="col">prenom</th>
      <th scope="col">Roles</th>
      <th scope="col"></th>
      
    </tr>
  </thead>
  <tbody>
  
    
      @foreach($users as $user)
     
        <tr>
        <th scope="row">
            @if($user->photo)
                <img src="{{ URL::asset($user->photo)}}" alt="" width="50px" height="50px" class="rounded-circle">
            @else
      <img src="/uploads/avatar/1.png" alt="" width="50px" height="50px" class="rounded-circle">
@endif
       </th>
      <th scope="row">{{$user->name}}</th>
     <th scope="row">{{$user->prenom}}</th>
      <td>
        @if($user->admin)
        <a class="" href="{{route('users.not.admin',['id '=> $user->id])}}" >
         <button type="button" class="btn btn-light"><b>mettre Enseignant</b></button>
        </a>
        @else
       
        <a class="" href="{{route('users.admin',['id '=> $user->id])}}">
           <button type="button" class="btn btn-light"><b>mettre admin</b></button>
        </a>
        @endif
      </td>
       <td><a class="" href="{{route('users.delete',['id'=>$user->id])}} " onclick="return myFunction();">
          <button type="button" class="btn btn-danger">Supprimer</button>
        </a></td> 
      
      
    </tr>
@endforeach
   @else
  <p scope="row" class="text-center">Non  Users</p>  
  @endif
  </tbody>
</table>
            </div>

    </div>
</div>
@endsection


