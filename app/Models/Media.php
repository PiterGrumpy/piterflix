<?php

namespace App\Models;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Http;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Interprete;

class Media extends Model
{
    use HasFactory;

    protected $table = "medias";
    protected $fillable = [
        'tipo',
        'titulo', 
        'titulo_original', 
        'idioma_original',
        'duracion',
        'anoEstreno', 
        'descripcion',
        'id_productora',
        'id_api',
        'imagen',
        'poster',
        'video',
    ];

    // Scope para obtener las películas
    public function scopePeliculas($query){
        return $query->where('tipo', 'LIKE', '%pelicula%');
    }

    // Scope para obtener las series
    public function scopeSeries($query){
        return $query->where('tipo', 'LIKE', '%serie%');
    }

    // Relación muchos a uno con la tabla de productora
    public function productora()
    {
        return $this->belongsTo(Productora::class, 'id_productora');
    }

    // Relación uno a muchos con la tabla de temporadas
    public function temporadas()
    {
        return $this->hasMany(Temporada::class);
    }
    // Relaciones muchos a muchos con las tablas de interpretes, directores, usuarios y generos
    
    // INTERPRETES
    public function interpretes()
    {
        return $this->belongsToMany(Interprete::class, 'interpretacion', 'id_media','id_interprete');
    }
    public function interpretaciones()
    {
        return $this->hasMany(Interpretacion::class, 'id_media');
    }

    //DIRECTORES

    public function directores()
    {
        return $this->belongsToMany(Director::class, 'direccion', 'id_media','id_director');
    }
    public function direccion()
    {
        return $this->hasMany(Direccion::class, 'id_media');
    }
    
    // GENEROS
    public function generos()
    {
        return $this->belongsToMany(Genero::class, 'generoMedias', 'id_media', 'id_genero');
    }
    public function generoMedias()
    {
        return $this->hasMany(GeneroMedias::class, 'id_media');
    }
    
    // FAVORITOS
    public function favoritos()
    {
        return $this->belongsToMany(Usuario::class, 'favoritos', 'id_media', 'id_usuario');
    }
    public function favoritosMedias()
    {
        return $this->hasMany(Favorito::class, 'id_media');
    }
    // REPRODUCCIONES
    public function reproducciones()
    {
        return $this->belongsToMany(Usuario::class, 'reproducciones', 'id_media','id_usuario');
    }
    public function reproduccionesMedias()
    {
        return $this->hasMany(Reproduccion::class, 'id_media');
    }
    // DESCARGAS
    public function descargas()
    {
        return $this->belongsToMany(Usuario::class, 'descargas', 'id_media', 'id_usuario');
    }
    public function descargasMedias()
    {
        return $this->hasMany(Descarga::class, 'id_media');
    }

}
