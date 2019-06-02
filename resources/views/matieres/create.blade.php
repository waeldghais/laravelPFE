@extends('layouts.app')

@section('content')
<div >
    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="card-header"><b>Créer Matiere</b></div>

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
                        @if(Session::has("creatcours"))
                            <div class="alert alert-success">
                                <b>Matiére Ajouter</b>
                            </div>
                        @endif
  <form  action="{{route('matieres.store')}}" methode='POST'>
    {{ csrf_field() }}

  <div class="form-group"  >
    <label for="name">name</label>
    <input type="text" class="form-control" name="name"  placeholder="Enter title">
  </div>
  <button type="submit" class="btn btn-primary">save</button>
</form>
            </div>

    </div>
</div>
</div>
@endsection
