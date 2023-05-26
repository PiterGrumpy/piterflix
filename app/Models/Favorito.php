<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Model;

class Favorito extends Pivot
{
    protected $table = "favoritos";

    public function media() {
        return $this->belongTo(Media::class, 'id_media');
    }

    public function usuario() {
        return $this->belongTo(Usuario::class, 'id_usuario');
    }
}
