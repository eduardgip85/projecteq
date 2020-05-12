@extends('templates.main')

@section('titulo')
    CSGOQUIZ
@endsection

@section('principal')

    <div class="row">
        <div class="col-md-5 col-sm-12">
            <div class="center">
                <div class=""  >
                    <img src=" {{ asset('img/fondo.jpg') }}" alt="" class="imgcenter">
                </div>
                
            </div>
        </div>
          <div class="col-md-7 col-sm-12">
            <div class="center text-main">
                
                <h2>
                    BIENVENIDOS AL GLOBAL QUIZ CSGO ELITE! 
                </h2>

                Bienvenidos al QUIZ de CSGO donde si creias que sabias todo de este juego
                aqui tienes muchisimas preguntas sobre los torneos de Counter Strike Global Offensive
                y sobre el mismo juego ( preguntas de armas, preguntas del juego entre rondas, preguntas
                sobre los mapas que se juegan, etc...).
                </br></br>
                Si crees que eres el dios del aim, si crees que te pareces a S1mple, vamos a ver si 
                aciertas todas las preguntas correctamente.
                </br></br>
                Cada sección consta de 10 preguntas, totalmente aleatorias cada vez que inicias un quiz
                </br></br>
                Y si quieres saber tu RANGO , prueba el RANK QUIZ donde las 10 preguntas seran con tiempo y 
                dependiendo de tu puntuación se te asignara un rango. A ver si llegas a GLOBAL!!
                </br></br>

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

