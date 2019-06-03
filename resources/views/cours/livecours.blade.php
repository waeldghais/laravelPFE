@extends('layouts.app')

@section('content')
    <div>
        <div class="row justify-content-center">
            <div class="col-md-10">

                <div class="card-header"><b>Création Cours en ligne</b></div>

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
                        <b>Cours en ligne Ajouter</b>
                    </div>
                @endif
                <form action="{{route('cours.store_live')}}" enctype="multipart/form-data" method="POST">
                    {{csrf_field()}}

                    <div class="form-group">
                        <label for="category">Matiere</label>
                        <select class="form-control" name="category_id" id="category">
                            @foreach ($matieres as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group"  >
                        <label for="titel">Titre</label>

                        <input type="text" class="form-control" name="titel" id="titel" placeholder="Enter titel">
                        <br>
                    </div>
                    <div class="form-group"  >
                        <label for="prix">Prix de Cours</label>
                        <input type="number" class="form-control" name="prix"  placeholder="Enter Prix de cours"><br>
                    </div>
                    <div class="form-group">
                        <label for="conten">Description</label>
                        <textarea class="form-control" name="conten" id="conten" rows="8" cols="8"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="photo">image</label>
                        <br>
                        <div class="upload-btn-wrapper">
                            <button class="btn">choisissez une image</button>
                            <input type="file" name="image" id="image" accept="image/png , image/jpeg"/>
                        </div>
                    </div>



                    <button type="submit" class="btn btn-primary">Sauvgarder</button>
                </form>

            </div>
        </div>
    </div>

@endsection
