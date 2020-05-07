<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Resposta;
use Illuminate\Http\Request;

use App\Models\Pregunta;

//ojito x2
use App\Classes\Utilitat;
use App\Http\Resources\RespostaResource;
use Illuminate\Database\QueryException;

class RespostaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $respostes = Resposta::all();

        return new RespostaResource($respostes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // creem objecte resposta
        $resposta = new Resposta();

        // assignem els valors de la reques a l'object resposta
        $resposta->id_pregunta = $request->input('id_pregunta');
        $resposta->text_resposta = $request->input('text_resposta');
        $resposta->es_correcta = $request->input('es_correcta');

        // provem de guardar la respota
        try 
        {
            $resposta->save();
            $respostaApi = 
                (new RespostaResource($resposta))
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
     * @param  \App\Models\Resposta  $resposta
     * @return \Illuminate\Http\Response
     */
    public function show(Resposta $resposta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Resposta  $resposta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resposta $resposta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Resposta  $resposta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resposta $resposta)
    {
        //
    }

    //
    public function validarResposta(string $id_respota)
    {
        $resposta = Resposta::find($id_respota);

        $pregunta = Pregunta::find($resposta->id_pregunta);

        $correcte = false;
        
        // comprevem la resposta de l'usuari amb al resposta correcta de la pregunta
        if( !strcmp($resposta->text_resposta, $pregunta->resposta_correcta)){
            $correcte = true;
        }

        return [$correcte];
    }
}
