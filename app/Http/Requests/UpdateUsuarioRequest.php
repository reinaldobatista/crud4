<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUsuarioRequest extends FormRequest
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
        $request=$this->request->all();
        return [
        'name' => 'required|unique:users,name,'. $request['id'] .'|max:255|min:3',
        'email' => 'required||unique:users,email,'. $request['id'] .'|max:255|min:6',
        'password'=>'max:255',
        ];
    }
    public function messages()
    {
        return[
            'name.required'=>'Campo nome e Obrigatorio!',
            'email.required'=>'Campo email e Obrigatorio!',
            'name.min'=>' Ops! Precisa informa pelo menos 3 caracteres no campo nome! ',
            'email.min'=>' Ops! Precisa informa pelo menos 6 caracteres no campo email! ',
            'name.max'=>' Ops! O campo  name suporta somente 255 caracteres!  ',
            'password.max'=>' Ops! O campo  Senha suporta somente 255 caracteres!  ',
            'email.max'=>' Ops! O campo  email suporta somente 255 caracteres!  ',
            'name.unique'=>'Já existe um Usuario cadastrado com esse nome!  ',
            'email.unique'=>'Já existe um Usuario cadastrado com esse email!   ',
        ];
    }
}
