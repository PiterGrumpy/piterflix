<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Interpretacion extends Pivot
{

    protected $table = "interpretacion";

    public function media()
    {
        return $this->belongsTo(Media::class, 'id_media');
    }

    public function interprete()
    {
        return $this->belongsTo(Interprete::class, 'id_interprete');
    }
}
