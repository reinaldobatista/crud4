<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
            'category' => 'required|unique:category,category,'. $request['id'] .'|max:255|min:3',
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
