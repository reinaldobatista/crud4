<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
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
        $id=$this->segment(2);
        return [
        'name'=>"required|min:3|max:255|unique:users,name,{$id},id",
        'email'=>"required|min:6|max:255|unique:users,email,{$id},id",
        'password'=>'required|min:5',
        ];
    }
    public function messages()
    {
        return[
            'name.required'=>'Campo nome e Obrigatorio!',
            'email.required'=>'Campo email e Obrigatorio!',
            'password.required'=>'Campo Senha e Obrigatorio!',
            'name.min'=>' Ops! Precisa informa pelo menos 3 caracteres no campo nome! ',
            'email.min'=>' Ops! Precisa informa pelo menos 6 caracteres no campo email! ',
            'password.min'=>' Ops! Precisa informa pelo menos 5 caracteres no campo password! ',
            'name.max'=>' Ops! O campo  name suporta somente 255 caracteres!  ',
            'email.max'=>' Ops! O campo  email suporta somente 255 caracteres!  ',
            'name.unique'=>'Já existe um Usuario cadastrado com esse nome!  ',
            'email.unique'=>'Já existe um Usuario cadastrado com esse email!   ',
        ];
    }
}
