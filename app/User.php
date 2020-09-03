<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','enderenco','bairro','cidade','cpf',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function search($filter,$filter1)
    {
        $results=$this->where(function($query) use($filter,$filter1){
                if ($filter)
                {
                    $query->where('name','LIKE',"%{$filter}%");
                    $query->where('email','LIKE',"%{$filter1}%");
                }
                if ($filter1)
                {
                    $query->where('name','LIKE',"%{$filter}%");
                    $query->where('email','LIKE',"%{$filter1}%");
                }
        })->paginate();
        return $results;

    }
    public function relPedidoVenda()
    {
        return $this->hasmany('App\Http\Models\ModelpedidoVenda','users_id');
    }
    public function relLancamentoGerencial()
    {
        return $this->hasmany('App\Http\Models\ModelLancamentoGerencial','cliente_id');
    }
}
