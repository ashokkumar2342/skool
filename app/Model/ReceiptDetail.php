<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ReceiptDetail extends Model
{
    protected $fillable=[
    	'id',];
    protected $table='receipt_detail';


    public function admins($value='')
    {
    	return $this->hasOne('App\Admin','id','user_id'); 
    }
    public function students($value='')
    {
    	return $this->hasOne('App\Student','id','student_id'); 
    }
}

