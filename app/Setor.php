<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setor extends Model
{
    //um setor pode ter muitos usuários
	public function usuarios()
	{
		return $this->hasMany('App\Usuario');
	}

	//um setor pode ter muitos avisos
	public function avisos()
	{
		return $this->hasMany('App\Aviso');
	}
}
