<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class ModelPedidoVenda_status extends Model
{
    protected $table='status_pedido_venda';
    protected $fillable=['name'];
    public function relPedidoVenda()
    {
        return $this->hasmany('App\Http\Models\ModelpedidoVenda','status_pedido_venda_id');
    }
}
