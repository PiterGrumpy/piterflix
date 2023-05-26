<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\BusquedaPeliculaRequest;
use App\Http\Requests\AdminMediaRequest;
use App\Http\Requests\AddCapituloRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\DataBaseController;
use App\Models\Media;
use App\Models\Temporada;
use App\Models\Capitulo;
use App\Http\Controllers\MediasController;

class CapitulosController extends Controller
{

    static $my_key;
    static $api_url;
    
    public function __construct()
    {
        self::$my_key = config("constants.API_KEY");
        self::$api_url = config("constants.API_URL");
    }

    public function addCapitulo(AddCapituloRequest $request){
        $serie = Media::find($request->id_media);
        
        $insercion = [];
        $insercion['n_capitulo'] = $request->n_capitulo;
        $insercion['n_temporada'] = $request->n_temporada;
        $insercion['media_id'] = $request->id_media;
        $insercion['nombre'] = $request->nombre;
        $insercion['duracion'] = $request->duracion;
        $insercion['descripcion'] = $request->descripcion;
        $insercion['video'] = $request->video;
        $nuevoCapitulo = Capitulo::create($insercion);
        if ($nuevoCapitulo) {
            return redirect()->route('dashboard')->with('success', '¡El capítulo'. $request->n_capitulo .' de la temporada '. $request->n_temporada .' en la serie '. $serie->titulo .' ha sido añadido a la base de datos con éxito!');
        } else {
            return redirect()->route('dashboard')->with('error', '¡Hubo un problema al añadir el capítulo a la base de datos!');
        }        
    }

}