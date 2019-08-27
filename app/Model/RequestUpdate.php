<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RequestUpdate extends Model
{
   protected $fillable = [
       'name', 'email', 'password','nick_name',  
'father_name ',
'mother_name ',  
'father_mobile', 
'mother_mobile',  
'email',  
'dob',  
'gender_id',  
'religion_id',  
'category_id',  
'c_address',  
'p_address',  
'state',  
'city',  
'pincode',
   ];
}
