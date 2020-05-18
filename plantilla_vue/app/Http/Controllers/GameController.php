<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pregunta;

class GameController extends Controller
{
    //
    public function index(){
        return view('csgoquiz.game_mode.index');
    }

    public function ingame(){
        // posarem el model del joc
        $mode = "game";
        // quantes preguntes tindrà 
        $num_preguntes = "10";
        // nivell de les preguntes
        $nivell = "1";
        // retornem view amb les dades
        return view('csgoquiz.game_mode.ingame', compact('mode', 'num_preguntes', 'nivell'));
    }
}
