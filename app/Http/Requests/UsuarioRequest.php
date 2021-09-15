<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $emailUnico = 'unique:App\Models\User,email';

        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            $emailUnico = $emailUnico . ',' . $this->route('usuario')->id;
        }

        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', $emailUnico],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }
}
