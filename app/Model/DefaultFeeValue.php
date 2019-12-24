<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DefaultFeeValue extends Model
{
    protected $fillable=[
    	'id','userid'];
    protected $table='default_fee_value';
}

