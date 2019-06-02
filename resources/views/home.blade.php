@extends('layouts.app')

@section('content')



    <div class="row justify-content-center ">

        <div class="col-md-10" style="margin-top: 25px">

            <center><img src="{{ URL::asset('assets/img/LOGO-Pro.png')}}" height="80px" width="150px"></center>
            <canvas id="myChart"  style="max-height: 50% !important; "></canvas>





        </div>
    </div>
@endsection

@section('javascripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js"></script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['nombre enseignants', ' nombre etudiants',' nombre des packs','nombre des cours gratuit','Nombre des cours payant',"Nombre des demande d'enseignants","nombre des virments"],
                datasets: [{
                    label: 'statistique' ,
                    data: [{{$ens->count()}},{{$etudiants->count()}},{{$pack->count()}},{{$coursg}},{{$coursp}},{{$demandeEns->count()}},{{$vir->count()}}],
                    backgroundColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
@endsection
