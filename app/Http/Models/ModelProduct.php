<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class ModelProduct extends Model
{
    protected $table='product';
    protected $fillable=['name','category_id','description','price','image'];
    public static function towns($id){
    	return ModelProduct::where('category_id','=',$id)
    	->get();
    }
    public function search($filter,$filter1)
    {
        $results=$this->where(function($query) use($filter,$filter1){
                if ($filter)
                {
                    $query->where('name','LIKE',"%{$filter}%");
                    $query->where('category_id','LIKE',"%{$filter1}%");
                }
                if ($filter1)
                {
                    $query->where('name','LIKE',"%{$filter}%");
                    $query->where('category_id','LIKE',"%{$filter1}%");
                }
        })->paginate();
        return $results;

    }
    public function search1($filter)
    {
        $results=$this->where(function($query) use($filter){
                if ($filter)
                {
                    $query->where('name','LIKE',"%{$filter}%");
                }
        })->paginate();
        return $results;

    }
    public function relcarrinho()
    {
        return $this->hasmany('App\Http\Models\Carrinho','products_car_id');
    }
    public function relpedidovenda()
    {
        return $this->hasmany('App\Http\Models\pedidoVenda','products_id');
    }
    public function relDeposito()
    {
        return $this->hasmany('App\Http\Models\ModelDeposito','products_id');
    }
    public function relCategory()
    {
        return $this->hasone('App\Http\Models\ModelCategory','id','category_id');
    }
}