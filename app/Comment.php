<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

	protected $fillable = ['idUsuario', 'body', 'commentable_id','commentable_type'];

    public function user(){
	    return $this->belongsTo(User::class);
	}

	public function commentable(){
	    return $this->morphTo();
	}
}
