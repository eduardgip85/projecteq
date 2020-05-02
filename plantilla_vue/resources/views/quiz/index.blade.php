@extends('templates.main')

@section('titulo')
    CSGOQUIZ
@endsection

@section('principal')

<table class="table">
    <thead>
        <tr>
            <th>ID _ Pregunta</th>
            <th>Pregunta</th>
            <th>Respuestas</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($preguntas as $p)

            <tr>
                <td>{{ $p->id_pregunta}} </td>
                <td>{{ $p->pregunta_completa}} </td>
                <td>{{ $p->resposta_correcta}} </td>
                <td>{{ $p->resposta_incorrecta_1}}</td>
                <td>{{ $p->resposta_incorrecta_2}}</td>
                <td>{{ $p->resposta_incorrecta_3 }}</td>


            </tr>

        @endforeach
    </tbody>
</table>

<footer class="" id="footer">

    <div class="text-center">
        <!-- anuncio -->
        © 2020 Copyright:
    </div>

</footer>


@endsection

