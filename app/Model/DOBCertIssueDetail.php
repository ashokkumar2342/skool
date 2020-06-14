<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DOBCertIssueDetail extends Model
{
    protected $fillable=[
    	'id',];
    protected $table='dobcertissuedetail';
    public $timestamps = false;

    public function students(){
    	return $this->hasOne('App\Student','id','StudentInfoId');
    }
    public function clsses(){
    	return $this->hasOne('App\Model\ClassType','id','ClassPassed');
    }
}
