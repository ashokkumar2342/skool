<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserClassType extends Model
{
     Public function classes(){
    	return $this->hasOne('App\Model\ClassType','id','class_id');
    }
    Public function admins(){
    	return $this->hasOne('App\Admin','id','admin_id');
    }
}
