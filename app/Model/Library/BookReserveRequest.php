<?php

namespace App\Model\Library;

use Illuminate\Database\Eloquent\Model;

class BookReserveRequest extends Model
{
      public function booktype()
    {
    	return $this->hasOne('App\Model\Library\Booktype','id','book_name_id');
    }

     public function librarymembertype()
    {
    	return $this->hasOne('App\Model\Library\LibraryMemberType','id','member_ship_type_id');
    } 
    
    public function bookstatus()
    {
    	return $this->hasOne('App\Model\Library\BookStatus','id','status');
    }
}
