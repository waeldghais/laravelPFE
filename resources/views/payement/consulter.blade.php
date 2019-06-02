@extends('layouts.app')

@section('content')
    <div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                    <div class="card-header">Le Virement de {{$etud->name}}  {{$etud->prenom}}</div>
                    <div class="card-body">

                        <center><img src="{{asset($pai->photo)}}"  width="500px" height="200px" class="img-thumbnail"></center>

                        <form  action="{{route('valider_virement',['etud_id'=>$etud->id,'pai_id'=>$pai->id])}}" methode='GET'>

                            <div class="form-group"  >
                                <label for="solde">Montant</label>
                                <input type="number" class="form-control" name="solde" >
                            </div>
                            <button type="submit" class="btn btn-primary">Ajouter le montant</button>
                        </form>
                        <a href="{{route('Annuler_virement',['pai_id'=>$pai->id])}}"><button type="submit" class="btn btn-danger">Réfuser le virment</button></a>
                    </div>

            </div>
        </div>
    </div>
    @endsection
