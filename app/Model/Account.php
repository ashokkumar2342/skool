<?php

namespace App\Model;

use App\Model\Minu;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    public function minus(){
        return $this->hasOne(Minu::class,'id','admin_id');
    }
}
