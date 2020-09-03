<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'category'=>"required|min:3|max:255|unique:category,category,{$id},id",
        ];
    }
    public function messages()
    {
        return [
            'category.required'=>'Preço Obrigatorio',
            'category.unique'=>'Já existe uma Categoria cadastrada com esse nome!   ',
            'category.min' =>' Ops! Precisa informa pelo menos 3 caracteres no campo nome! ',
            'category.max' =>' Ops! Esse campo suporta somente 255 caracteres!  ',
        ];
    }
}
