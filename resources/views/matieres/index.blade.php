@extends('layouts.app')
<script>
    function myFunction() {
        if(!confirm("Êtes-vous sûr de supprimer cette matiére))
            event.preventDefault();
    }
</script>
@section('content')
<div >
    <div class="row justify-content-center">
        <div class="col-md-10">

                <div class="card-header"><b>Matieres</b></div>

                <div class="card-body">

@if ($matieres->count()>0)

 
<table class="table ">

  <tbody>
  
    <tr>
      @foreach($matieres as $category)
      <th scope="row">{{$category->name}}</th>
      <td><a class="" href="{{route('matieres.edit',['id'=>$category->id])}} ">

              <button type="button" class="btn btn-dark">Modfier</button>
      </a>
</td>
      <td><a class="" href="{{route('matieres.delete',['id'=>$category->id])}} " onclick="return myFunction();">
              <button type="button" class="btn btn-danger">Supprimer</button>
      </a></td>
    </tr>
@endforeach
 @else
  <p scope="row" class="text-center">Aucune matiere</p>  
  @endif
  </tbody>
</table>
            </div>

    </div>
</div>
@endsection


