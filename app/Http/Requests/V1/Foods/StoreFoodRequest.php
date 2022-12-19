<?php

namespace App\Http\Requests\V1\Foods;

use Illuminate\Foundation\Http\FormRequest;

class StoreFoodRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' =>  ['required'],
            'cost' =>  ['required'],
            'state' =>  ['required'],
            'special' =>  ['required'],
        ];
    }
    public function attributes()
    {
        return [
            'name' =>  'nombre de la comida',
            'cost' =>  'Precio de la comida',
            'state' =>  'Disponibilidad de la comida',
            'special' =>  'Comida especial',
            'image' =>  'imagen de la comida',
        ];
    }
}
