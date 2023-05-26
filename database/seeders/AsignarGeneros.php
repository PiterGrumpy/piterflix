<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\GestionModelos;
use App\Models\Media;
use App\Models\Genero;
use App\Models\GeneroMedia;

class AsignarGeneros extends Seeder
{
    
    static $my_key;
    static $api_url;
    
    public function __construct()
    {
        self::$my_key = config("constants.API_KEY");
        self::$api_url = config("constants.API_URL");
        $this->cargarGeneros();
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $medias = Media::all();

        foreach($medias as $media) {
            
            if(strcasecmp($media->tipo, "pelicula") == 0) {    
                $resp = Http::get(self::$api_url.'/movie'.'/'.$media->id_api ,[
                    'api_key' => self::$my_key,
                    'language' => 'es-ES',
                ]);
                
                if ($resp->successful()) {
                    $this->insertarGeneroMedia($media->id, $resp->json());
                } 
                    
            }else if(strcasecmp($media->tipo, "serie") == 0) {
                //Se asocia la serie a sus géneros
                $resp = Http::get(self::$api_url.'/tv'.'/'.$media->id_api, [
                    'api_key' => self::$my_key,
                    'language' => 'es-ES',
                ]);
                if ($resp->successful()) {
                    $this->insertarGeneroMedia($media->id, $resp->json());
                } 
            }
        }
    }
    

    public static function insertarGeneroMedia($id, $media) {
        $generos = $media['genres'];
        // Insertamos los géneros de la película
        foreach($generos as $genero) {
            $current_genero = Genero::where('nombre', $genero["name"])->first();
            $nuevo_genero_media = new GeneroMedia();
            $nuevo_genero_media->id_media = $id;
            $nuevo_genero_media->id_genero = $current_genero->id;
            $nuevo_genero_media->save();     
            
        }
    }

    public function cargarGeneros() {
        Genero::create([
            'nombre' => 'Action & Adventure',
            'id_api' =>10759,
            ]);
        Genero::create([
            'nombre' => 'Animación',
            'id_api' => 16,
        ]);
        
        Genero::create([
            'nombre' => 'Comedia',
            'id_api' => 35,
        ]);
        
        Genero::create([
            'nombre' => 'Crimen',
            'id_api' => 80,
        ]);
        
        Genero::create([
            'nombre' => 'Documental',
            'id_api' => 99,
        ]);
        
        Genero::create([
            'nombre' => 'Drama',
            'id_api' => 18,
        ]);
        
        Genero::create([
            'nombre' => 'Familia',
            'id_api' => 10751,
        ]);
        
        Genero::create([
            'nombre' => 'Kids',
            'id_api' => 10762,
        ]);
        
        Genero::create([
            'nombre' => 'Misterio',
            'id_api' => 9648,
        ]);
        
        Genero::create([
            'nombre' => 'News',
            'id_api' => 10763,
        ]);
        
        Genero::create([
            'nombre' => 'Reality',
            'id_api' => 10764,
        ]);
        
        Genero::create([
            'nombre' => 'Sci-Fi & Fantasy',
            'id_api' => 10765,
        ]);
        
        Genero::create([
            'nombre' => 'Soap',
            'id_api' => 10766,
        ]);
        
        Genero::create([
            'nombre' => 'Talk',
            'id_api' => 10767,
        ]);
        
        Genero::create([
            'nombre' => 'War & Politics',
            'id_api' => 10768,
        ]);
        
        Genero::create([
            'nombre' => 'Western',
            'id_api' => 37,
        ]);
        
        Genero::create([
            'nombre' => 'Acción',
            'id_api' => 28,
        ]);
        
        Genero::create([
            'nombre' => 'Aventura',
            'id_api' => 12,
        ]);
        
        Genero::create([
            'nombre' => 'Fantasía',
            'id_api' => 14,
        ]);
        
        Genero::create([
            'nombre' => 'Historia',
            'id_api' => 36,
        ]);
        
        Genero::create([
            'nombre' => 'Terror',
            'id_api' => 27,
        ]);
        
        Genero::create([
            'nombre' => 'Música',
            'id_api' => 10402,
        ]);
        
        Genero::create([
            'nombre' => 'Romance',
            'id_api' => 10749,
        ]);
        
        Genero::create([
            'nombre' => 'Ciencia ficción',
            'id_api' => 878,
        ]);
        
        Genero::create([
            'nombre' => 'Película de TV',
            'id_api' => 10770,
        ]);  
        Genero::create([
            'nombre' => 'Suspense',
            'id_api' => 53,
        ]);   
        Genero::create([
            'nombre' => 'Bélica',
            'id_api' => 10752,
        ]);             
     }
}


