<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    
    use HasFactory;
    protected $table = "generos";

    protected $fillable = ['nombre','id_api'];

    // Relación muchos a muchos con la tabla de producto_audioavisual
    public function medias()
    {
        return $this->belongsToMany(Media::class, 'generoMedias', 'id_genero', 'id_media');
    }

    public function generosMedias()
    {
        return $this->hasMany(GeneroMedias::class, 'id_genero');
    }
    
}
