<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
   protected $fillable = [
          'student_id',
    ];
     public function religions(){
        return $this->hasOne('App\Model\Religion','id','religion_id');
    }
    public function categories(){
        return $this->hasOne('App\Model\Category','id','category_id');
    }
}
