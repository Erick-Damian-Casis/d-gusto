<?php

namespace App\Http\Requests\V1\User;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'=>['required'],
            'email'=>['required','email:rfc,dns'],
            'password'=>['required','min:6'],
            'whatsapp'=>['required','size:10'],
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Nombre del usuario',
            'email' => 'Correo electronico',
            'password' => 'Contraseña',
            'whatsapp'=>'Número de telefono',
        ];
    }
}
