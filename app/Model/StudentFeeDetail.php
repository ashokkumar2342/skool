<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class StudentFeeDetail extends Model
{
    protected $fillable = ['student_id','fee_structure_last_date_id','concession_id','fee_amount','concession_amount','paid','last_date','from_date','to_date','refundable'];
    
}
