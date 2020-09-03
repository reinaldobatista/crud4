<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class ModelParcelas_lacamentogerencial extends Model
{
    protected $table='parcelas_lancamento_gerencial';
    protected $fillable=['value','lancamento_gerencial_id','data_vencimento','data_pagamento','valor_recebido','number_parcela'];
    public function search($filter,$filter1,$filter2,$filter3,$filter4)
    {
        $results=$this->where(function($query) use($filter,$filter1,$filter2,$filter3,$filter4){
                date_default_timezone_set('America/Sao_Paulo');
                $data_atual=date('Y-m-d H:i:s');
                if ($filter)
                {
                    if($filter3==null||$filter4==null)
                    {
                        $query->where('id','LIKE',"%{$filter1}%");
                        $query->where('value','LIKE',"%{$filter2}%");
                    }
                    else
                    {
                        $query->where('id','LIKE',"%{$filter1}%");
                        $query->where('value','LIKE',"%{$filter2}%");
                        $query->whereBetween('data_vencimento', array($filter3, $filter4))->get();
                    }
                }
                if ($filter1)
                {
                    if($filter3==null||$filter4==null)
                    {
                        $query->where('id','LIKE',"%{$filter1}%");
                        $query->where('value','LIKE',"%{$filter2}%");
                    }
                    else
                    {
                        $query->where('id','LIKE',"%{$filter1}%");
                        $query->where('value','LIKE',"%{$filter2}%");
                        $query->whereBetween('data_vencimento', array($filter3, $filter4))->get();
                    }
                }
                if ($filter2)
                {
                    if($filter3==null||$filter4==null)
                    {
                        $query->where('id','LIKE',"%{$filter1}%");
                        $query->where('value','LIKE',"%{$filter2}%");
                    }
                    else
                    {
                        $query->where('id','LIKE',"%{$filter1}%");
                        $query->where('value','LIKE',"%{$filter2}%");
                        $query->whereBetween('data_vencimento', array($filter3, $filter4))->get();
                    }
                }
                if ($filter3)
                {
                    if($filter4==null)
                    {
                        $query->whereBetween('data_vencimento', array($filter3,$data_atual))->get();
                        $query->where('id','LIKE',"%{$filter1}%");
                        $query->where('value','LIKE',"%{$filter2}%");
                    }
                    else
                    {
                        $query->whereBetween('data_vencimento', array($filter3, $filter4))->get();
                        $query->where('id','LIKE',"%{$filter1}%");
                        $query->where('value','LIKE',"%{$filter2}%");
                    }
                }
                if ($filter4)
                {
                    if($filter3==null)
                    {
                        $query->whereBetween('data_vencimento', array('2000-01-01 00:00:00', $filter4))->get();
                        $query->where('id','LIKE',"%{$filter1}%");
                        $query->where('value','LIKE',"%{$filter2}%");
                    }
                    else
                    {
                        $query->whereBetween('data_vencimento', array($filter3, $filter4))->get();
                        $query->where('id','LIKE',"%{$filter1}%");
                        $query->where('value','LIKE',"%{$filter2}%");
                    }
                }
        })->paginate();
        return $results;

    }
    public function relLancamentoGerencial()
    {
        return $this->hasone('App\Http\Models\ModelLancamentoGerencial','id','lancamento_gerencial_id');
    }
}
