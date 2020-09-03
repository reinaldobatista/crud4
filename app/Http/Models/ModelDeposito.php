<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class ModelDeposito extends Model
{
    protected $table='deposito';
    protected $fillable=['qtd','story_id','products_id','category_id'];
    public function search($filter,$filter1)
    {
        // SELECT col1, col2, col3, col_com_data FROM tabela WHERE col_com_data BETWEEN '2019-01-01' AND '2019-10-25'
        $results=$this->where(function($query) use($filter,$filter1){
                if ($filter)
                {
                    $query->where('products_id','LIKE',"%{$filter}%");
                    $query->where('category_id','LIKE',"%{$filter1}%");
                }
                if ($filter1)
                {
                    $query->where('products_id','LIKE',"%{$filter}%");
                    $query->where('category_id','LIKE',"%{$filter1}%");
                }
        })->paginate();
        return $results;

    }
    public function relStory()
    {
        return $this->hasone('App\Http\Models\ModelStory','id','story_id');
    }
    public function relCategory()
    {
        return $this->hasone('App\Http\Models\ModelCategory','id','category_id');
    }
    public function relProduct()
    {
        return $this->hasone('App\Http\Models\ModelProduct','id','products_id');
    }
}
