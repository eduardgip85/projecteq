@extends('templates.main')

@section('titulo')
    CSGOQUIZ
@endsection

@section('principal')

<div class="row menucenter">
  
  <div class="card-deck" >

      <a onclick="" class="card text-center" id="card-boostrap">
        
          <img class="card-img-top" src="/img/tournament.jpg" alt="Card image cap">
          <div class="card-body">          
            <button type="button" class="btn boto-secondari" action>
              <h5 class="mt-2">Tournament Quiz</h5>
            </button>
          </div>
        
      </a>

      <a onclick="window.location='{{ url('/game') }}'" class="card text-center" id="card-boostrap">
        
          <img class="card-img-top" src="/img/game.jpg" alt="Card image cap">
          <div class="card-body">        
            <button type="button" class="btn boto-secondari" action>
              <h5 class="mt-2">Game Quiz</h5>
            </button>
          </div>
        
      </a>
        

      <a onclick="" class="card text-center" id="card-boostrap">
        
          <img class="card-img-top" src="/img/rankss.jpg" alt="Card image cap">
          <div class="card-body">
            <button type="button" class="btn  boto-secondari" action>
              <h5 class="mt-2">What is your rank?</h5>
            </button>
          </div>
        
      </a>
    
</div>

<footer class="" id="footer">

  <div class="text-center">
      <!-- anuncio -->
      © 2020 Copyright:
  </div>

</footer>

@endsection