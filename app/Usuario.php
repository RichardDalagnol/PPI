<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    //um usuario só pode ter um único setor
    public function setors()
    {
    	return $this->belongsTo('App\Setor');
    }

    //um usuario pode cadastrar muitos avisos
    public function avisos()
    {
    	return $this->hasMany('App\Aviso');
    }
}
