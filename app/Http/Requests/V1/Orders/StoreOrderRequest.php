<?php

namespace App\Http\Requests\V1\Orders;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            'food.id' =>  ['integer', 'required'],
            'amount' =>  ['required'],
        ];
    }
    public function attributes()
    {
        return [
            'food.id' =>  'Id de la comida',
            'amount' =>  'cantidad de pedido por unidad',
        ];
    }
}
