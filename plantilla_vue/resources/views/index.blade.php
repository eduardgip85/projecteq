@extends('templates.main')

@section('titulo')
    MASTER QUIZ
@endsection

@section('principal')

    <div class="row">
        <div class="col-md-5 col-sm-12">
            <div class="center">
                <div class=""  >
                    <img src=" {{ asset('img/logoMQ3.PNG') }}" alt="" class="imgcenter">
                </div>
                
            </div>
        </div>
          <div class="col-md-7 col-sm-12">
            <div class="center text-main">
                
                <h1>
                    BIENVENIDOS A <b>MASTER QUIZ</b> 
                </h1>
                <p>
                    <h4>
                        Bienvenidos a la aplicación de Master Quiz, donde pondrás a prueba tu <b>Intelecto</b>,
                         tu <b>Rapidez</b> y tu toma de decisión para llegar a pasar todas las preguntas y ser 
                         el mejor MASTER QUIZ de la historia!
                    </h4>
                </p>
                <p>
                    <h4>
                        En esta app web, podrás escoger entre 2 temas (de momento), uno es el <b>Millonario Quiz</b>
                        dónde jugarás un simulador para ganar 1M de Euros y que consta de 12 preguntas y que cada 4 
                        preguntas tienes la opción de plantarte por una cantidad menor.
                    </h4>
                </p>
                <p>
                    <h4>
                        El otro tema es el <b>CSGO Quiz</b>, dónde tendrás que acertar todas las preguntar sobre el 
                        famoso juego de disparos COUNTER STRIKE GLOBAL OFFENSIVE.
                    </h4>
                </p>
                <p>
                    <h3>
                        CREES QUE PODRÁS GANAR EN ALGUNO?
                    </h3>
                </p>
                
               

                <form action="{{ url('/menu') }}">
                    <input type="submit" id="botongo" class="btn btn-dark" value="LET'S GO" />
                </form>
                
            </div>

        </div>
    </div>


    <footer class="" id="footer">

        <div class="text-center">
            <!-- anuncio -->
            © 2020 Copyright:
        </div>
  
    </footer>

@endsection

