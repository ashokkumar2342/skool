<?php

namespace App\Model\Library;

use Illuminate\Database\Eloquent\Model;

class MemberShipFacility extends Model
{
      public function librarymembertype()
    {
    	return $this->hasOne('App\Model\Library\LibraryMemberType','id','member_ship_type_id');
    }
     public function memberShipFacility()
    {
    	return $this->hasOne('App\Model\Library\MemberShipFacility','id','no_of_ticket');
    }
     
}
