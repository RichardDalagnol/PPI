<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
	protected $table = 'users';

	protected $fillable = ['name','email','password','admin'];

    
    //um usuario pode cadastrar muitos documentos
    public function documentos()
    {
    	return $this->hasMany('App\Documentos');
    }
}
