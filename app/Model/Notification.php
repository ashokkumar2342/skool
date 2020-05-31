<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
   public function admins($value='')
   {
   	return $this->hasOne('App\Admin','id','user_id');
   }

    // save notification
   public function insNotificationCenter($insArr){
   	try {
   		return $this->insertGetId($insArr);
   	} catch (QueryException $e) {
   		return $e; 
   	}
   }

    // get notification
   public function getNotificationCenter($id){
      return $this->where('user_id',$id)
      				->orderBy('id', 'desc') 
      				->where('status',1)	   				
      				->paginate(10); 
   }

    // all get notification 
   public function getAllNotificationCenter($id){
      return $this->where('user_id',$id)
      				->orderBy('id', 'desc') 	   				
      				->where('status',1)
      				->paginate(15); 
   }
    //  notification read status change
   public function readStatusChange($id){
   	try {
   	    return $this->where('id',$id)
   	    		->where('read_status',1)
      				->where('status',1)
   	    ->update(['read_status'=>2]);
   	} catch (QueryException $e) {
   	    return $e; 
   	}
     
   }
    //  notification read status change
   public function noficationRemove($id){
   	try {
   	    return $this->where('id',$id) 
   	    ->update(['status'=>0]);
   	} catch (QueryException $e) {
   	    return $e; 
   	}
     
   }
    //  notification read status change All
   public function readStatusChangeAll($id){
   	try {
   	    return $this->where('user_id',$id)
   	    		->where('read_status',1)
      				->where('status',1)
   	    ->update(['read_status'=>2]);
   	} catch (QueryException $e) {
   	    return $e; 
   	}
     
   }

    // get All notification
   public function countNotificationCenter($id){
      return $this->where('user_id',$id)
      				->where('read_status',1)
      				->where('status',1)->count(); 
   }
}
