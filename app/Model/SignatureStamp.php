<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SignatureStamp extends Model
{
    public function admins(){
        return $this->hasOne('App\Admin','id','user_id');
    }
}
