@extends('layouts.app')
@section('content')
    <div>
        <div class="row justify-content-center">
            <div class="col-md-10">

                <div class="card-header"><b>Les Virements</b></div>
                    <div class="card-body">
                        @if (Session::has('virement_valider'))
                            <div class="alert alert-success">Virement accepter!</div>
                        @endif
                            @if (Session::has('annuler_valider'))
                                <div class="alert alert-danger">Virement réfuser!</div>
                            @endif
                        @if ($paiement->count()>0)

                            <table class="table " >
                                <thead>
                                <tr>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Prenom</th>
                                    <th scope="col">Virement</th>
                                </tr>
                                </thead>
                                <tbody>


                                @foreach($payer as $pay)
                                        @foreach($etuds as $etud)
                                            @if($etud->id == $pay->id_etudiant)
                                    <tr>
                                        <td scope="row">{{$etud->name}}</td>
                                        <td scope="row">{{$etud->prenom}}</td>
                                        @foreach($paiement as $paie)
                                            @if($paie->id == $pay->id_paiement)
                                                <th ><a href="{{route('Consulter_virement',['etud_id'=>$pay->id_etudiant,'pai_id'=>$pay->id_paiement])}}" style="color: #01bafd;">Consulter le virement</a></th>

                                        @endif
                                                @endforeach
                                    </tr>
                                    @endif
                                            @endforeach
                                @endforeach


                                @else
                                    <p scope="row" class="text-center">Aucun virement</p>
                                @endif
                                </tbody>
                            </table>
                    </div>

            </div>
        </div>
@endsection
