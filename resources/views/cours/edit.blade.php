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

            <div class="card-header"><b>Modfier Cours {{$cours->titel}}</b></div>

                <div class="card-body">
                    @if(Session::has("supprimer_video"))
                        <div class="alert alert-success">
                            <b>Video Supprimer</b>
                        </div>
                    @endif
                    @if(Session::has("ajouter_video"))
                        <div class="alert alert-success">
                            <b>Video Ajouter</b>
                        </div>
                    @endif
                    @if(Session::has("creatmatiere"))
                        <div class="alert alert-success">
                            <b>Cours Modfier</b>
                        </div>
                    @endif
<form action="{{route('cours.update',['id' => $cours->id ])}}" enctype="multipart/form-data" method="POST">
                         
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


                        <div class="card-header"><b>Les video de cours</b></div>
                                    @foreach($vids as $vid)
                                        @if($cours->id == $vid->cour_id)
                                            <div class="col-md-4">
                                                <video width="200" height="200" controls>
                                                    <source src="{{ URL::asset($vid->video)}}" type="video/mp4">
                                                </video>
                                                <a href="{{route('supprimer_cours_video',['id_vid'=>$vid->id])}}" style="color: red;" onclick="return myFunction();"><h3>Supprimer le video</h3></a>
                                            </div>
                                        @endif
                                    @endforeach




            </div>

        </div>

    </div>

</div>
    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="card-header"><b>Ajouter un video</b></div>
                <form action="{{route('video.update',['id' => $cours->id ])}}" method="GET" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="video">Video de cours</label>
                        <br>
                        <div class="upload-btn-wrapper">
                            <button class="btn">choisissez une Video</button>
                            <input type="file" name="video[]" id="video" accept="video/mp4" multiple>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </form>

        </div>
    </div>

@endsection
