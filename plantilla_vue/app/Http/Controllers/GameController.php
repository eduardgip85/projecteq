<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pregunta;

class GameController extends Controller
{
    //
    public function index(){
        return view('game_mode.index');
    }

    public function ingame(){
        $mode = "game";
        $num_preguntes = "2";
        return view('game_mode.ingame', compact('mode', 'num_preguntes'));
    }
}
