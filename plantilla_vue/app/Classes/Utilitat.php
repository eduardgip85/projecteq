<?php

namespace App\Classes;

class Utilitat{

    public static function errorMessage($e){
        
        if(!empty($e->errorInfo[1]))
        {
            switch($e->errorInfo[1])
            {
                case 1062:
                    $missatge = 'Registre duplicat';
                    break;
                case 1451:
                    $missatge = 'Registre amb elements relacionats';
                    break;
                default: 
                    $missatge = $e->errorInfo[1] . ' - ' . $e->errorInfo[2];
                    break;
            }
        }
        else
        {
            switch($e->getCode())
            {
                case 1044:
                    $missatge = 'Usuari i/o password incorrecte';
                    break;
                case 1049:
                    $missatge = 'Base de dades desconeguda';
                    break;
                case 2002:
                    $missatge = 'Servidor no trobat';
                    break;
                default:
                    $missatge = $e->getCode() . ' - ' . $e->getMessage();
                    break;
            }
        }
        return $missatge;
    }
}