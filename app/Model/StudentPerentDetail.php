<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class StudentPerentDetail extends Model
{
    protected $fillable = [
        'relation_id', 'student_id', 
    ];
}
