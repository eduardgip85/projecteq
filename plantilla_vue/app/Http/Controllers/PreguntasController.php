<?php

namespace App\Http\Controllers;

use App\Models\Pregunta;
use Illuminate\Http\Request;

class PreguntasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $preguntas = Pregunta::all();

        /*AQUI FER EL ARRAY DE PREGUNTAS PERO NOMES 10 I ALEATORIAS CADA VEGADA SENSE REPETICIO!!!
        $i=0;
        $arraynumeros=[];

        while($i < 10 ){
            $numale = rand (0 ,count($preguntas) );

            if(!in_array($numale, $arraynumeros)){
                
                $arraynumeros[]=$numale;
                $i++;
            }
        }
        */
        

        $data['preguntas'] = $preguntas;
        //$data['numeros'] = $arraynumeros;

        //return view('quiz.menu',$data);
        return view('quiz.game', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\preguntas  $preguntas
     * @return \Illuminate\Http\Response
     */
    public function show(Pregunta $preguntas)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\preguntas  $preguntas
     * @return \Illuminate\Http\Response
     */
    public function edit(Pregunta $preguntas)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\preguntas  $preguntas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pregunta $preguntas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\preguntas  $preguntas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pregunta $preguntas)
    {
        //
    }
}
