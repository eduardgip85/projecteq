<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pregunta;
use Illuminate\Http\Request;

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
     * @param  \App\Models\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $pregunta = Pregunta::find($id);
        $pregunta = Pregunta::with('respostes')->find($pregunta->id);

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
}
