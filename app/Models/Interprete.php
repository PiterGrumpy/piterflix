<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interprete extends Model
{
    use HasFactory;
    protected $table = "interpretes";

    protected $fillable = ['nombre', 'nacionalidad', 'anoNacimiento', 'id_api'];

    // Relación muchos a muchos con la tabla de producto_audioavisual
    public function medias()
    {
        return $this->belongsToMany(Media::class, 'interpretacion', 'id_interprete','id_media');
    }

    public function interpretaciones()
    {
        return $this->hasMany(Interpretacion::class, 'id_interprete');
    }
}
