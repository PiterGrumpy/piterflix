<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\GestionModelos;
use App\Models\Genero;
use App\Models\GeneroMedia;
use App\Models\Productora;
use App\Models\Media;
use App\Models\Interprete;
use App\Models\Temporada;
use App\Models\Capitulo;
use App\Models\Director;
use App\Models\Direccion;

class DataBaseController extends Controller
{
    static $my_key;
    static $api_url;
    static $api_img;
    
    public function __construct()
    {
        self::$my_key = config("constants.API_KEY");
        self::$api_url = config("constants.API_URL");
        self::$api_img = "http://image.tmdb.org/t/p/original";
        $datos_generos = $this->cargarGeneros();
    }
    
    // Añade la primera película de la lista ApiPelis que no esté añadida a la base de datos
    public function addPeliculadeApi() {
        $api = 'id_api'; // El nombre del campo en la tabla medias
        $notInIds = DB::table('medias')->pluck($api)->toArray();
        
        $firstMovieNotInMedia = DB::table('apiPelis')
                            ->whereNotIn('id', $notInIds)
                            ->first();

        if(!is_null($firstMovieNotInMedia)) {
            $resp = Http::get(self::$api_url.'/movie'.'/'.$firstMovieNotInMedia->id ,[
                'api_key' => self::$my_key,
                'language' => 'es-ES',
                'append_to_response' => 'credits',
                'fields' => 'credits.cast,credits.crew,overview',
                'include_image_language' => 'es,null',
                'image_language' => 'es'
            ]);
            
            if ($resp->successful()) {
                $this->insertarMedia($resp->json(), "pelicula");
            } 
        }
    }
    // Añade la primera película de la lista ApiPelis que no esté añadida a la base de datos
    public function addSeriedeApi() {
        $api = 'id_api'; // El nombre del campo en la tabla medias
        $notInIds = DB::table('medias')->pluck($api)->toArray();
        
        $firstMovieNotInMedia = DB::table('apiSeries')
                            ->whereNotIn('id', $notInIds)
                            ->first();
        
        if(!is_null($firstMovieNotInMedia)) {
            $resp = Http::get(self::$api_url.'/tv'.'/'.$firstMovieNotInMedia->id, [
                'api_key' => self::$my_key,
                'language' => 'es-ES',
                'append_to_response' => 'credits',
                'fields' => 'credits.cast,credits.crew,overview',
                'include_image_language' => 'es,null',
                'image_language' => 'es',
                'include_seasons' => '1'
            ]);

            if ($resp->successful()) {
                $this->insertarMedia($resp->json(), "serie");
            } 
        }
    }
    public function buscarSeriesEnAPI() {
        $series = [];

        $response = Http::get(self::$api_url.'/discover/tv', [
            'api_key' => self::$my_key,
            'language' => 'es-ES',
            'sort_by' => 'popularity.desc',
            'include_adult' => false,
            'include_video' => false,
            'page' => 1,
            'primary_release_date.gte' => 1985,
            'vote_count.gte' => 1000,
        ]);
        
         // Guardamos el length de response
         $response_length = count($response->json()['results']);
            
         for($j = 0; $j < $response_length; $j++) {
             $current_response = $response->json()['results'][$j];
             array_push($series, $current_response);
         }   
         foreach($series as $serie) {
            $comprobacion = [];
            $comprobacion['id'] = $serie["id"];
            $insercion = [];
            $insercion["id"] = $serie["id"];
            $insercion["titulo"] = $serie["name"];
            $insercion['titulo_original'] = $serie["original_name"];
            GestionModelos::existeOCrea($comprobacion, $insercion, 'ApiSeries');
         }         
    }
    public function buscarPeliculasEnAPI() {
        $movies = [];
    
        $response = Http::get(self::$api_url.'/discover/movie', [
        'api_key' => self::$my_key,
        'language' => 'es-ES',
        'sort_by' => 'popularity.desc',
        'include_adult' => false,
        'include_video' => false,
        'page' => 1,
        'primary_release_date.gte' => 1985,
        ]);
                    
        // Guardamos el length de response
        $response_length = count($response->json()['results']);
            
        for($j = 0; $j < $response_length; $j++) {
            $current_response = $response->json()['results'][$j];
            array_push($movies, $current_response);
        }   
        foreach($movies as $movie) {
            $comprobacion = [];
            $comprobacion['id'] = $movie["id"];
            $insercion = [];
            $insercion["id"] = $movie["id"];
            $insercion["titulo"] = $movie["title"];
            $insercion['titulo_original'] = $movie["original_title"];
            GestionModelos::existeOCrea($comprobacion, $insercion, 'ApiPelis');
        }         
    }

