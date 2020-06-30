<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SLCSubjects extends Model
{
    protected $fillable=[
    	'id',]; 
    public $timestamps = false;
    protected $table='slcsubjects'; 
    public function subjects(){
    	return $this->hasOne('App\Model\SubjectType','id','SubjectId');
    }
    public function clsses(){
    	return $this->hasOne('App\Model\ClassType','id','ClassPassed');
    }
}
