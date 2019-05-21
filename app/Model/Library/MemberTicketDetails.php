<?php

namespace App\Model\Library;

use Illuminate\Database\Eloquent\Model;

class MemberTicketDetails extends Model
{
     public function membershipfacility()
    {
    	return $this->hasOne('App\Model\Library\MemberShipFacility','id','member_ship_facility_id');
    }
}
