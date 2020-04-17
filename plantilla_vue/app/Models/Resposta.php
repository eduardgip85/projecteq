<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resposta extends Model
{
    // taula de la BD
    protected $table = 'respostes';
    public $timestamps = false;

    public function pregunta(){
        return $this->belongsTo('App\Models\Pregunta', 'id_pregunta');
    }
}
