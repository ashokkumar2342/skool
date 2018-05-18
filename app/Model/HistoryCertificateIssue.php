<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class HistoryCertificateIssue extends Model
{
	
     protected $fillable = [
       'student_id', 
       'certificate_type', 
       'file_name', 
       
      
    ];
}
