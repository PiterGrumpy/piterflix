<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\FavoritosController;
use App\Models\Genero;
use App\Models\GeneroMedia;
use App\Models\Media;
use App\Models\Temporada;
use App\Models\Capitulo;

class IndexController extends Controller
{
    
    public function cargarMediasCarrusel() { 
        $medias = DB::table('medias')
            ->orderBy('anoEstreno', 'desc')
            ->limit(3)
            ->get();
        
        
        $generos =  Genero::select('generos.*')
                        ->join('generoMedias', 'generos.id', '=', 'generoMedias.id_genero')
                        ->distinct()
                        ->get();
        $array_mediasGenero = [];
        foreach($generos as $genero) {
            $array_mediasGenero[$genero->nombre] = $genero->medias()->get();
        }
        return view('pages.index', ['medias' => $medias, 'generos' => $generos, 'mediasGenero' => $array_mediasGenero]);
    }
    
    public function cargarReproduccion($id, $temporada_actual = null){
        $media = Media::find($id);
        
        if (session()->has('current_user')) {
            $user_id = intval(session('current_user'));
            app('App\Http\Controllers\ReproduccionesController')->add($media->id, $user_id);
        }

        if(isset($media->interpretes)){
            $actores = $media->interpretes;
        }else {
            $actor = new class {
                public $nombre = "Sin intérpretes";
              };
            $actores = [$actor];
        }
        if(isset($media->directores[0])){
            $director = $media->directores[0];
        }else {
            $director = new class {
                public $nombre = "Desconocido";
              };
        }
        
        $temporadas = null;
        $capitulos = null;
        
        if(strtolower($media->tipo) === "serie") {
            $temporadas = $media->temporadas->sortBy(function ($temporada) {
                return $temporada->n_temporada;
            });
        }

        if (!is_null($temporada_actual)) {
            $capitulos = Capitulo::where([
                ['n_temporada', $temporada_actual],
                ['media_id', $id]
            ])->orderBy('n_capitulo')->get();
        }        

        return view('pages.reproduccion', ['media' => $media, 'actores' => $actores, 'director' => $director, 'temporadas' => $temporadas, 'capitulos' => $capitulos]);
    }

}