<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    // taula de la BD
    protected $table = 'preguntes';
    public $timestamps = false;

    // relacions
    public function respostes(){
        return $this->hasMany('App\Models\Resposta', 'id_pregunta');
    }
}
