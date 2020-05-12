<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pregunta;
use Illuminate\Http\Request;

use App\Models\Resposta;

// ojito
use App\Classes\Utilitat;
use App\Http\Resources\PreguntaResource;
use Illuminate\Database\QueryException;

class PreguntaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $preguntes = Pregunta::with('respostes')->get();

        return new PreguntaResource($preguntes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // creem objecte pregunta
        $pregunta = new Pregunta();

        // assignem els valors de la reques a l'object pregunta
        $pregunta->text_pregunta = $request->input('text_pregunta');
        $pregunta->nivell = $request->input('nivell');
        $pregunta->mode_pregunta = $request->input('mode_pregunta');

        // provem de guardar la pregunta
        try 
        {
            $pregunta->save();
            $respostaApi = 
                (new PreguntaResource($pregunta))
                    ->response()
                    ->setStatusCode(201);
        } 
        // si peta
        catch (QueryException $e)
        {
            $missatge = Utilitat::errorMessage($e);
            $respostaApi = response()
                ->json(['error' => $missatge], 400);
        }

        return $respostaApi;
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        // pillem la resposta am,b la id
        $pregunta = Pregunta::find($id);
        $pregunta = Pregunta::with('respostes')->find($pregunta->id);
        $pregunta = Pregunta::with('respostes')->where('id',$pregunta->id)->get();

        return new PreguntaResource($pregunta);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pregunta $pregunta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pregunta $pregunta)
    {
        //
    }

    // pillar en funcio del mode_pregunta i num maxim
    public function preguntes_mode(string $mode, int $nivell, int $num)
    {
        /*
        per a obtenir totes les preguntes amb el mode
        $preguntes_mode = Pregunta::where('mode_pregunta', 'like','%'.$mode.'%')->
            with('respostes')->get()*/
        
        //agafem totes les preguntes amb el mode passat com a parametre,
        // agafem un num random de preguntes passat per com a parametre
        /*$preguntes_mode = Pregunta::where('mode_pregunta', 'like','%'.$mode.'%')->
            with('respostes')->get()->random($num);*/
        //no agafem la columna reposta
        $preguntes_mode = Pregunta::where(
                [
                    ['mode_pregunta', 'like','%'.$mode.'%'], 
                    ['nivell', 'like','%'.$nivell.'%']
                ])->with('respostes')->get(['id','text_pregunta','nivell', 'mode_pregunta'])->random($num);

        return new PreguntaResource($preguntes_mode);
    }

   
}
