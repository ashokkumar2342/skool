<?php

namespace App\Model;

use App\Model\MinuType;
use App\Model\SubMenu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Minu extends Model
{
	
	use SoftDeletes;
	 protected $fillable = [
	   'admin_id', 
	   'minu_id', 
       'sub_menu_id', 
	   'r_status', 
	   'w_status', 
	   'd_status', 
	   
	  
	];
    Public function admins(){
    	return $this->belongsTo('App\Admin','admin_id','id');
    }
    Public function admin(){
    	return $this->hasOne('App\Admin','id','admin_id');
    }
    public function minutypes(){
        return $this->hasOne(MinuType::class,'id','minu_id');
    }
     public function subMenuTypes(){
        return $this->hasOne(SubMenu::class,'id','sub_menu_id');
    }

    
}
