<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
   protected $fillable = [
          'student_id',
    ];
     public function religion(){
        return $this->hasOne('App\Model\Religion','id','religion');
    }
    public function categories(){
        return $this->hasOne('App\Model\Category','id','cotegory_id');
    }
}
