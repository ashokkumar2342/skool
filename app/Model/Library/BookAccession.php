<?php

namespace App\Model\Library;

use Illuminate\Database\Eloquent\Model;

class BookAccession extends Model
{
      public function booktype()
    {
    	return $this->hasOne('App\Model\Library\Booktype','id','book_id');
    }

     public function bookpurchasebill()
    {
    	return $this->hasOne('App\Model\Library\BookPurchaseBill','id','bill_id');
    } 
    
    public function libraryStatus()
    {
    	return $this->hasOne('App\Model\Library\LibraryStatus','id','status');
    }

}
