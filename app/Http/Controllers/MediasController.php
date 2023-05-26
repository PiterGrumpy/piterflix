<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\BusquedaMediaRequest;
use App\Http\Requests\AdminMediaRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\DataBaseController;
use App\Models\Media;
use App\Models\Temporada;

class MediasController extends Controller
{
    static $my_key;
    static $api_url;
    
    public function __construct()
    {
        self::$my_key = config("constants.API_KEY");
        self::$api_url = config("constants.API_URL");
    }

    /*
    * Función que busca una película por id o por nombre entre las que
    * hay guardadas en la tabla apiPelis
    *
    */
    public function buscarMiApiPeliPorNombre($pelicula) {
        $media = null;
        if(is_string($pelicula)) {
            $media = ApiPelis::where('titulo', '=', $pelicula)
              ->whereRaw("LOWER(REPLACE(title, ' ', '')) COLLATE utf8_general_ci = ?", [str_replace(' ', '', strtolower($pelicula))])
              ->first();
        }
        if($media) {
            return $media->id;
        } 
        return $media;
    }

    /*
    * Función que busca una película por nombre directamente en la API
    *
    */
    public function buscarPeliculaApi(Request $request) {
        $validator = Validator::make($request->all(), [
            'nombreMedia' => ['required']
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $resp = $this->buscarMediaApi("movie", $request);
        if(!$resp['exito']) {
            return redirect()->back()->with('unfound', '¡La película que buscas no se ha podido encontrar!');
        }
        
        $medias = $resp['medias'];
        $tipo = "pelicula";
        session()->flash('medias', $medias);
        session()->flash('tipo', $tipo);
        return redirect()->back();         
        
    }

    /*
    * Función que busca una película por nombre directamente en la API
    *
    */
    public function buscarSerieApi(Request $request) {
        $validator = Validator::make($request->all(), [
            'nombreMedia' => ['required']
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $resp = $this->buscarMediaApi("tv", $request);
        if(!$resp['exito']) {
            return redirect()->back()->with('unfound', '¡La película que buscas no se ha podido encontrar!');
        }
        
        $medias = $resp['medias'];
        $tipo = "serie";
        session()->flash('medias', $medias);
        session()->flash('tipo', $tipo);
        return redirect()->back();          
        
    }
    public function buscarMediaApi($tipo, $request){
        $media = null;
        // Hacer la solicitud a la API
        $media = Http::get(self::$api_url.'/search'.'/'.$tipo, [
            'api_key' => self::$my_key,
            'language' => 'es-ES',
            'query' => $request->nombreMedia,
            'fields' => 'credits.cast,credits.crew,overview'
        ]);
        // Manejar los errores de la solicitud
        if ($media->failed() || empty($media->json()['results'])) {
            $resp['exito'] = false;
          return $resp;   
        }
        // Obtener los resultados de la búsqueda de la API
        $resp['medias'] = $media->json()['results'];
        $resp['exito'] = true;
        return $resp;
    }
    /*
    * Inserta 1 película en la base de datos a partir de buscarla en la API
    *
    */
    public function InsertarPeliculaNueva($pelicula, $video = null) {
        $media = null;
        $dataBaseController = new DataBaseController();

        if(is_int($pelicula)) {
            // Hacemos una consulta para obtener datos específicos de la película
            $resp = Http::get(self::$api_url.'/movie'.'/'.$pelicula, [
                'api_key' => self::$my_key,
                'language' => 'es-ES',
                'append_to_response' => 'credits',
                'fields' => 'credits.cast,credits.crew,production_companies',
            ]);
            if ($resp->successful()) {
                $dataBaseController->insertarMedia($resp->json(), $video, "pelicula");
            } else {
                return redirect()->route('dashboard')->with('error', '¡Algo ha ido mal, la película no se ha podido añadir a la base de datos!');
            }
        }
        return redirect()->route('dashboard')->with('success', '¡La película ha sido añadida a la base de datos con éxito!');
    }
    
    /*
    * Inserta 1 película en la base de datos a partir de buscarla en la API
    *
    */
    public function InsertarSerieNueva($serie, $video = null) {
        $media = null;
        $dataBaseController = new DataBaseController();

        if(is_int($serie)) {
            // Hacemos una consulta para obtener datos específicos de la serie
            $resp = Http::get(self::$api_url.'/tv'.'/'.$serie, [
                'api_key' => self::$my_key,
                'language' => 'es-ES',
                'append_to_response' => 'credits',
                'fields' => 'credits.cast,credits.crew,production_companies',
            ]);
            if ($resp->successful()) {
                $dataBaseController->insertarMedia($resp->json(), $video, "serie");
            } else {
                return redirect()->route('dashboard')->with('error', '¡Algo ha ido mal, la película no se ha podido añadir a la base de datos!');
            }
        }
        return redirect()->route('dashboard')->with('success', '¡La película ha sido añadida a la base de datos con éxito!');
    }


    public function prepararFormularioEdicion(BusquedaMediaRequest $request) {
        if(is_null($request->nombreMedia)) {
            $media = Media::find($request->idMedia);
            if(strtolower($media->tipo) != strtolower($request->tipoMedia)){
                return redirect()->back()->with('unfound', '¡El id introducido no corresponde a una '.$request->tipoMedia.'!');
            }
            $interpretes = DB::table('interpretes')->get();
            $generos_db = DB::table('generos')->get();
            $productoras_db = DB::table('productoras')->get();
            $directores_db = DB::table('directores')->get();
            return view('admin.media-editar-form', compact('media', 'interpretes', 'generos_db', 'productoras_db', 'directores_db'));
        }else{
            if(strtolower($request->tipoMedia) == "pelicula"){
                $medias = Media::peliculas()->where(function ($query) use ($request) {
                    $query->where('titulo', 'like', '%' . $request->nombreMedia . '%')
                        ->orWhere('titulo_original', 'like', '%' . $request->nombreMedia . '%');
                    })->get();
                if(!$medias->isEmpty()) {
                    session()->flash('medias', $medias);
                    return redirect()->back();
                }else {
                    return redirect()->back()->with('unfound', '¡La película que buscas no existe!');
                }
            }else if(strtolower($request->tipoMedia) == "serie"){
                $medias = Media::series()->where(function ($query) use ($request) {
                    $query->where('titulo', 'like', '%' . $request->nombreMedia . '%')
                        ->orWhere('titulo_original', 'like', '%' . $request->nombreMedia . '%');
                    })->get();
                if(!$medias->isEmpty()) {
                    session()->flash('medias', $medias);
                    return redirect()->back();
                }else {
                    return redirect()->back()->with('unfound', '¡La serie que buscas no existe!');
                }
            }
            
        }
        return redirect('/');
    }

    public function editarPelicula(AdminMediaRequest $request) {
        $pelicula = Media::find($request->id);
        $interpretes = $this->parsearValoresAInt($request->interpretes);
        $generos = $this->parsearValoresAInt($request->generos);

        // Modificar los campos de la película
        $pelicula->titulo = $request->titulo;
        $pelicula->titulo_original = $request->titulo_original;
        $pelicula->idioma_original = $request->idioma_original;
        $pelicula->duracion = $request->duracion;
        $pelicula->anoEstreno = $request->anoEstreno;
        $pelicula->descripcion = $request->descripcion;
        $pelicula->imagen = $request->imagen;
        $pelicula->poster = $request->poster;
        $pelicula->video = $request->video;
        $pelicula->id_productora = $request->idProductora;

        // Actualizamos el director
        $pelicula->directores()->sync([intval($request->director)], true);
        
        // Eliminar los registros de la tabla pivote "interpretaciones"
        $pelicula->interpretaciones()->delete();
        
        // Agregar los nuevos registros en la tabla pivote "interpretaciones"
        foreach ($interpretes as $interprete) {
            $pelicula->interpretaciones()->create(['id_interprete' => $interprete]);
        }
        // Actualizar los géneros
        $pelicula->generos()->sync($generos, true);

        // Guardar los cambios en la base de datos
        $pelicula->save();
        return redirect()->route('dashboard')->with('success', 'Los cambios se han añadido con éxito!');
    }

    public function editarSerie(AdminMediaRequest $request) {
        $serie = Media::find($request->id);
        $interpretes = $this->parsearValoresAInt($request->interpretes);
        $generos = $this->parsearValoresAInt($request->generos);

        // Modificar los campos de la película
        $serie->titulo = $request->titulo;
        $serie->titulo_original = $request->titulo_original;
        $serie->idioma_original = $request->idioma_original;
        $serie->duracion = $request->duracion;
        $serie->anoEstreno = $request->anoEstreno;
        $serie->descripcion = $request->descripcion;
        $serie->imagen = $request->imagen;
        $serie->poster = $request->poster;
        $serie->video = $request->video;
        $serie->id_productora = $request->idProductora;

        // Actualizamos el director
        $serie->directores()->sync([intval($request->director)], true);
        
        // Eliminar los registros de la tabla pivote "interpretaciones"
        $serie->interpretaciones()->delete();
        
        // Agregar los nuevos registros en la tabla pivote "interpretaciones"
        foreach ($interpretes as $interprete) {
            $serie->interpretaciones()->create(['id_interprete' => $interprete]);
        }
        // Actualizar los géneros
        $serie->generos()->sync($generos, true);

        // Guardar los cambios en la base de datos
        $serie->save();

        return redirect()->route('dashboard')->with('success', 'Los cambios se han añadido con éxito!');

    }


    public function prepararFormularioAddManual($tipo = null){
        if(is_null($tipo)){
            return redirect()->route('dashboard');
        }
        $ruta = route('dashboard');
        if($tipo == "pelicula") {
            $ruta = route("addPelicula");
        }else if($tipo == "serie"){
            $ruta = route("addSerie");
        }
        $interpretes = DB::table('interpretes')->get();
        $generos_db = DB::table('generos')->get();
        $productoras_db = DB::table('productoras')->get();
        $directores_db = DB::table('directores')->get();
        return view('admin.media-new-manual', compact('interpretes', 'generos_db', 'productoras_db', 'directores_db', 'tipo', 'ruta'));
    }

    public function addMediaManual(AdminMediaRequest $request) {
        $dataBaseController = new DataBaseController();
        $interpretes = $this->parsearValoresAInt($request->interpretes);
        $generos = $this->parsearValoresAInt($request->generos);
        $msg = '¡La '.$request->tipo.' ha sido añadida a la base de datos con éxito!';
        
        // Guardamos los campos con los que queremos insertar la película
        $media = [];
        $media['title'] = $request->titulo;
        $media['name'] = $request->titulo;
        $media['original_title'] = $request->titulo_original;
        $media['original_name'] = $request->titulo_original;
        $media['original_language'] = $request->idioma_original;
        $media['overview'] = $request->descripcion;
        $media['runtime'] = $request->duracion;
        $media['release_date'] = $request->anoEstreno."-00";
        $media["first_air_date"] = $request->anoEstreno."-00";
        $media['id'] = null;
        $media['backdrop_path'] = "";
        $media['poster_path'] = "";
        $media['manual'] = true;

        $media_id = $dataBaseController->insertarMedia($media, $request->video, $request->tipo);
        $media = Media::find($media_id);
        $media->imagen = $request->imagen;
        $media->poster = $request->poster;
        $media->id_productora = $request->idProductora;
        $media->directores()->attach([intval($request->director)]);
        // Agregar los nuevos registros en la tabla pivote "interpretaciones"
        foreach ($interpretes as $interprete) {
            $media->interpretaciones()->create(['id_interprete' => $interprete]);
        }
        // Actualizar los géneros
        $media->generos()->attach($generos);
        // Guardar los cambios en la base de datos
        $media->save();
        if($request->tipo == "serie") {
            $temporada = $this->addTemporada($media_id, $media->anoEstreno);
            $temporadaArray = $temporada->toArray();
            return redirect()->route('addCapitulo')->with('temporada', $temporadaArray)->with('media', $media);
        }
         return redirect()->route('dashboard')->with('success', $msg);
 
        
    }

    public function addTemporada($idSerie, $estreno = null){
        $comprobacion = [];
        $cantidadTemporadas = Temporada::where('media_id', $idSerie)->count();
        $comprobacion['n_temporada'] = $cantidadTemporadas + 1;
        $comprobacion['media_id'] = $idSerie;

        $insercion = [];
        $insercion['n_temporada'] = $comprobacion['n_temporada'];
        $insercion['media_id'] = $idSerie;
        $insercion['anoEstreno'] = $estreno;
        // En caso de que esa temporada no exista en la base de datos, realizará la inserción
        if (is_null($instance = 'App\Models\Temporada'::where($comprobacion)->first())) {
           $nuevaTemporada = Temporada::create($insercion);
           return $nuevaTemporada;
        }
    }

    public function addPeliculaApi(Request $request) {
        $validator = Validator::make($request->all(), [
            'video' => [
                'required',
                'string',
                'regex:/^[a-zA-Z0-9_-]{11}$/'
            ]
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $peliculaSeleccionada = json_decode($request->input('media'), true);
        $peliculaSeleccionada['video'] = $request->input('video');
        $this->InsertarPeliculaNueva($peliculaSeleccionada['id'], $peliculaSeleccionada['video']);
        return redirect()->route('dashboard')->with('success', '¡La película ha sido añadida a la base de datos con éxito!');
    }
    public function addSerieApi(Request $request) {
        $validator = Validator::make($request->all(), [
            'video' => [
                'required',
                'string',
                'regex:/^[a-zA-Z0-9_-]{11}$/'
            ]
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $serieSeleccionada = json_decode($request->input('media'), true);
        $serieSeleccionada['video'] = $request->input('video');
        $this->InsertarSerieNueva($serieSeleccionada['id'], $serieSeleccionada['video']);
        return redirect()->route('dashboard')->with('success', '¡La serie ha sido añadida a la base de datos con éxito!');
    }
    public function parsearValoresAInt($valores) {
        $array_valores = [];
        foreach($valores as $valor) {
            $valor_parseado = intval($valor);
            array_push($array_valores, $valor_parseado);
        }
        return $array_valores;
    }
   
}