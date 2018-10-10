<?php

namespace App\Model\Transport;

use App\Model\Transport\BoardingPoint;
use App\Model\Transport\Route;
use App\Student;
use Illuminate\Database\Eloquent\Model;

class TransportRegistration extends Model
{
     public function students(){
        return $this->hasOne(Student::class,'id','student_id');
    }

     public function morningRoutes(){
        return $this->hasOne(Route::class,'id','morning_route_id');
    }
     public function eveningRoutes(){
        return $this->hasOne(Route::class,'id','morning_route_id');
    }

     public function morningBoardingPoints(){
        return $this->hasOne(BoardingPoint::class,'id','morning_boarding_point_id');
    }

      public function eveningBoardingPoints(){
        return $this->hasOne(BoardingPoint::class,'id','evening_boarding_point_id');
    }
}
