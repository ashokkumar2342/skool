<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Section extends Model
{
    use SoftDeletes;
    
   
    public function sessions(){
    	return $this->hasOne('App\Model\SessionDate','id','session_id');
    }
    Public function classes(){
    	return $this->hasOne('App\Model\ClassType','id','class_id');
    }
}
