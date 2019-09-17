<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
   public function admins($value='')
   {
   	return $this->hasOne('App\Admin','id','user_id');
   }
}
