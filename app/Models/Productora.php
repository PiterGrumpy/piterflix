<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productora extends Model
{
    use HasFactory;

    protected $table = "productoras";
    protected $fillable = ['nombre', 'pais'];

    // Relación uno a muchos con la tabla de producto_audiovisual
    public function media()
    {
        return $this->hasMany(Media::class);
    }
}
