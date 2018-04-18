<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Minu extends Model
{
	use SoftDeletes;
    Public function admins(){
    	return $this->belongsTo('App\Model\Admin');
    }
    public function minutypes(){
        return $this->hasOne('App\Model\Minutype','id','minu_id');
    }
}
