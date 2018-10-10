<?php

namespace App\Model\Transport;

use App\Model\Transport\BoardingPoint;
use App\Model\Transport\Route;
use App\Model\Transport\Vehicle;
use Illuminate\Database\Eloquent\Model;

class RouteDetails extends Model
{
	   protected $fillable = [
	     'boarding_point_id','route_id','morning_id','evening_id',
	];
    public function routes(){
    	return $this->hasOne(Route::class,'id','route_id');
    }
    public function vehicles(){
    	return $this->hasOne(Vehicle::class,'id','vehicle_id');
    } 
    public function boardingPoints(){
    	return $this->hasOne(BoardingPoint::class,'id','boarding_point_id');
    }
}
