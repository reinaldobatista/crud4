<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class ModelCarrinho extends Model
{
    protected $table='carrinho';
    protected $fillable=['products_car_id','qtd','value','users_id','carrinho_status_id'];
    public function relProduct()
    {
        return $this->hasone('App\Http\Models\ModelProduct','id','products_car_id');
    }
}
