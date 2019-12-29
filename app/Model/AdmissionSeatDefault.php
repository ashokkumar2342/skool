<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AdmissionSeatDefault extends Model
{
    protected $fillable=[
    	'id','user_id',];
    protected $table='admission_seat_defaults';
}

