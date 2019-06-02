@extends('layouts.inscriEtu')



@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-sm-4 col-sm-push-8">
            <!-- TEXT BASED LOGO -->
             <div class="card border-info mb-4" style="max-width: 18rem;" >
                <div class="card-header">
                    <b>Se Connecter</b>
                    @if(Session::has("Email"))
                        <div>
                            <b style="color: red;">Email incorrect</b>
                        </div>
                    @endif
                    @if(Session::has("password"))
                        <div>
                            <b style="color: red;"> Mot de passe incorrect</b>
                        </div>
                    @endif
                </div>

                <div class="card-body text-info">
                    <form method="POST" action="{{route('Etudiant.login')}}" >
                        {{csrf_field()}}
                        <div class="row" >
                            <label for="email" class="col-form-label text-md-right">{{ __('Email ') }}</label>
                                <input id="email" type="email"  name="email" value="" required autofocus class="form-control">
                            </div>


                             <div class="form-group row">
                            <label for="password" class=" col-form-label text-md-right">{{ __('Mot de passe') }}</label>
                                <input id="password" type="password"  name="password" value="" required autofocus class="form-control">
                            </div>




                                
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Connexion') }}
                                </button><br>
                            </div>
                        </div>
                    </form>
                    <a class="btn btn-link" href="{{ route('Etudiant.request') }}">
                        {{ __('Mot de passe oublié?') }}
                    </a>
                </div>
                </div>
                </div>
        
         <div class="col-sm-8 col-sm-pull-4 " >

        </div>
    </div>
</div>

@endsection
