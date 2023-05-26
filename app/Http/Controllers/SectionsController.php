<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Usuario;
use App\Models\Media;

class SectionsController extends Controller {
    
    public function cargarPeliculas() {
        $medias = Media::peliculas()->get();
        return view('pages.sections', ['section' => 'pelicula', 'medias' => $medias]);
    }

    public function cargarSeries() {
        $medias = Media::series()->get();
        return view('pages.sections', ['section' => 'serie', 'medias' => $medias]);
    }
   
    public function cargarNovedades() {
        $medias = Media::latest()->take(10)->get();
        return view('pages.sections', ['section' => 'novedades', 'medias' => $medias]);
    }

    public function cargarProximamente() {
        $medias = Media::orderBy('anoEstreno', 'desc')->take(10)->get();
        return view('pages.sections', ['section' => 'proximamente', 'medias' => $medias]);
     }

    public function cargarRecomendados() {
        if (Auth::check() && session()->has('current_user')) {
            $current_user = intval(session('current_user'));
            $user = Usuario::find($current_user);
            $favoritas = $user->mediasFavoritos;
            $descargadas = $user->mediasDescargados;
            $reproducidas = $user->mediasReproducidos;

            // Obtener los géneros más repetidos
            $generos = collect([]);
            $favoritas->concat($descargadas)->concat($reproducidas)->each(function ($media) use (&$generos) {
                $media->generos->each(function ($genero) use (&$generos) {
                    $generoExistente = $generos->where('id', $genero->id)->first();
                    if ($generoExistente) {
                        $generoExistente['count']++;
                    } else {
                        $generos->push(['id' => $genero->id, 'nombre' => $genero->nombre, 'count' => 1]);
                    }
                });
            });            
            $generos = $generos->sortByDesc('count')->pluck('nombre')->take(3);
            $medias = Media::whereHas('generos', function ($query) use ($generos) {
                $query->whereIn('generos.nombre', $generos);
           })->whereNotIn('id', $favoritas->pluck('id'))->whereNotIn('id', $descargadas->pluck('id'))->orderBy('created_at', 'desc')->take(10)->get();
           
       } else {
            $medias = DB::table('medias')->inRandomOrder()->take(10)->get();
       }
       if(count($medias) == 0){
            $medias = DB::table('medias')->inRandomOrder()->take(10)->get();
       }
        return view('pages.sections', ['section' => 'recomendados', 'medias' => $medias]);
    }
}