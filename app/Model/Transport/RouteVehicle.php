<?php

namespace App\Model\Transport;

use App\Model\Transport\Vehicle;
use App\Model\Transport\VehicleType;
use Illuminate\Database\Eloquent\Model;

class RouteVehicle extends Model
{
	 protected $fillable = [
	     'vehicle_id','route_id','morning_id','evening_id',
	];
   public function vehicleType(){
       return $this->hasOne(VehicleType::class,'id','vehicle_type_id');
   }
}
