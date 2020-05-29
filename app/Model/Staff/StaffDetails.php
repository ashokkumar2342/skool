<?php

namespace App\Model\Staff;

use Illuminate\Database\Eloquent\Model;

class StaffDetails extends Model
{
    protected $fillable=[
    	'id'];
    protected $table='staff_detail';

    public function RelationStaff($value='')
   {
   	 return $this->hasOne('App\Model\Staff\RelationStaff','id','relation_id');
   }
}

