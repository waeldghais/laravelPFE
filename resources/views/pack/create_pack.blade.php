@extends('layouts.app')

@section('content')
    <div>
        <div class="row justify-content-center">
            <div class="col-md-10">

                <div class="card-header"><b>Création Pack</b></div>

                    <div class="card-body">
                        @if(count($errors)>0)

                            <ul class="navbar-nav mr-auto">
                                @foreach($errors->all() as $error)
                                    <li class="nav-item active">
                                        {{ $errors}}
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                    @if(Session::has("creatmatiere"))
                        <div class="alert alert-success">
                            <b>Pack Ajouter</b>
                        </div>
                    @endif
                    <form action="{{route('pack.store_pack')}}" methode="POST" enctype="multipart/form-data" >
                        {{ csrf_field() }}

                        <div class="form-group"  >
                            <label for="titel">Titre de Pack</label>
                            <input type="text" class="form-control" name="titel"  placeholder="Enter titel"><br>
                        </div>

                        <div class="form-group"  >
                            <label for="prix">Prix de Pack</label>
                            <input type="number" class="form-control" name="prix"  placeholder="Enter Prix de pack"><br>
                        </div>

                        <div class="form-group">
                            <label for="content">Description</label>
                            <textarea class="form-control" name="conten" id="conten" rows="8" cols="8"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="photo">image</label>
                            <br>
                            <div class="upload-btn-wrapper">
                                <button class="btn">choisissez une image</button>
                                <input type="file" name="photo" id="photo" accept="image/png , image/jpeg"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="video">Video de Pack</label>
                            <br>
                            <div class="upload-btn-wrapper">
                                <button class="btn">choisissez Video</button>
                                <input type="file" name="video[]" accept="video/mp4" multiple>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">sauvgarder</button>
                    </form>

            </div>
        </div>
    </div>

@endsection
