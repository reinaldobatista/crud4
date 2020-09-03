<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDepositoRequest extends FormRequest
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
            'story_id'=>"required",
            'products_id'=>'required',
            'qtd'=>"required",
            'category_id'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'story_id.required'=>'Estoque Obrigatorio',
            'products_id.required'=>'Produto e  Obrigatorio',
            'category_id.required'=>'Categoria Obrigatorio',
            'qtd.required'=>'Quantidade Obrigatorio',
        ];
    }
}
