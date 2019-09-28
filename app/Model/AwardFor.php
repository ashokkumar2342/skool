<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AwardFor extends Model
{
   public function awardTypes($value='')
    {
    	return $this->hasOne('App\Model\AwardType','id','award_id'); 
    } 
    public function students($value='')
    {
    	return $this->hasOne('App\Student','id','student_id'); 
    }
}
