@extends('templates.main')

@section('titulo')
    CSGOQUIZ
@endsection

@section('principal')

<div class="container-fluid">

    <h1 class="tituloabout">Sobre esta aplicación y sobre mi</h1>

    <div class="row">
        <div class="col-md-12 col-sm-12 centerabout">
            Muy buenas a tod@s , esta aplicación web es mas que nada un proyecto personal, ya que tenia ganas de hacer algo
            de mi terreno (programación) y algo relacionado con los juegos que juego y el Counter Strike Global Offensive es 
            uno de mis juegos favoritos.</br>
            Llevo jugandolo desde 2015 y con eso me refiero que tengo muchas horas jugadas y muchos ratos divertidos, ya sean
            con amigos o con guiris, que tambien hay partidas que molan la verdad.</br>
            Basicamente esto es una introducción a mi persona pero aqui estamos para jugar y pasar un buen rato y si no sabias 
            alguna cosa pues mira, aprender algo, que siempre viene bien aprender y mas si es de tu juego.</br>
            Esta aplicación web consta de 3 quiz (que son basicamente preguntas) donde hay mas de 200 preguntas diferentes y donde
            cada uno de los quiz es sobre un tema diferente:</br>
            - Tenemos el "Tournament Quiz" que es un quiz sobre todos los torneos que han habido hasta la fecha, donde las 
            preguntas seran sobre todo lo que ha pasado en los torneos.</br>
            - Tenemos el "Game Quiz" donde es un quiz que las preguntas son de todo el juego y con esto me refiero a todo
            lo que viene siendo las armas, el dinero, las rondas, los mapas, etc...</br>
            - Y por último pero no menos importante, el "Rank Quiz" que basicamente es un MIX de los dos quiz pero con puntuación 
            y con TIEMPO , importante , dependiendo de tu puntuación final pues te dará como resultado un ranking. </br>
            Espero que disfrutes y si te gusta , pues ya sabes, compartelo con tus amigos a ver quien es el mejor en el CSGO o 
            quien tiene mejor ranking!
        </div>
        <div class="col-md-6 col-sm-12 centerabout">

                <div class="card" style="border-radius: 5px;background-color: #c5c5c5;padding: 10px;">

                    <form action="{{action('Controller@sendmail')}}" method="POST">

                        @csrf
                        <h3>Quieres proponer alguna pregunta para añadir?</h3>

                        <p>Escribe la pregunta</p> 
                        <input type="text" name="pregunta" placeholder="Que pregunta quieres hacer?">

                        <p>Tema de la pregunta:</p>
                        <select id="cbxtema" name="tema" required>
                            <option value="game">Game</option>
                            <option value="tournament">Torneo</option>
                        </select>

                        <p>Respuesta correcta de tu pregunta</p>
                        <textarea name="mensaje" rows="5" cols="25" placeholder="Tambien si quieres puedes poner respuestas incorrectas"></textarea><br />

                        <button type="submit" class="btn btn-dark" name="pregunta">Enviar</button>

                    </form>
                    
                </div>
            
                Apoyarme en PP

                mandar una pregunta
        </div>

        <div class="col-md-6 col-sm-12 centerabout">

            <div class="card" style="border-radius: 5px;background-color: #c5c5c5;padding: 10px;">

                <form action="{{action('Controller@sendmail')}}" method="POST">

                    @csrf
                    <h3>Quieres contactar conmigo?</h3>

                    <p>Asunto de tu mail</p> 
                    <input type="text" name="asunto" placeholder="El asunto">

                    <p>Que quieres preguntarme o decirme?</p>
                    <textarea name="mensaje" rows="5" cols="25"></textarea><br />

                    <button type="submit" class="btn btn-dark" name="mail">Enviar</button>

                </form>
                
            </div>
        
            Apoyarme en PP

            mandar una pregunta
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

