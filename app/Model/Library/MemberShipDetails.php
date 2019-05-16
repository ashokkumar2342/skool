<?php

namespace App\Model\Library;

use Illuminate\Database\Eloquent\Model;

class MemberShipDetails extends Model
{
     public function librarymembertype()
    {
    	return $this->hasOne('App\Model\Library\LibraryMemberType','id','member_ship_type_id');
    } 
    public function membershipfacility()
    {
    	return $this->hasOne('App\Model\Library\MemberShipFacility','id','member_ship_id');
    }
     public function membershipfacilitys()
    {
    	return $this->hasOne('App\Model\Library\MemberShipFacility','id','member_ship_facility_id');
    }
}
