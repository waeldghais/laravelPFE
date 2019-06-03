@extends('layouts.app')
<script>
    function myFunction() {
        if(!confirm("Êtes-vous sûr de supprimer ce video"))
            event.preventDefault();
    }
</script>
@section('content')







    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="card-header"><b>Modfier  Cours en ligne {{$cours->titel}}</b></div>

            <div class="card-body">

                @if(Session::has("creatmatiere"))
                    <div class="alert alert-success">
                        <b>Cours en ligne Modfier</b>
                    </div>
                @endif
                <form action="{{route('cours_live.update',['id' => $cours->id ])}}" enctype="multipart/form-data" method="POST">

                    {{ csrf_field() }}


                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Matiere</label>
                        <select class="form-control" name="matiere_id" id="matiere">
                            @foreach ($matieres as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group"  >
                        <label for="titel">Titre</label>
                        <input type="text" class="form-control" name="titel"  value="{{$cours->titel}}"><br>
                    </div>

                    <div class="form-group">
                        <label for="content">Description</label>
                        <textarea class="form-control" name="content" id="content" rows="8" cols="8">{{$cours->content}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="photo">image</label>
                        <br>
                        <div class="upload-btn-wrapper">
                            <button class="btn">choisissez une image</button>
                            <input type="file" name="file" id="file" accept="image/png , image/jpeg" />
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary">Modfier</button>
                </form>
            </div>

        </div>

    </div>

    </div>


@endsection
