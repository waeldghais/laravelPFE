@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card-header"><b>Modfier paramétres</b></div>

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
                        @if(Session::has("Setting"))
                            <div class="alert alert-success">
                                <b>Paramétres modfier</b>
                            </div>
                        @endif
  <form  action="{{route('settings.update')}}" method='GET'>
    {{ csrf_field() }}

  <div class="form-group"  >
    <label for="blog_name">Nom</label>
    <input type="text" class="form-control" name="blog_name"  value="{{$Settings->blog_name}}">
  </div>

  <div class="form-group"  >
    <label for="phone_number">téléphone 1</label>
    <input type="text" class="form-control" name="phone_number"  value="{{$Settings->phone_number}}">
  </div>

      <div class="form-group"  >
          <label for="other_Phone">téléphone 2</label>
          <input type="text" class="form-control" name="other_Phone"  value="{{$Settings->other_Phone}}">
      </div>

  <div class="form-group"  >
    <label for="blog_email">email</label>
    <input type="text" class="form-control" name="blog_email"  value="{{$Settings->blog_email}}">
  </div>

  <div class="form-group"  >
    <label for="adresse">adresse</label>
    <input type="text" class="form-control" name="adresse"  value="{{$Settings->adresse}}">
  </div>

      <div class="form-group"  >
          <label for="adresse">RIB</label>
          <input type="text" class="form-control" name="RIB"  value="{{$Settings->RIB}}">
      </div>
  <button type="submit" class="btn btn-primary">Modfier</button>
</form>
            </div>

    </div>
</div>
@endsection
