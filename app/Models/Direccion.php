<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Model;

class Direccion extends Pivot
{
    protected $table = "direccion";

    public function productoAudiovisual()
    {
        return $this->belongsTo(Media::class, 'id_media');
    }

    public function director()
    {
        return $this->belongsTo(Director::class, 'id_director');
    }
}
