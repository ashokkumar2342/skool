<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
   public function student()
   {
   	return $this->hasOne('App\Student','id','registration_no');
   }
}
