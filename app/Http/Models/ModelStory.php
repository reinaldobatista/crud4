<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class ModelStory extends Model
{
    protected $table='story';
    protected $fillable=['story'];
    public function relDeposito()
    {
        return $this->hasmany('App\Http\Models\ModelDeposito','story_id');
    }
    // public function relUsers()
    // {
    //     return $this->hasone('App\User','id','id_user');
    // }
}
