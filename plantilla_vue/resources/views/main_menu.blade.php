@extends('templates.main')

@section('titulo')
    Menu
@endsection

@section('principal')

    <div class="row">
        
        <a href="{{ url('/quiz') }}">
            <button class="btn bg-primary">
                CSGO
            </button>
        </a>        
        
        <a href=" {{ url('/milionari') }}">
            <button class="btn bg-seconadry">
                MIllonari
            </button>
        </a>        

    </div>


    <footer class="" id="footer">

        <div class="text-center">
            <!-- anuncio -->
            © 2020 Copyright:
        </div>
  
    </footer>

@endsection

