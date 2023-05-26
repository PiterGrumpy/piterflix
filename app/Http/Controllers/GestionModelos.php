<?php

namespace App\Http\Controllers;


use Illuminate\View\View;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Model;
use App\Models\Genero;
use App\Models\GeneroMedia;
use App\Models\Productora;
use App\Models\Media;
use App\Models\Interprete;
use App\Models\Interpretacion;
use App\Models\Temporada;
use App\Models\Capitulo;
use App\Models\Director;
use App\Models\Direccion;

class GestionModelos extends Controller {
    
    public static function existeOCrea(array $check, array $values = [], $modelo)
    {
        $claseModelo = 'App\\Models\\'.$modelo;
        
        if (!class_exists($claseModelo)) {
            return false;
        }  
        if (! is_null($instance = $claseModelo::where($check)->first())) {
            return false;
        } else {
            $newInstance = $claseModelo::create($values);
           return $newInstance->id;
       }
    }

    public static function existe(array $check, $modelo) {
        $claseModelo = 'App\\Models\\'.$modelo;
        return class_exists($claseModelo);
    }
}