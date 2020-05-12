@extends('templates.main')

@section('titulo')
    Milionare
@endsection

@section('principal')

<div class="row menucenter">
  
  <div class="card-deck" >

        <!-- Facil -->
        <a onclick="window.location='{{ url('/millonario/facil') }}'" class="card text-center" id="card-boostrap">
                
            <img class="card-img-top" src="/img/game.jpg" alt="Card image cap">
            <div class="card-body">        
                <button type="button" class="btn boto-secondari" action>
                <h5 class="mt-2">Facil</h5>
                </button>
            </div>
            
        </a>

        <!-- Normal -->
        <a onclick="window.location='{{ url('/millonario/normal') }}'" class="card text-center" id="card-boostrap">
            
            <img class="card-img-top" src="/img/game.jpg" alt="Card image cap">
            <div class="card-body">        
                <button type="button" class="btn boto-secondari" action>
                <h5 class="mt-2">Normal</h5>
                </button>
            </div>
            
        </a>
            
        <!-- Dificl -->
        <a onclick="window.location='{{ url('/millonario/dificil') }}'" class="card text-center" id="card-boostrap">
            
            <img class="card-img-top" src="/img/rankss.jpg" alt="Card image cap">
            <div class="card-body">
                <button type="button" class="btn  boto-secondari" action>
                <h5 class="mt-2">Dificil</h5>
                </button>
            </div>
            
        </a>
    </div>    
</div>

@endsection