<?php

namespace App\Model\Event;

use Illuminate\Database\Eloquent\Model;

class EventDetails extends Model
{
     public function eveneFor()
    {
    	return $this->hasOne('App\Model\Event\EveneFor','id','event_for_id');
    }
}
