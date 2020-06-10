<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CharCertIssueDetail extends Model
{
    protected $fillable=[
    	'id',];
    protected $table='charcertissuedetail';
    public $timestamps = false;
}