    /**
     * Fill data base with API's data.
     */
    public function insertarMedia($media, $video = null, $tipo)
    {
        try{
                //Tabla Medias
                if($tipo == "pelicula") {
                    // Guardamos un criterio de búsqueda, en este caso comprobamos el id de la api para esa película.
                    $comprobacion = [];
                    $comprobacion['titulo'] = [$media["title"]];

                    // Guardamos los campos con los que queremos insertar la película
                    $insercion = [];
                    $insercion['titulo'] = $media["title"];
                    $insercion['tipo'] = $tipo;
                    $insercion['titulo_original'] = $media["original_title"];
                    $insercion['idioma_original'] = $media["original_language"];
                    $insercion['descripcion'] = $media["overview"];
                    $insercion['duracion'] = intval($media["runtime"]);
                    $insercion['anoEstreno'] = intval(explode("-",$media["release_date"])[0]);
                    $insercion['id_api'] = $media["id"];
                    $insercion['imagen'] = self::$api_img.$media["backdrop_path"];
                    $insercion['poster'] = self::$api_img.$media["poster_path"];
                    $insercion['video'] = $video;
                    
                    // En caso de que ese titulo no exista en la base de datos, realizará la inserción
                    $current_id = GestionModelos::existeOCrea($comprobacion, $insercion, 'Media');
                    if(is_null($media["id"])){
                        return $current_id;
                    }
                    // Si la pelicula ha sido añadida generamos el resto de la base de datos en torno a ella
                    if($current_id) {
                        if(!empty($media['production_companies'])){
                            //Tablas de productoras
                            $productora = $this->insertarProductora($current_id, $media, $tipo);
                            $current_media = Media::find($current_id);
                            $current_media->id_productora = $productora;
                            $current_media->save();
                        }
                        
                        //Tabla de generoMedias
                        $this->insertarGeneroMedia($current_id, $media);
                        
                        //Tablas director y direccion
                        $this->insertarDirector($current_id, $media, $tipo);
                        
                    }
                
               }else if($tipo == "serie") {
                    // Guardamos un criterio de búsqueda, en este caso comprobamos el id de la api para esa película.
                    $comprobacion = [];
                    $comprobacion['titulo'] = [$media["name"]];

                    // Guardamos los campos con los que queremos insertar la película
                    $insercion = [];
                    $insercion['tipo'] = $tipo;
                    $insercion['titulo'] = $media["name"];
                    $insercion['titulo_original'] = $media["original_name"];
                    $insercion['idioma_original'] = $media["original_language"];
                    $insercion['anoEstreno'] = intval(explode("-",$media["first_air_date"])[0]);
                    $insercion['descripcion'] = $media["overview"];
                    $insercion['id_api'] = $media["id"];
                    $insercion['imagen'] = self::$api_img.$media["backdrop_path"];
                    $insercion['poster'] = self::$api_img.$media["poster_path"];
                    $insercion['video'] = $video;

                     // En caso de que ese titulo no exista en la base de datos, realizará la inserción
                     $current_id = GestionModelos::existeOCrea($comprobacion, $insercion, 'Media');
                     // Si se ha introducido el producto audiovisual, introducimos también la serie
                     if($current_id && !isset($media['manual'])) {
                        //Tablas de productoras
                        $this->insertarProductora($current_id, $media, $tipo);
                        
                        //Tablas director y direccion
                        $this->insertarDirector($current_id, $media, $tipo);

                        //Se asocia la serie a sus géneros
                        $this->insertarGeneroMedia($current_id, $media);
                    
                        // Insertamos las temporadas
                        $this->insertarTemporadas($media, $current_id, $video);
                        
                     }else{
                        dd("current id ".$current_id);
                     }
               }
        } catch (Exception $e) {
            // Capturamos la excepción y la mostramos por consola
            Log::error('Error al obtener los géneros: '.$e->getMessage());
            return response()->json(['message' => 'Error al obtener los géneros.'], 500);
        }
       return $current_id;
    }

