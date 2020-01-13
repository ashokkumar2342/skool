<?php

namespace App\Model\Transport;

use App\Model\Transport\Transport;
use App\Model\Transport\VehicleType;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
	protected $fillable=['id',];
    public function transport(){
        return $this->hasOne(Transport::class,'id','transport_id');
    }
    public function vehicleType(){
        return $this->hasOne(VehicleType::class,'id','vehicle_type_id');
    }
}
