<?php

namespace App\Model\Sms;

use Illuminate\Database\Eloquent\Model;

class EmailTemplate extends Model
{
   public function messagePorpose()
    {
    	return $this->hasOne('App\Model\Sms\MessagePurpose','id','message_purpose_id');
    }

    public function getTemplateByTempalateId($message_purpose_id)
    {
       return  $this->where('message_purpose_id',$message_purpose_id)->where('status',1)->first();
    }
}
