<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class ModelLancamentoGerencial extends Model
{
    // $query->whereBetween('created_at', array($filter, $filter1))->get();
    protected $table='lancamento_gerencial';
    protected $fillable=['description','value','cliente_id','data_compra','status_pedido_venda_id','tipo_id','pedido_id'];
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
                        $query->where('cliente_id','LIKE',"%{$filter}%");
                        $query->where('value','LIKE',"%{$filter1}%");
                    }
                    else
                    {
                        $query->where('cliente_id','LIKE',"%{$filter}%");
                        $query->where('value','LIKE',"%{$filter1}%");
                        $query->whereBetween('created_at', array($filter2, $filter3))->get();
                    }
                }
                if ($filter1)
                {
                    if($filter2==null)
                    {
                        $query->where('cliente_id','LIKE',"%{$filter}%");
                        $query->where('value','LIKE',"%{$filter1}%");
                    }
                    else
                    {
                        $query->where('cliente_id','LIKE',"%{$filter}%");
                        $query->where('value','LIKE',"%{$filter1}%");
                        $query->whereBetween('created_at', array($filter2, $filter3))->get();
                    }
                }
                if ($filter2)
                {
                    if($filter3==null)
                    {
                        $query->whereBetween('created_at', array($filter2,$data_atual))->get();
                        $query->where('cliente_id','LIKE',"%{$filter}%");
                        $query->where('value','LIKE',"%{$filter1}%");
                    }
                    else
                    {
                        $query->whereBetween('created_at', array($filter2, $filter3))->get();
                        $query->where('cliente_id','LIKE',"%{$filter}%");
                        $query->where('value','LIKE',"%{$filter1}%");
                    }
                }
                if ($filter3)
                {
                    if($filter2==null)
                    {
                        $query->whereBetween('created_at', array('2000-01-01 00:00:00', $filter3))->get();
                        $query->where('cliente_id','LIKE',"%{$filter}%");
                        $query->where('value','LIKE',"%{$filter1}%");
                    }
                    else
                    {
                        $query->whereBetween('created_at', array($filter2, $filter3))->get();
                        $query->where('cliente_id','LIKE',"%{$filter}%");
                        $query->where('value','LIKE',"%{$filter1}%");
                    }
                }
        })->paginate();
        return $results;

    }
    public function relParcelas()
    {
        return $this->hasmany('App\Http\Models\ModelParcelas_lancamento','lancamento_gerencial_id');
    }
    public function relUsers()
    {
        return $this->hasone('App\User','id','cliente_id');
    }
    public function relTipo()
    {
        return $this->hasone('App\Http\Models\Modeltipo_operacao','id','tipo_id');
    }
    public function relPedidoVenda()
    {
        return $this->hasone('App\Http\Models\ModelpedidoVenda','id','pedido_id');
    }

}
