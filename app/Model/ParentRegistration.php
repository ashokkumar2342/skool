<?php

namespace App\Model;

use App\Model\DocumentType;
use App\Model\Parent\RegistrationDocument;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

     class ParentRegistration extends Authenticatable
    {
        use Notifiable;

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
         
        // public function sessions(){
        //     return $this->hasOne('App\Model\SessionDate','id','session_id');
        // }
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
            return $this->hasOne('App\Model\studentStatus','id','student_status_id');
        }

        Public function siblings(){
            return $this->hasMany('App\Model\StudentSiblingInfo','student_id','id');  

        }
         Public function incomes(){
            return $this->hasOne('App\Model\IncomeRange','id','income_id');
            
        }
        Public function bloodGroups(){
            return $this->hasOne('App\Model\BloodGroup','id','blood_group'); 
        } 
        Public function academicYears(){
            return $this->hasOne('App\Model\AcademicYear','id','academic_year_id'); 
        }

        Public function tongues(){
            return $this->hasOne('App\Model\Tongue','id','tongue'); 
        } 
        Public function f_professions(){
            return $this->hasOne('App\Model\Profession','id','f_occupation'); 
        } 
        Public function m_professions(){
            return $this->hasOne('App\Model\Profession','id','m_occupation'); 
        } 
        Public function g_professions(){
            return $this->hasOne('App\Model\Profession','id','g_occupation'); 
        } 
         Public function f_incomeRange(){
            return $this->hasOne('App\Model\IncomeRange','id','f_annual_income'); 
        } 
        Public function m_incomeRange(){
            return $this->hasOne('App\Model\IncomeRange','id','m_annual_income'); 
        } 
        Public function g_incomeRange(){
            return $this->hasOne('App\Model\IncomeRange','id','g_annual_income'); 
        } 

        
    }
 
  