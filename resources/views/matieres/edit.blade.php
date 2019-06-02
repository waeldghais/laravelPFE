@extends('layouts.app')

@section('content')
<div>
    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="card-header"><b>Modfier Matiere</b></div>

                <div class="card-body">
                    @if(Session::has("creatcours"))
                        <div class="alert alert-success">
                            <b>Matiére Modfier</b>
                        </div>
                    @endif
  <form  action="{{route('matieres.update',['id' => $matiere->id ])}}" methode='POST'>
    {{ csrf_field() }}

  <div class="form-group"  >
    <label for="name">name</label>
    <input type="text" class="form-control" name="name"  value="{{$matiere->name}}">
  </div>
  <button type="submit" class="btn btn-primary">update</button>
</form>
            </div>

    </div>
</div>
@endsection
