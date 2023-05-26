<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PagoRequest extends FormRequest
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
            'codigo_promocion' => $this->codigo_promocion ?? '',
            'paymentMethod' => $this->paymentMethod ?? '',
            'cc_name' => $this->cc_name ?? '',
            'cc_number' => $this->cc_number ?? '',
            'cc_expiration' => $this->cc_expiration ?? '',
            'cc_cvv' => $this->cc_cvv ?? '',
        ]);
        
    }
     
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules() {
        $rules = [];

        if (!empty($this->codigo_promocion)) {
            $this->rules = [
                'codigo_promocion' => ['string','regex:/^[a-zA-Z0-9]+$/','size:10'],
            ];
        } elseif (!empty($this->paymentMethod)) {
            if($this->paymentMethod != "paypal"){
                $this->rules = [
                    'cc_name' => 'required|string',
                    'cc_number' => ['required', 'regex:/^([0-9]{4}\s){3}[0-9]{4}$|^[0-9]{16}$/'],
                    'cc_expiration' => ['required', 'regex:/^(0[1-9]|1[0-2])\/[0-9]{2}$/'],
                    'cc_cvv' => 'required|numeric|digits_between:3,4',
                ];
            }
        }
        return $rules;
    }
}
