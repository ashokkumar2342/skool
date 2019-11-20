<?php

namespace App\Model\Sms;

use Illuminate\Database\Eloquent\Model;

class MessagePurpose extends Model
{
	protected $table = 'message_purpose';

   public function templateType()
    {
    	return $this->hasOne('App\Model\Sms\TemplateType','id','template_type_id');
    }
}
 