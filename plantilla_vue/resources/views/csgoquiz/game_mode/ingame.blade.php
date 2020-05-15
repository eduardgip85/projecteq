@extends('templates.main')

@section('titulo')
    Game Info
@endsection

@section('principal')

    <div>
        <h1 class="tituloingame" >
            Estas en el quiz de "Game"
        </h1>
    </div>
    
    {{-- passem el mode de preguntes i el num de preguntes --}}
    <principal-pregunta mode={{$mode}} num_preguntes={{$num_preguntes}} nivell={{$nivell}}>
    </principal-pregunta>    

@endsection
