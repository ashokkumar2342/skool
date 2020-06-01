<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SignatureStamp extends Model
{
	protected $fillable=['id'];
    public function employee(){
        return $this->hasOne('App\Model\Hr\Employee','id','emp_id');
    }
    public function CertificateType(){
        return $this->hasOne('App\Model\CertificateType','id','certificate_type_id');
    }
    public function IssueAthortiType(){
        return $this->hasOne('App\Model\IssueAuthortyType','id','authority_type_id');
    }
}
