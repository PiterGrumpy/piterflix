<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Model;

class GeneroMedia extends Pivot
{
    
    protected $table = "generoMedias";
    
    public function media()
    {
        return $this->belongsTo(Media::class, 'id_media');
    }

    public function genero()
    {
        return $this->belongsTo(Genero::class, 'id_genero');
    }
    
}
