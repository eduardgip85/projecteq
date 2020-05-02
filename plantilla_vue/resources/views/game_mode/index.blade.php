@extends('templates.main')

@section('titulo')
    Game Info
@endsection

@section('principal')

    <h1 class="mt-5">
        Game mode infoo
    </h1>
    <p>
        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
    </p>
    <form action="{{ url('/game_mode') }}">
        <input type="submit" id="botongo" class="btn btn-dark" value="LET'S GO GAME MODE" />
    </form>

@endsection
