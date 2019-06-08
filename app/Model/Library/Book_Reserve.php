<?php

namespace App\Model\Library;

use Illuminate\Database\Eloquent\Model;

class Book_Reserve extends Model
{
     
       public function booktype()
    {
    	return $this->hasOne('App\Model\Library\Booktype','id','book_name_id');
    }
       public function memberShipDetails()
    {
    	return $this->hasOne('App\Model\Library\MemberShipDetails','id','member_ship_no_id');
    }
     public function bookAccession()
    {
    	return $this->hasOne('App\Model\Library\BookAccession','id','accession_no');
    }
     public function bookAccessions()
    {
        return $this->hasOne('App\Model\Library\BookAccession','id','status');
    }  
    public function bookReserveStatus()
    {
        return $this->hasOne('App\Model\Library\BookReserveStatus','id','status');
    } 
   
}
