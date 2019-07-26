<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Student extends Authenticatable
{
    use Notifiable,HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
       public function classes(){
        return $this->hasOne('App\Model\ClassType','id','class_id');
    }
    public function classFee(){
        return $this->hasOne('App\Model\ClassFee','class_id','class_id')->where('session_id',$this->session_id);
    }    
     
    public function sessions(){
        return $this->hasOne('App\Model\AcademicYear','id','session_id');
    }
    public function academicYear(){
        return $this->hasOne('App\Model\AcademicYear','id','session_id');
    }
    public function sectionTypes(){
        return $this->hasOne('App\Model\SectionType','id','section_id');
    } 
    // public function studentSiblings(){
    //     return $this->hasMany('App\Model\StudentSiblingInfo','registration_no','id');
    // }    
    public function genders(){
        return $this->hasOne('App\Model\Gender','id','gender_id');
    }
    public function religions(){
        return $this->hasOne('App\Model\Religion','id','religion_id');
    }
    public function categories(){
        return $this->hasOne('App\Model\Category','id','category_id');
    }
     public function studentStatus(){
        return $this->hasOne('App\Model\StudentStatus','id','student_status_id');
    }

    Public function siblings(){
        return $this->hasMany('App\Model\StudentSiblingInfo','student_id','id');  

    }
     Public function incomes(){
        return $this->hasOne('App\Model\IncomeRange','id','income_id');
        
    } 

    Public function professions(){
        return $this->hasOne('App\Model\Profession','id','occupation'); 
    }
     Public function document(){
        return $this->hasOne('App\Model\Document','student_id','id'); 
    }
     Public function documents(){
        return $this->hasMany('App\Model\Document','student_id','id'); 
    }
    
    
}
