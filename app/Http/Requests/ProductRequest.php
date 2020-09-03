<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name'=>"required|min:3|max:255|unique:product,name,{$id},id",
            'category_id'=>"required",
            'price'=>"required",
            'image'=>'nullable|image',
            'description'=> 'required|min:3|max:10000',
        ];
    }
    public function messages()
    {
        return [
            'price.required'=>'Preço Obrigatorio',
            'name.unique'=>'Já existe um produto cadastro com esse nome!   ',
            'category_id.required'=>'campo obrigratorio',
            'description.required'=>'descrição e obrigatorio',
            'name.required' =>' Nome é Obrigatorio',
            'name.min' =>' Ops! Precisa informa pelo menos 3 caracteres no campo nome',
            'image.required'=>'Imagem é Obrigatorio'
        ];
    }
}
