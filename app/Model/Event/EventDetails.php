<?php

namespace App\Model\Event;

use Illuminate\Database\Eloquent\Model;

class EventDetails extends Model
{
     public function eveneFor()
    {
    	return $this->hasOne('App\Model\Event\EveneFor','id','event_for_id');
    }
    public function eveneType()
    {
    	return $this->hasOne('App\Model\Event\EventType','id','event_type_id');
    }
}
