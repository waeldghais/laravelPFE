@extends('layouts.inscriens')
<style>
    .upload-btn-wrapper {
        position: relative;
        overflow: hidden;
        display: inline-block;
    }

    .btn {
        border: 2px solid gray;
        color: gray;
        background-color: tomato ;
        padding: 8px 20px;
        border-radius: 8px;
        font-size: 20px;
        font-weight: bold;
    }

    .upload-btn-wrapper input[type=file] {
        font-size: 100px;
        position: absolute;
        left:0;
        top:0;
        opacity: 0;
    }
</style>
@section('content')

<div class="container">
    <div class="row justify-content-center">
        
            <!-- TEXT BASED LOGO -->
             <div class="card border-info mb-4" style="max-width: 30rem;">
                <div class="card-header"><b>Devenir Enseignant</b></div>
                 @if (Session::has('nofile'))
                     <div class="alert alert-danger">{{Session::get('nofile')}}</div>
                 @endif
                <div class="card-body text-info">
                    @if(count($errors)>0)
                    <ul class="navbar-nav mr-auto">
                    @foreach($errors->all() as $error)
                    <li class="nav-item active">
                        <div class="alert alert-danger">Le CV est obligatoire</div>
                    </li>
                    @endforeach
                    </ul>
                    @endif
                    <form method="POST" action="{{route('demande_enseigants.store')}}" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Votre Nom') }}</label>

                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="prenom" class="col-md-4 col-form-label text-md-right">{{ __('Votre Prenom') }}</label>

                            <div class="col-md-8">
                                <input id="prenom" type="text" class="form-control{{ $errors->has('prenom') ? ' is-invalid' : '' }}" name="prenom" value="{{ old('prenom') }}" required autofocus>

                                @if ($errors->has('prenom'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('prenom') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="matiere" class="col-md-4 col-form-label text-md-right">{{ __('Matiére') }}</label>

                            <div class="col-md-8">
                                <select class="form-control" id="matiere" name="matiere" required>
                                 <option value="Anglais">Anglais</option>
                                 <option value="Français">Français</option>
                                 <option value="Allemand">Allemand</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Numéro de téléphone') }}</label>

                            <div class="col-md-8">
                                <input id="phone" type="text" class="form-control" name="phone" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cv" class="col-md-4 col-form-label text-md-right">{{ __('Votre CV(PDF)') }}</label>

                            <div class="col-md-8">
                                <div class="upload-btn-wrapper" >
                                    <button class="btn" style="background-color: #f0ad4e" required>Ajouter votre CV</button>
                                    <input type="file" name="cv" id="cv" accept="application/pdf" />
                                </div>

                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-4 offset-md-8">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                            
                        </div>
                    </form>
                </div>
          
        </div>
        <div class="col-sm-8 col-sm-pull-4 " >

        </div>
    </div>
</div>


@endsection
