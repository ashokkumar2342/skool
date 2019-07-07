<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
	
     protected $fillable = [
       'student_id', 
       'document_type_id', 
      'name',
      
    ];

    Public function documentTypes(){
    	return $this->hasOne('App\Model\DocumentType','id','document_type_id');
    	
    } 
}
