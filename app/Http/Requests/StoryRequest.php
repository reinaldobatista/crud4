<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoryRequest extends FormRequest
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
            'story'=>"required|min:3|max:255|unique:story,story,{$id},id",
        ];
    }
    public function messages()
    {
        return [
            'story.required'=>'Estoque é Obrigatorio!',
            'story.unique'=>'Já existe uma Estoque cadastrado com esse nome!   ',
            'story.min' =>' Ops! Precisa informa pelo menos 3 caracteres no campo Estoque! ',
            'story.max' =>' Ops! Esse campo suporta somente 255 caracteres!  ',
        ];
    }
}
