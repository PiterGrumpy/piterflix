<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capitulo extends Model
{
    use HasFactory;
    protected $table = "capitulos";

    // Clave primaria compuesta
    protected $primaryKey = ['n_capitulo', 'n_temporada', 'media_id'];
    
    // Evitamos que Eloquent intente autoincrementar la clave primaria
    public $incrementing = false;

    protected $fillable = [
        'n_capitulo',
        'n_temporada',
        'media_id',
        'nombre',
        'duracion',
        'descripcion',
        'video',
    ];
    // Relación muchos a uno con la tabla de temporada
    public function temporada()
    {
        return $this->belongsTo(Temporada::class, ['n_temporada', 'media_id']);
    }
}