    /* Insertamos director
    *
    *  parametros:
    * $id: id del media al que hace referencia el director en nuestra base de datos
    * $resp: datos adicionales de la pelicula como duración, casting, director, etc.
    *
    */
    public static function insertarDirector($id, $media, $tipo) {
        // Guardamos la información de las personas que han trabajado en la película
        $crew = $media['credits']['crew'];
        $director = null; // Variable para almacenar el director
        
        if($tipo == "pelicula") {
            // Buscamos al director
            foreach($crew as $person) {
                if(strcasecmp($person['job'], 'director') == 0) {
                    $director = $person; // Almacenar el primer director encontrado
                    break; // Salir del bucle después de encontrar el primer director
                }
            }
        }else if($tipo == "serie") {
            // Buscamos al director
            foreach($crew as $person) {
                if(strcasecmp($person['job'], 'Director') == 0 || strcasecmp($person['job'], 'Executive Producer') == 0) {
                    $director = $person; // Almacenar el primer director encontrado
                    break; // Salir del bucle después de encontrar el primer director
                }
            }
        }
        if(is_null($director)) {
            return null;
        }
        // Comprobamos si el director ya existe en la base de datos. De lo contrario lo creamos          
        if (Director::where('id_api', '=', intval($director["id"]))->exists()) {
            // El registro ya existe en la base de datos
            $dire = Director::where('id_api', intval($director["id"]))->first();
            if(!is_null($dire)){
                try {
                    $nueva_direccion = new Direccion();
                    $nueva_direccion->id_director = $dire->id;
                    $nueva_direccion->id_media = $id;
                    $nueva_direccion->save();
                } catch (\Exception $e) {
                    return redirect()->back()->with('error', 'Error al guardar en la base de datos: '.$e->getMessage());
                }
            }
        } else {
            // Buscamos información personal sobre el director en la API
            $datos_personales = Http::get(self::$api_url.'/person'.'/'.$director["id"], [
                'api_key' => self::$my_key,
                'language' => 'es-ES',
            ]);
            $nacionalidad = $datos_personales->json()["place_of_birth"];
            $nacimiento = $datos_personales->json()["birthday"];
            try {
                // El registro no existe en la base de datos. Se crea el director
                $nuevo_director = new Director();
                $nuevo_director->nombre = $director["name"];
                $nuevo_director->nacionalidad = $nacionalidad;
                $nuevo_director->anoNacimiento = $nacimiento;
                $nuevo_director->id_api = intval($director["id"]);
                $nuevo_director->save();
                
                // Se crea la nueva dirección
                $nueva_direccion = new Direccion();
                $nueva_direccion->id_director = $nuevo_director->id;
                $nueva_direccion->id_media = $id;
                $nueva_direccion->save();
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Error al guardar en la base de datos: '.$e->getMessage());
            }
        }
    }

    /* Insertamos generos media
    *
    *  parametros:
    * $id: id del media al que hace referencia la pelicula en nuestra base de datos
    * $movie: los datos que hemos recibido de la API sobre la película
    * $resp: datos adicionales de la pelicula como duración, casting, director, etc.
    *
    */
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
    // Obtenemos la información de todos lo generos

    public function cargarGeneros() {
       try{
            // Cargamos generos de series
            $generos = Http::get(self::$api_url.'/genre/tv/list', [
                'api_key' => self::$my_key,
                'language' => 'es-ES',
            ]);
        
            foreach($generos->json()["genres"] as $genero) {
                try {
                    // Guardamos un criterio de búsqueda, en este caso comprobamos el id de la api para ese genero.
                    $comprobacion = [];
                    $comprobacion['nombre'] = [$genero["name"]];
                    // Guardamos los campos con los que queremos insertar el genero
                    $insercion = [];
                    $insercion['id_api'] = $genero["id"];
                    $insercion['nombre'] = $genero["name"];
                    // En caso de que ese id no exista en la base de datos, realizará la inserción
                    $current_id = GestionModelos::existeOCrea($comprobacion, $insercion, 'Genero');             
                } catch (\Exception $e) {
                    // Si se produce un error al guardar, redirigimos al usuario a la página principal
                    return redirect('/')->with('error', 'Error al guardar los géneros: '.$e->getMessage());
                }
            }

            // Cargamos generos de cine
            $generos = Http::get(self::$api_url.'/genre/movie/list', [
                'api_key' => self::$my_key,
                'language' => 'es-ES',
            ]);
        
            foreach($generos->json()["genres"] as $genero) {
                try {
                    // Guardamos un criterio de búsqueda, en este caso comprobamos el id de la api para ese genero.
                    $comprobacion = [];
                    $comprobacion['nombre'] = [$genero["name"]];
                    // Guardamos los campos con los que queremos insertar el genero
                    $insercion = [];
                    $insercion['id_api'] = $genero["id"];
                    $insercion['nombre'] = $genero["name"];
                    // En caso de que ese nombre no exista en la base de datos, realizará la inserción
                    $current_id = GestionModelos::existeOCrea($comprobacion, $insercion, 'Genero');             
                } catch (\Exception $e) {
                    // Si se produce un error al guardar, redirigimos al usuario a la página principal
                    return redirect('/')->with('error', 'Error al guardar los géneros: '.$e->getMessage());
                }
            }
        } catch (Exception $e) {
            // Capturamos la excepción y la mostramos por consola
            Log::error('Error al obtener los géneros: '.$e->getMessage());
            return response()->json(['message' => 'Error al obtener los géneros.'], 500);
        }
        return $generos;
    }

