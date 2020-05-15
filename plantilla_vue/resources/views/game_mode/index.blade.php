@extends('templates.main')

@section('titulo')
    Game Info
@endsection

@section('principal')

    <h1 class="mt-3" style="text-align: center">
        Este es el modo de GAME QUIZ
    </h1>
    <div class="textogamequiz">
        <p>
            <h3>Consta de 10 preguntas!</h3>
        </p>
        <p>
            <h3>Las cuales tratan sobre el juego de counter strike global offensive.</h3>
        </p>
        <p>
            <h3>Son todas sobre temas como: Cuantas balas tiene X arma, Cuanto dinero gano si... , etc... (no te daré más pistas ;D ).</h3>
        </p>
        <p>
            <h3>Si recargas la página se reiniciarán las preguntas, asi que <b>intenta NO recargar</b> la página hasta acabar el juego, donde teneis un resumen de los aciertos y fallos.</h3>
        </p>
        <p>
            <h3>Si te ha gustado no dudes en volver a jugar! A ver si aciertas todas. BUENA SUERTE</h3>
        </p>
    </div>

    <form action="{{ url('/game_mode') }}" style="text-align:center;">
        <input type="submit" id="botongamequiz" class="btn btn-dark" value="LET'S GO GAME MODE" />
    </form>


    <footer class="" id="footer">

        <div class="text-center">
            <!-- anuncio -->
            © 2020 Copyright:
        </div>
    
    </footer>

@endsection
