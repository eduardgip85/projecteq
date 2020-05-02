@extends('templates.main')

@section('titulo')
    CSGOQUIZ
@endsection

@section('principal')

    <div class="col-md-12 col-sm-12" style="text-align: center; padding: 20px">
        <div class="tipodequiz" style=" font-size: 40px;">Game Quiz</div>
    </div>

    <div class="row" id="divrespostes">
        <div class="col-md-12 col-sm-12 resposta" >
            <div class="resposta1" data-respuesta="1" onclick="doa()">Resposta 1</div>
        </div>
        <div class="col-md-12 col-sm-12 resposta" >            
            <div class="resposta2" data-respuesta="2">Resposta 2</div>
        </div>
        <div class="col-md-12 col-sm-12 resposta" >
            <div class="resposta3" data-respuesta="3">Resposta 3</div>
        </div>
        <div class="col-md-12 col-sm-12 resposta" >
            <div class="resposta4" data-respuesta="4">Resposta 4</div>
        </div>
    </div>


@endsection