    // Insertar temporadas
    public function insertarTemporadas($media, $media_id, $video = null) {
        $temporadas = $media["seasons"];
        $temporadas_id = [];
        $n_temp = count($temporadas);
        $i = 1;

        // Limitamos a 10 temporadas para que nuestro juego de pruebas no sea muy pesado
        while($i <= 5 && $i < $n_temp) {
            // Guardamos un criterio de búsqueda, en este caso comprobamos el id de la api para ese genero.
            $comprobacion = [];
            $comprobacion['n_temporada'] = $temporadas[$i]["season_number"];
            $comprobacion['media_id'] = $media_id;
            // Guardamos los campos con los que queremos insertar la temporada
            $insercion = [];
            $insercion['n_temporada'] = $temporadas[$i]["season_number"];
            $insercion['media_id'] = $media_id;
            $insercion['anoEstreno'] = intval(explode("-",$temporadas[$i]["air_date"])[0]);
            // En caso de que ese nombre no exista en la base de datos, realizará la inserción
            if (is_null($instance = 'App\Models\Temporada'::where($comprobacion)->first())) {
                Temporada::create($insercion);
                $insercion['api_id'] = $media["id"];
                $insercion['episodios'] = $temporadas[$i]["episode_count"];
                $this->insertarCapitulos($insercion, $video);
            }
            $i++;
        }
        
        return null;
    }

    // Insertar capítulos en temporadas
    public function insertarCapitulos($temporada, $video) {
        $endPoint = '/tv'.'/'.$temporada['api_id'].'/season'.'/'.$temporada['n_temporada'].'/episode';
        $i = 1;
        // Rellenamos la base de datos con 10 capítulos por temporada cómo máximo
        while($i <= 10 && $i < $temporada['episodios']) {
            $resp = Http::get(self::$api_url.$endPoint.'/'.$i, [
                'api_key' => self::$my_key,
                'language' => 'es-ES'
            ]);
            $current_cap = $resp->json();
            $insercion = [];
            $insercion['n_capitulo'] = $i;
            $insercion['n_temporada'] = $temporada['n_temporada'];
            $insercion['media_id'] = $temporada['media_id'];
            $insercion['nombre'] = $current_cap['name'];
            $insercion['duracion'] = $current_cap['runtime'];
            $insercion['descripcion'] = $current_cap['overview'];
            $insercion['video'] = $video;
            Capitulo::create($insercion);
            $i++;
        }
        
        
    }

     /* Insertamos la productora
    *
    *  parametros:
    * $id: id del media al que hace referencia la media en nuestra base de datos
    * $media: los datos que hemos recibido de la API sobre la media
    * $tipo: tipo de media; pelicula o serie
    *
    */
    public function insertarProductora($id, $media, $tipo) {
        $productoras = $media['production_companies'];
        $productora_principal = [];
        foreach($productoras as $productora){
            if(isset($productora['logo_path']) && isset($productora['name']) && isset($productora['origin_country'])){
                $productora_principal = $productora;
                break;
            }
        }
        if(empty($productora_principal) && isset($productoras[0])) {
            $productora_principal = $productoras[0];
        }

        // Comprobamos si la productora ya existe en la base de datos. De lo contrario la creamos          
        if (Productora::where('api_id', '=', intval($productora_principal["id"]))->exists()) {
            $productora = Productora::where('api_id', '=', intval($productora_principal["id"]))->first();
            return $productora->id;
        } else {
            $productora = $this->obtenerProductora($productora_principal['id']);
            if(!is_null($productora)){
                try {
                    $nueva_productora = new Productora();
                    $nueva_productora->api_id = $productora['id'];
                    $nueva_productora->nombre = $productora['name'];
                    $nueva_productora->pais = $productora['origin_country'];
                    $nueva_productora->save();
                    return $nueva_productora->id;
                } catch (\Exception $e) {
                    return redirect()->back()->with('error', 'Error al guardar la productora en la base de datos: '.$e->getMessage());
                }
            }
        }
    }


    // Obtenemos la información de todas la productoras

    public function obtenerProductora($id) {
        $resp = Http::get(self::$api_url.'/company'.'/'.$id, [
            'api_key' => self::$my_key,
            'language' => 'es',
            ]);
            
            if($resp->successful()){
                return $resp->json();
            }
        return null;
    }
   
}
