<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Rules\CapituloUnicoEnTemporada;

class AddCapituloRequest extends FormRequest
{
     /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function prepareForValidation() {
        
        $this->merge([
            'id_media' => $this->id_media ?? '',
            'n_temporada' => $this->n_temporada ?? '',
            'nombre' => $this->nombre ?? '',
            'duracion' => $this->duracion ?? '',
            'n_capitulo' => $this->n_capitulo ?? '',
            'descripcion' => $this->descripcion ?? '',
            'video' => $this->video ?? '',
        ]);
        
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'id_media' => 'required|exists:medias,id',
            'n_temporada' => 'required',
            'nombre' => 'required',
            'duracion' => 'required',
            'n_capitulo' => [
                'required',
                new CapituloUnicoEnTemporada($this->id_media, $this->n_temporada),
            ],
            'descripcion' => 'required',
            'video' => [
                'required',
                'string',
                'regex:/^[a-zA-Z0-9_-]{11}$/'
            ],
            'id_media_n_temporada' => [
                Rule::exists('temporadas')->where(function ($query) {
                    return $query->where([
                        'id_media' => $this->id_media,
                        'n_temporada' => $this->n_temporada,
                    ]);
                }),
            ],
        ];
    }
}
