@extends('templates.main')

@section('titulo')
    MASTERQUIZ
@endsection

@section('principal')

<div class="container-fluid">

    <h1 class="tituloabout">Sobre esta aplicación y sobre nosotros</h1>

    <div class="row">
        <div class="col-md-8 col-sm-12 centerabout">
            <p>
                <h3>
                    Muy buenas a tod@s , esta aplicación web es un proyecto de 2 personas. Teniamos ganas de hacer algo
                    de nuestro terreno (programación) y que podámos decir que es nuestro, algo relacionado con los juegos que juegamos
                    y cuestiones de diferentes temas como la de Millonario.
                </h3>
            </p>
            <p>
                <h3>
                    Hoy por hoy, esta aplicación web consta de 2 tipos de quiz donde hay mas de 300 preguntas diferentes:
                </h3>
                <h4>
                    - Tenemos el "Game Quiz" donde es un quiz que las preguntas son de todo el juego y con esto me refiero a todo
                    lo que viene siendo las armas, el dinero, las rondas, los mapas, etc...
                </br>
                    - Y tenemos el "Millonario Quiz" donde es un quiz que las preguntas irán por niveles (fácil, normal y difícil), y dependiendo
                    de que numero de pregunta estés, tendrás la opción de plantarte con X cantidad de dinero.
                </h4>
            </p>
            
            
        </div>

        <div class="col-md-4 col-sm-12 centerabout">

                <div class="card" style="border-radius: 5px;background-color: #c5c5c5;padding: 10px;">
    
                    <form action="https://formspree.io/eduardgip85@gmail.com" method="POST">
    
                        <h3>Quieres contactar con nosotros?</h3>

                        <p>Asunto de tu mail</p> 
                        <input type="text" class="single-input" placeholder="Asunto" name="name" value="" required>

                        <p>Tu email</p> 
                        <input type="email" class="single-input" placeholder="Tu email" name="_replyto" value="" required>
    
                        <p>Que quieres preguntarme o decirme?</p>
                        <textarea name="message" rows="5" placeholder="Escribe algo.." cols="25"></textarea><br />
    
                        <button type="submit" class="btn btn-dark" name="mail" value="submit">Enviar</button>
    
                    </form>
                    
                </div>

        </div>

        <div>
            <p>
                <h2>
                    Espero que disfrutes y si te gusta , pues ya sabes, compartelo con tus amig@s a ver quién es el mejor en el CSGO o 
                    quién gana la mayor cantidad de dinero en el MILLONARIO QUIZ!
                </h2>
            </p>
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

