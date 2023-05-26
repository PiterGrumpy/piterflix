<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Model;

class Descarga extends Pivot
{
    protected $table = "descargas";

    public function media() {
        return $this->belongTo(Media::class, 'id_media');
    }

    public function usuario() {
        return $this->belongTo(Usuario::class, 'id_usuario');
    }
}
