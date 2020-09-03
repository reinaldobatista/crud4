<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class ModelCarrinho_status extends Model
{
    protected $table='status_carrinho';
    protected $fillable=['name'];
    public function relCarrinho()
    {
        return $this->hasmany('App\Http\Models\ModelCarrinho','carrinho_status_id ');
    }
    public function relPedidoVenda()
    {
        return $this->hasmany('App\Http\Models\ModelpedidoVenda','status_carrinho_id');
    }
}
