@extends('templates.main')

@section('titulo')
    Menu
@endsection

@section('principal')

<div class="row menucenter">
  
    <div class="card-deck" >
  
        <a onclick="window.location='{{ url('/quiz') }}'" class="card text-center" id="card-boostrap">
          
            <img class="card-img-top" src="{{ asset('img/tournament.jpg') }}" alt="Card image cap">
            <div class="card-body">          
              <button type="button" class="btn boto-secondari" action>
                <h5 class="mt-2">CSGO</h5>
              </button>
            </div>
          
        </a>
  
        <a onclick="window.location='{{ url('/milionari') }}'" class="card text-center" id="card-boostrap">
          
            <img class="card-img-top" src="{{ asset('/img/millonario.jpg')}}" alt="Card image cap">
            <div class="card-body">        
              <button type="button" class="btn boto-secondari" action>
                <h5 class="mt-2">Millonario</h5>
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

