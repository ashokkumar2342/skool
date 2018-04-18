<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
	Public function admins()  {
		return $this->belongsTo('App\Admin','admin_id');
	}  
}
