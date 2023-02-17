<?php

namespace App\Http\Requests\V1\Foods;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFoodRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

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
        ];
    }
}
