<?php

namespace App\Model;

use App\Model\MinuType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Minu extends Model
{
	
	use SoftDeletes;
	 protected $fillable = [
	   'admin_id', 
	   'minu_id', 
	   'r_status', 
	   'w_status', 
	   'd_status', 
	   
	  
	];
    Public function admins(){
    	return $this->belongsTo('App\Admin','admin_id','id');
    }
    public function minutypes(){
        return $this->hasOne(MinuType::class,'id','minu_id');
    }
}
