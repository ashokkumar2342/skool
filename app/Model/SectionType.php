<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SectionType extends Model
{
	protected $fillable = [
	    'id', 'name', 'code','sorting_order_id',
	];
    
}
