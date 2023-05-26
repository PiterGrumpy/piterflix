<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminMediaRequest extends FormRequest
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
            'id' => $this->id_media ?? '',
            'tipo' => $this->tipo ?? '',
            'titulo' => $this->titulo ?? '',
            'titulo_original' => $this->titulo_original ?? '',
            'idioma_original' => $this->idioma_original ?? '',
            'duracion' => $this->duracion ?? '',
            'anoEstreno' => $this->anoEstreno ?? '',
            'descripcion' => $this->descripcion ?? '',
            'imagen' => $this->imagen ?? '',
            'poster' => $this->poster ?? '',
            'video' => $this->video ?? '',
            'productora' => $this->idProductora ?? '',
            'director' => $this->idDirector ?? '',
            'interpretes' => $this->interpretes ?? '',
            'generos' => $this->generos ?? '',
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
            'id' => 'required',
            'tipo' => 'required',
            'titulo' => 'required',
            'titulo_original' => 'required',
            'idioma_original' => 'required',
            'duracion' => 'required',
            'anoEstreno' => 'required',
            'descripcion' => 'required',
            'imagen' => 'required',
            'poster' => 'required',
            'video' => 'required',
            'productora' => 'required',
            'director' => 'required',
            'generos' => 'required|array',
        ];
    }
}
