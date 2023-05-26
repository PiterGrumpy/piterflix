<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $table = "usuarios";

    protected $fillable = [
        'nombre',
        'id_cuenta',
        'isAdmin',
        'anoNacimiento',
        'avatar',
    ];

    // Relación muchos a uno con la tabla usuario
    public function cuenta() {
        return $this->belongsTo(Cuenta::class);
    }

    // Relación muchos a muchos con la table producto_audiovisual
    public function mediasFavoritos()
    {
        return $this->belongsToMany(Media::class, 'favoritos', 'id_usuario', 'id_media');
    }

    public function mediasDescargados()
    {
        return $this->belongsToMany(Media::class, 'descargas', 'id_usuario', 'id_media');
    }

    public function mediasReproducidos()
    {
        return $this->belongsToMany(Media::class, 'reproducciones', 'id_usuario', 'id_media');
    }
}
