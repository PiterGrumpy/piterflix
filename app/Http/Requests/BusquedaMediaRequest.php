<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Pelicula;

class BusquedaMediaRequest extends FormRequest
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

    public function messages(){
        return [
            'oneField_error' => 'Rellena sólo uno de los campos.',
            'atLeastOne_error' => 'Rellena al menos uno de los campos.',

        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(){
        $rules = [];
        if(!is_null($this->nombreMedia)) {
            
            if(!is_null($this->idMedia)){
                $rules = [
                    'oneField_error' => 'required|string',
                ];
            }else {
                $rules = [
                    'nombreMedia' => 'nullable|required_without_all:idPelicula|string|'
                ];
            }
            
        }else if(!is_null($this->idMedia)) {
            $rules = [
                'idMedia' => 'nullable|required_without_all:nombreMedia|numeric|exists:medias,id',
            ];
        }else {
            $rules = [
                'atLeastOne_error' => 'required|string',
            ];
        }
        return $rules;
    }
}
