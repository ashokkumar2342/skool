<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Subject extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'subjectType_id', 'classType_id', 'isoptional_id',
    ];
     
    Public function classTypes(){
     	return $this->belongsTo('App\Model\ClassType','classType_id');
     }

    Public function subjectTypes(){
     	return $this->hasOne('App\Model\SubjectType','id','subjectType_id');
     }

    Public function isoptional(){
     	return $this->hasOne('App\Model\Isoptional','id','isoptional_id');
     }
}
