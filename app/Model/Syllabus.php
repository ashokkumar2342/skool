<?php

namespace App\Model;
use App\Model\SubjectType;
use Illuminate\Database\Eloquent\Model;

class Syllabus extends Model
{
    public function sujectTypes(){
        return $this->hasOne(SubjectType::class,'id','subject_id');
    }
    protected $table='syllabus';
    
    public $timestamps=false;
    protected $fillable=['id','academic_year_id','class_id','subject_id'];
}
