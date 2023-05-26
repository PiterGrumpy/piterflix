<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    use HasFactory;
    protected $table = "directores";

    protected $fillable = ['nombre','apellido', 'nacionalidad', 'anoNacimiento', 'id_api'];

    // Relación muchos a muchos con la tabla de producto_audioavisual
    public function productosAudiovisuales()
    {
        return $this->belongsToMany(ProductoAudiovisual::class, 'direccion', 'id_director', 'id_producto_audiovisual');
    }
    public function direccion()
    {
        return $this->hasMany(Direccion::class, 'id_director');
    }
}
