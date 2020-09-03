<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Modeltipo_operacao extends Model
{
    protected $table='tipo_operacao';
    protected $fillable=['name'];
    public function relLancamentoGerencial()
    {
        return $this->hasmany('App\Http\Models\ModelLancamentoGerencial','tipo_id');
    }
}
