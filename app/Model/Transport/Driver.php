<?php

namespace App\Model\Transport;

use Illuminate\Database\Eloquent\Model;
use App\Model\Transport\Vehicle;

class Driver extends Model
{
     public function vehicles(){
        return $this->hasOne(Vehicle::class,'id','vehicle_id');
    }
}
