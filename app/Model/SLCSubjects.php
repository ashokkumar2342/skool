<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SLCSubjects extends Model
{
    protected $fillable=[
    	'id',]; 
    public $timestamps = false; 
    public function students(){
    	return $this->hasOne('App\Student','id','StudentInfoId');
    }
    public function clsses(){
    	return $this->hasOne('App\Model\ClassType','id','ClassPassed');
    }
}
