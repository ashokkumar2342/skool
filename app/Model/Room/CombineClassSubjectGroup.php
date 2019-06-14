<?php

namespace App\Model\Room;

use Illuminate\Database\Eloquent\Model;

class CombineClassSubjectGroup extends Model
{
    protected $fillable = [
	    'subject_id', 'group_no','class_id'
	];
}
