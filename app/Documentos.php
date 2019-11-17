<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documentos extends Model
{

	protected $table = 'documentos';

	protected $fillable = ['titulo','data', 'arquivo', 'descricao',];

    
    public function comments(){
        return $this->morphMany(Comment::class, 'commentable');
    }
}
