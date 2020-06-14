<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SLCIssueDetail extends Model
{
    protected $fillable=[
    	'id',];
    protected $table='slcissuedetail';
    public $timestamps = false;

    public function students(){
    	return $this->hasOne('App\Student','id','StudentInfoId');
    }
    public function clsses(){
    	return $this->hasOne('App\Model\ClassType','id','ClassPassed');
    }
    public function LastClass(){
        return $this->hasOne('App\Model\ClassType','id','LastClass');
    }
    public function ClassAdmitteds(){
        return $this->hasOne('App\Model\ClassType','id','ClassAdmitted');
    }
    public function ClassQualifieds(){
        return $this->hasOne('App\Model\ClassType','id','ClassQualified');
    }
    public function Categorys(){
        return $this->hasOne('App\Model\Category','id','Category');
    }
}
