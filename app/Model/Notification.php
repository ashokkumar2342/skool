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
   public function insNotification($insArr){
   	try {
   		return $this->insertGetId($insArr);
   	} catch (QueryException $e) {
   		return $e; 
   	}
   }

    // get notification
   public function getNotification($id){
      return $this->where('user_id',$id)
      				->orderBy('id', 'desc') 
      				->where(function($query){
                $query->orWhere('status', 1);
                $query->orWhere('status', 0);
              })   				
                    
      				->paginate(10); 
   }

    // all get notification 
   public function getAllNotification($id){
      return $this->where('user_id',$id)
      				->orderBy('id', 'desc') 	   				
			        ->where(function($query){
                $query->orWhere('status', 1);
                $query->orWhere('status', 0);
              }) 
      				->paginate(15); 
   }
    //  notification read status change
   public function readStatusChange($id){
   	try {
   	    return $this->where('id',$id) 
      				->where('status',0)
   	    ->update(['status'=>1]);
   	} catch (QueryException $e) {
   	    return $e; 
   	}
     
   }
    //  notification read status change
   public function noficationRemove($id){
   	try {
   	    return $this->where('id',$id) 
   	    ->update(['status'=>2]);
   	} catch (QueryException $e) {
   	    return $e; 
   	}
     
   }
    //  notification read status change All
   public function readStatusChangeAll($id){
   	try {
   	    return $this->where('user_id',$id)
   	    		->where('status',0) 
   	    ->update(['status'=>1]);
   	} catch (QueryException $e) {
   	    return $e; 
   	}
     
   }

    // get All notification
   public function countNotification($id){
      return $this->where('user_id',$id)
      			 
      				->where('status',0)->count(); 
   }
}
