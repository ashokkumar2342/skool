<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class StudentRemark extends Model
{
    Public function admin(){
        return $this->hasOne('App\Admin','id','teacher_id'); 
    }
}
