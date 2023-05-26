<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Capitulo;

class CapituloUnicoEnTemporada implements Rule
{
    protected $id_media;
    protected $n_temporada;

    public function __construct($id_media, $n_temporada)
    {
        $this->id_media = $id_media;
        $this->n_temporada = $n_temporada;
    }

    public function passes($attribute, $value)
    {
        // Comprobar si el capítulo ya existe en la base de datos
        $capitulo = Capitulo::where([
            'n_capitulo' => $value,
            'n_temporada' => $this->n_temporada,
            'media_id' => $this->id_media,
        ])->first();

        return !$capitulo; // Retorna verdadero si no existe el capítulo, falso en caso contrario
    }

    public function message()
    {
        // Mensaje de error personalizado
        return "El capitulo :attribute ya existe en la base de datos para esta temporada en la serie.";
    }
}
