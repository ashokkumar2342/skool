<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ClassFee extends Model
{
    use SoftDeletes;
    public function classes(){
    	return $this->hasOne('App\Model\ClassType','id','class_id');
    }
    // public function sessions(){
    // 	return $this->hasOne('App\Model\SessionDate','id','session_id');
    // }
}
