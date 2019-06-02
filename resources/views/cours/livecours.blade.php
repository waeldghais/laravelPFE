@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-6">
                <button onclick="playVid()" type="button" class="btn btn-primary">Démarrer le Video</button>

        <video controls id="video" width="700px" height="400"  style="margin: auto"></video>
        <canvas id="canvas" width="700px" height="400"></canvas>

    </div>
                <div class="col-sm-6">


                </div>
    </div>
        </div>
    </div>
    <script src="{{ URL::asset('assets/js/video.js')}}"></script>
    <script src="{{ URL::asset('assets/js/simperre.js')}}"></script>
@endsection
