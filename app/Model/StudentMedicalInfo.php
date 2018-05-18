<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class StudentMedicalInfo extends Model
{
    
    
   Public function students(){
        return $this->hasOne('App\Student','id','student_id');
    }
     Public function bloodgroups(){
        return $this->hasOne('App\Model\bloodGroup','id','bloodgroup_id');
    }
    protected $fillable = [
       'alergey', 
        'alergey_vacc',
        'bp',
        'complextion',
        'dental',
        'hb',
        'height',
        'id_marks1',
        'id_marks2',
        'income',
        'narration',
        'ondate ',
        'physical_handicapped',
        'student_id', 
        'vision',
        'weight'
    ];
}