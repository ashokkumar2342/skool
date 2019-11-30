<?php

namespace App\Model\Sms;

use Illuminate\Database\Eloquent\Model;

class EmailTemplate extends Model
{
   public function templateType()
    {
    	return $this->hasOne('App\Model\Sms\TemplateType','id','template_type_id');
    }

    public function getTemplateByTempalateId($template_type_id)
    {
       return  $this->where('template_type_id',$template_type_id)->where('status',1)->first();
    }
}
