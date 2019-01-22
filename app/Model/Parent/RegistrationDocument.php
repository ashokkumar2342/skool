<?php

namespace App\Model\Parent;

use App\Model\DocumentType;
use Illuminate\Database\Eloquent\Model;

class RegistrationDocument extends Model
{
    public function documentTypes(){
        return $this->hasOne(DocumentType::class,'id','document_type_id');
    }
}
