<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AwardPhoto extends Model
{
    public function awardPhoto($value='')
    {
    	return $this->hasOne('App\Model\AwardType','id','award_id'); 
    }
}
