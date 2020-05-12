<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MillionareController extends Controller
{

        // retorna vista practica joc
    public function facil(){
        // posarem el model del joc
        $mode = "millonario";

        // nivell
        $nivell = "facil";
        // quantes preguntes tindrà 
        $num_preguntes = "20";
        // retornem view amb les dades
        return view('milionare.game', compact('mode', 'num_preguntes', 'nivell'));
    }

    // retorna vista practica joc
    public function normal(){
        // posarem el model del joc
        $mode = "millonario";
        
        $nivell = "normal";

        // quantes preguntes tindrà 
        $num_preguntes = "20";
        // retornem view amb les dades
        return view('milionare.game', compact('mode', 'num_preguntes', 'nivell' ));
    }

    // retorna vista practica joc
    public function dificil(){

        $nivell = "dificil";
        // posarem el model del joc
        $mode = "millonario";
        // quantes preguntes tindrà 
        $num_preguntes = "20";
        // retornem view amb les dades
        return view('milionare.game', compact('mode', 'num_preguntes', 'nivell'));
    }
}
