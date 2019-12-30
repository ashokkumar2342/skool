<?php

namespace App\Model\Sms;

use Illuminate\Database\Eloquent\Model;

class SentEmailAttachment extends Model
{
	protected $table = 'sent_email_attachment';
    public $timestamps = false;

    public function admins()
    {
    	return $this->hasOne('App\Admin','id','user_id');
    }
    public function templateType()
    {
    	return $this->hasOne('App\Model\Sms\TemplateType','id','template_type_id');
    }
    public function messagePurposes()
    {
    	return $this->hasOne('App\Model\Sms\MessagePurpose','id','purpose');
    }
    public function students()
    {
    	return $this->hasOne('App\Student','id','student_id');
    }
}
 