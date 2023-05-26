<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temporada extends Model
{
    use HasFactory;
    protected $table = "temporadas";

    // Clave primaria compuesta
    protected $primaryKey = ['n_temporada', 'media_id'];
    
    // Evitamos que Eloquent intente autoincrementar la clave primaria
    public $incrementing = false;

    protected $fillable = [
        'media_id',
        'n_temporada',
        'anoEstreno',
    ];
    // Relación muchos a uno con la tabla de media
    public function media()
    {
        return $this->belongsTo(Media::class);
    }
    // Relación uno a muchos con la tabla de capitulos
    public function capitulos()
    {
        return $this->hasMany(Capitulo::class);
    }
}
