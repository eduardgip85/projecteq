@extends('templates.main')

@section('titulo')
    Game Info
@endsection

@section('principal')

    <h1 class="mt-5">
        WE ARE INGAME
    </h1>
    {{-- passem el mode de preguntes i el num de preguntes --}}
    <principal-pregunta mode={{$mode}} num_preguntes={{$num_preguntes}}>
    </principal-pregunta>    

@endsection
