@extends('templates.main')

@section('titulo')
    Game MIllonario
@endsection

@section('principal')

    {{-- Milionare --}}    
    @switch($nivell)
    @case(1)
        <h1>Millonario nivel facil</h1>
        @break

    @case(2)
        <h1>Millonario nivel medio</h1>
        @break
    @case(3)
        <h1>MIllonario nivel dificl</h1>
        @break

    @default
        <span>Something went wrong, please try again</span>
    @endswitch

    <principal-pregunta mode={{$mode}} num_preguntes={{$num_preguntes}} nivell={{$nivell}}>
    </principal-pregunta>   

@endsection