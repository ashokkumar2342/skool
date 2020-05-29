<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SignatureStamp extends Model
{
	protected $fillable=['id'];
    public function admins(){
        return $this->hasOne('App\Admin','id','user_id');
    }
    public function CertificateType(){
        return $this->hasOne('App\Model\CertificateType','id','certificate_type_id');
    }
    public function IssueAthortiType(){
        return $this->hasOne('App\Model\IssueAthortiType','id','stamp_type');
    }
}
