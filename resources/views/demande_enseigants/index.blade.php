

@extends('layouts.inscriens')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Demande Register') }}</div>
   

<ul class="list-group">
    <li class="list-group-item">MonsieurMadame, <kbd>{{$last_ins->name}}</kbd></li>
  <li class="list-group-item">Votre demande a été envoyée avec succès</li>
  <li class="list-group-item">nous répondons à votre demande à très bientôt sur votre email: <kbd>{{$last_ins->email}}</kbd></li>
  <li class="list-group-item">si on a des questions on vous appelle sur votre numéro:<kbd>{{$last_ins->phone}}</kbd> </li>
  <li class="list-group-item">Merci, <a href="{{ url('/') }}">Retourne à la page d'accueil</a></li>
</ul>
<p>  </p>
</div>
        </div>
    </div>
</div>
@endsection
