<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aviso extends Model
{

    //O aviso é cadastrado por um único usuário
    public function usuarios()
    {
        return $this->belongsTo('App\Usuario');
    }
}
