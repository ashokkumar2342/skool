<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Session extends Model
{
    use SoftDeletes;
    
   protected $table ='academic_years';

    public function sessions(){
    	return $this->hasOne('App\Model\SessionDate','id','session_id');
    }
    Public function classes(){
    	return $this->hasOne('App\Model\ClassType','id','class_id');
    }
}
