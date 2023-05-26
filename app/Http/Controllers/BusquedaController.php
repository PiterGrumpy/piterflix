<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Http;
use App\Models\Genero;
use App\Models\Media;
use App\Models\Interprete;
use App\Models\GeneroMedia;

class BusquedaController extends Controller
{
    
    public function buscar(Request $request) {
        
        if (is_null($request->busqueda)) {
            $busqueda = $this->busquedaAvanzada($request);
            
        } else {
            $busqueda = $this->busquedaSimple($request);
        }
        return view('pages.busqueda-respuesta',['busqueda' => $busqueda]);
    }
    public function busquedaAvanzada(Request $request) { 
     
        $titulo = $request->titulo;
        $cast = $request->nombre;
        $year = $request->ano_lanzamiento;
        $generos = $request->generos;
        $media = array();
        $media[0] = $request->tipo;
        
        if (strlen($titulo) != 0) {
            $current_titulo = Media::where('titulo', 'LIKE', '%'.$titulo.'%')->get();
            array_push($media, $current_titulo);
        }

        if (strlen($cast) != 0) {
            $current_cast = Media::whereHas('interpretes', function($query) use ($cast) {
                $query->where('nombre', 'LIKE', '%' . $cast . '%');
            })->get();
            array_push($media, $current_cast);
        }
        if (strlen($year) != 0) {
            $current_year = Media::where('anoEstreno', '=', intval($year))->get();
            array_push($media, $current_year);
        }
        
        if(!is_null($generos)) {   
            for ($i = 0; $i < count($generos); $i++) {
                $current_genero = $generos[$i];
                $current_media_genero = Media::whereHas('generos', function($query) use ($current_genero) {
                    $query->where('nombre', '=', $current_genero);
                })->get();
                array_push($media, $current_media_genero);
            }
        }
        
        $media = $this->limpiarBusqueda($media);
        
        return $media;
    }
    public function busquedaSimple($request) {
        
        $busqueda = [];
        $busqueda[0] = $request->busqueda;
        $media = array();
        
        if ($busqueda[0] != null) {
            $current = $busqueda[0];
            $busqueda[1] = Media::where('titulo', 'LIKE', '%'.$current.'%')->get();
            $busqueda[2] = Media::whereHas('interpretes', function($query) use ($current) {
                $query->where('nombre', 'LIKE', '%' . $current . '%');
            })->get();
            $busqueda[3] = Media::whereHas('directores', function($query) use ($current) {
                $query->where('nombre', 'LIKE', '%' . $current . '%');
            })->get();
            $busqueda[4] = Media::where('anoEstreno', '=', intval($current))->get();
            $busqueda[5] = Media::whereHas('generos', function($query) use ($current) {
                $query->where('nombre', 'LIKE', '%' . $current . '%');
            })->get();
           
            $busqueda = $this->limpiarBusqueda($busqueda);
        }
        return $busqueda;
    }

    public function limpiarBusqueda(array $busqueda) {
        $nueva_busqueda = [];
        for($i = 1; $i < count($busqueda); $i++) {
            if (!$busqueda[$i]->isEmpty()) {
                foreach($busqueda[$i] as $current) {
                    array_push($nueva_busqueda, $current);
                }
            }
        }
        $nueva_busqueda = array_unique($nueva_busqueda, SORT_REGULAR);
        
        if(strcasecmp($busqueda[0], "pelicula") == 0 || strcasecmp($busqueda[0], "serie") == 0) {
            foreach($nueva_busqueda as $indice => $current) {
                if(strcasecmp($current->tipo, $busqueda[0]) != 0){
                    unset($nueva_busqueda[$indice]);
                }
            }
        }
        return $nueva_busqueda;
    }
}