<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CertificateIssueRemark extends Model
{
    public function admins(){
    	return $this->hasOne('App\Admin','id','admin_id');
    }
}
