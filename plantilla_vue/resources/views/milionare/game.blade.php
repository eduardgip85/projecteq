@extends('templates.main')

@section('titulo')
    Game MIllonario
@endsection

@section('principal')

    {{-- Milionare --}}


    <h1>
        MIlionari facil
    </h1>
    <principal-pregunta mode={{$mode}} num_preguntes={{$num_preguntes}} nivell={{$nivell}}>
    </principal-pregunta>   

@endsection