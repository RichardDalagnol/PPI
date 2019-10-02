<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    //um usuario pode cadastrar muitos avisos
    public function avisos()
    {
    	return $this->hasMany('App\Aviso');
    }
}
