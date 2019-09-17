<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    public function subjectTypes(){
        return $this->hasOne('App\Model\SubjectType','id','subject_id');
    }
}
