<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ClassType extends Model
{
	protected $fillable = [
        'id',
    ];
    use SoftDeletes;
    Public function subjects(){
     	return $this->hasMany('App\Model\Subject','id','classType_id');
     }
}
