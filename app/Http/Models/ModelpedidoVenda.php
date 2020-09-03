<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class ModelpedidoVenda extends Model
{
    protected $table='pedido_venda';
    protected $fillable=['products_id','numberPedido','status_carrinho_id','qtd','value','user_id','status_pedido_venda_id'];
    public function search($filter,$filter1,$filter2,$filter3)
    {
        $results=$this->where(function($query) use($filter,$filter1,$filter2,$filter3){
            // dd($filter,$filter1,$filter2,$filter3);
                date_default_timezone_set('America/Sao_Paulo');
                $data_atual=date('Y-m-d H:i:s');
                if ($filter)
                {
                    if($filter2==null)
                    {
                        $query->where('numberPedido','LIKE',"%{$filter}%");
                        $query->where('value','LIKE',"%{$filter1}%");
                    }
                    else
                    {
                        $query->where('numberPedido','LIKE',"%{$filter}%");
                        $query->where('value','LIKE',"%{$filter1}%");
                        $query->whereBetween('created_at', array($filter2, $filter3))->get();
                    }
                }
                if ($filter1)
                {
                    if($filter2==null)
                    {
                        $query->where('numberPedido','LIKE',"%{$filter}%");
                        $query->where('value','LIKE',"%{$filter1}%");
                    }
                    else
                    {
                        $query->where('numberPedido','LIKE',"%{$filter}%");
                        $query->where('value','LIKE',"%{$filter1}%");
                        $query->whereBetween('created_at', array($filter2, $filter3))->get();
                    }
                }
                if ($filter2)
                {
                    if($filter3==null)
                    {
                        $query->whereBetween('created_at', array($filter2,$data_atual))->get();
                        $query->where('numberPedido','LIKE',"%{$filter}%");
                        $query->where('value','LIKE',"%{$filter1}%");
                    }
                    else
                    {
                        $query->whereBetween('created_at', array($filter2, $filter3))->get();
                        $query->where('numberPedido','LIKE',"%{$filter}%");
                        $query->where('value','LIKE',"%{$filter1}%");
                    }
                }
                if ($filter3)
                {
                    if($filter2==null)
                    {
                        $query->whereBetween('created_at', array('2000-01-01 00:00:00', $filter3))->get();
                        $query->where('numberPedido','LIKE',"%{$filter}%");
                        $query->where('value','LIKE',"%{$filter1}%");
                    }
                    else
                    {
                        $query->whereBetween('created_at', array($filter2, $filter3))->get();
                        $query->where('numberPedido','LIKE',"%{$filter}%");
                        $query->where('value','LIKE',"%{$filter1}%");
                    }
                }
        })->paginate();
        return $results;

    }
    public function relproduct()
    {
        return $this->hasone('App\Http\Models\ModelProduct','id','products_id');
    }
    public function relUsers()
    {
        return $this->hasone('App\User','id','user_id');
    }
    public function relCarrinhoStatus()
    {
        return $this->hasone('App\Http\Models\ModelCarrinho_status','id','status_carrinho_id');
    }
    public function relPedidoVendaStatus()
    {
        return $this->hasone('App\Http\Models\ModelPedidoVenda_status','id','status_pedido_venda_id');
    }
    public function relLancamentoGerencial()
    {
        return $this->hasMany('App\Http\Models\ModelLancamentoGerencial','cliente_id');
    }
}
