<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Model;

class Reproduccion extends Pivot
{
    protected $table = "reproducciones";

    public function media() {
        return $this->belongsTo(Media::class, 'id_media');
    }

    public function usuario() {
        return $this->belongsTo(Usuario::, 'id_usuario');
    }
}
