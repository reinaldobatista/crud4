<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class ModelCategory extends Model
{
    protected $table='category';
    protected $fillable=['category'];
    public function search($filter)
    {
        $results=$this->where(function($query) use($filter){
                if ($filter)
                {
                    $query->where('category','LIKE',"%{$filter}%");
                }
        })->paginate();
        return $results;

    }
    public function relDeposito()
    {
        return $this->hasmany('App\Http\Models\ModelDeposito','category_id');
    }
    public function relProducts()
    {
        return $this->hasmany('App\Http\Models\ModelProduct','category_id');
    }
}
