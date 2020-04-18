@extends('templates.main')

@section('titulo')
    CSGOQUIZ
@endsection

@section('principal')

<div class="row menucenter">
    <div class="col-md-4 col-sm-12 p-0 element" >
        <a > <img src=" {{ asset('img/tournament.jpg') }}" style="width:100%;"></a>
        <div class="textoimagencentrada">Tournament Quiz</div>
    </div>
    <div class="col-md-4 col-sm-12 p-0 element">
        <a href="{{ url('/game') }}"> <img src=" {{ asset('img/game.jpg') }}" style="width:100%;" alt="Game quiz" ></a>
        <div class="textoimagencentrada">Game Quiz</div>
    </div>
    <div class="col-md-4 col-sm-12 p-0 element">
        <img src=" {{ asset('img/rankss.jpg') }}" alt="Ranks QUiz" style="width: 100%">
        <div class="textoimagencentrada">What is your rank?</div>
        
    </div>
</div>

@endsection