<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DefaultRoleQuickMenu extends Model
{
  

	   protected $fillable = [
       
       'role_id', 
         
    ];
  
    protected $table = 'default_role_quick_menu';
     public $timestamps = false;

    
    
}
