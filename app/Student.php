<?php

namespace App;

use App\Model\StudentAddressDetail;
use App\Model\StudentPerentDetail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
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

    public function academicYear(){
        return $this->hasOne('App\Model\AcademicYear','id','academic_year_id');
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
    // public function religions(){
    //     return $this->hasOne('App\Model\Religion','id','religion_id');
    // }
    // public function categories(){
    //     return $this->hasOne('App\Model\Category','id','category_id');
    // }
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
    Public function houses(){
        return $this->hasOne('App\Model\House','id','house_no'); 
    }  
    Public function addressDetails(){
        return $this->belongsTo(StudentAddressDetail::class,'id','student_id'); 
    } 
    Public function parents(){
        return $this->hasMany(StudentPerentDetail::class,'student_id','id'); 
    }
    //single student get data
    public function getStudentById($id)
    {
        try {
           return $this->find($id);
        } catch (Exception $e) {
            return $e;
        }

    }
      //single student get data
    public function getStudentDetailsById($id)
    {
        try {
          return $student =Student::with(['classes','academicYear','sectionTypes','genders','studentStatus','addressDetails.address.religions','addressDetails.address.categories','parents','parents.relation'])->find($id);  
        } catch (Exception $e) {
            return $e;
        }

    }
    //single student get data
    public function getAllStudents()
    {
        try {
           return $this->where('student_status_id',1)->get();
        } catch (Exception $e) {
            return $e;
        }

    }
    //single student get data
    public function getStudentsByArrId($arrId)
    {
        try {
           return $this->whereIn('id',$arrId)->where('student_status_id',1)->get();
        } catch (Exception $e) {
            return $e;
        }

    }
    public function getdetailbyemail($email){
    try {
    return $this->where("email",$email)
    ->first();
    } catch (QueryException $e) {
    return $e; 
    }
    }
     public function getStudentsAllDetilas()
     {
      try {
          $datas=  DB::table('students')
            ->leftJoin('student_perent_details', 'students.id', '=', 'student_perent_details.student_id') 
                    
            ->leftJoin('parents_infos','parents_infos.id','=','student_perent_details.perent_info_id')
            ->leftJoin('guardian_relation_types','guardian_relation_types.id','=','student_perent_details.relation_id')
            ->leftJoin('student_address_details','student_address_details.student_id','=','student_perent_details.student_id')
            ->leftJoin('addresses','addresses.id','=','student_address_details.student_address_details_id')
            ->select(
              'students.*',
              'addresses.primary_mobile',
              'addresses.p_address',
              'parents_infos.name as f_name' ,
              'parents_infos.mobile as f_mobile' ,
              'student_perent_details.relation_id'
            )    
            ->get(); 
            return $datas;
                 
                 
              

         } catch (Exception $e) {
            
        }
     }
     public function getStudentByClassOrSection($class_id,$section_id)
     {
      try {   
          $datas=  DB::table('students')
            ->leftJoin('student_perent_details', 'students.id', '=', 'student_perent_details.student_id') 
                  ->where('class_id',$class_id)
                  ->where('section_id',$section_id)  
            ->leftJoin('parents_infos','parents_infos.id','=','student_perent_details.perent_info_id')
            ->leftJoin('guardian_relation_types','guardian_relation_types.id','=','student_perent_details.relation_id')
            ->leftJoin('student_address_details','student_address_details.student_id','=','student_perent_details.student_id')
            ->leftJoin('addresses','addresses.id','=','student_address_details.student_address_details_id')
            ->select(
              'students.*',
              'addresses.primary_mobile',
              'addresses.p_address',
              'parents_infos.name as f_name' ,
              'parents_infos.mobile as f_mobile' ,
              'student_perent_details.relation_id'
            )    
            ->get(); 
            return $datas; 
         } catch (Exception $e) {
            
        }
     }
     public function getStudentDetilas($student_id)
     {
      try {
           return $this  
                ->join('student_perent_details','student_perent_details.student_id','=','students.id')
                ->join('parents_infos','parents_infos.id','=','student_perent_details.perent_info_id')
                ->join('guardian_relation_types','guardian_relation_types.id','=','student_perent_details.relation_id')
                ->join('student_address_details','student_address_details.student_id','=','student_perent_details.student_id')
                ->join('addresses','addresses.id','=','student_address_details.student_address_details_id')
                ->join('religions','religions.id','=','addresses.religion_id')
                ->join('categories','categories.id','=','addresses.category_id')
                ->select(
                  'students.*',
                  'parents_infos.name as f_name',
                  'parents_infos.mobile as f_mobile',
                  'student_perent_details.relation_id', 
                  'addresses.p_address',
                  'addresses.c_address',
                  'addresses.state',
                  'addresses.city',
                  'addresses.p_pincode',
                  'addresses.c_pincode',
                  'religions.name as religion_id',
                  'categories.name as category_id',
                   
                  'addresses.primary_mobile',
                  'addresses.primary_email'
                )->where('students.id',$student_id)          
                 ->where('student_perent_details.relation_id',1)          
                ->first();
                 
                 
              

         } catch (Exception $e) {
            
        }
     }

     public function getStudentMotherDetail($student_id)
     {
      try {
           return $this  
                ->join('student_perent_details','student_perent_details.student_id','=','students.id')
                ->join('parents_infos','parents_infos.id','=','student_perent_details.perent_info_id')
                ->join('guardian_relation_types','guardian_relation_types.id','=','student_perent_details.relation_id')
                ->join('student_address_details','student_address_details.student_id','=','student_perent_details.student_id')
                ->join('addresses','addresses.id','=','student_address_details.student_address_details_id')
                ->select(
                  'students.*',
                  'parents_infos.name as m_name',
                  'parents_infos.mobile as m_mobile',
                  'student_perent_details.relation_id', 
                  'addresses.p_address',
                  'addresses.c_address',
                  'addresses.primary_mobile',
                  'addresses.primary_email'
                )->where('students.id',$student_id)          
                 ->where('student_perent_details.relation_id',2)          
                ->first();
                 
                 
              

         } catch (Exception $e) {
            
        }
     }
    
    public function getStudentsSearchDetilas($search)
    {
       try {

       $datas=  DB::table('students')
            ->leftJoin('student_perent_details', 'students.id', '=', 'student_perent_details.student_id') 
                    
            ->leftJoin('parents_infos','parents_infos.id','=','student_perent_details.perent_info_id')
            ->leftJoin('guardian_relation_types','guardian_relation_types.id','=','student_perent_details.relation_id')
            ->leftJoin('student_address_details','student_address_details.student_id','=','student_perent_details.student_id')
            ->leftJoin('addresses','addresses.id','=','student_address_details.student_address_details_id')
            ->select(
              'students.*',
              'addresses.primary_mobile',
              'addresses.p_address',
              'parents_infos.name as f_name' ,
              'parents_infos.mobile as f_mobile' ,
              'student_perent_details.relation_id'
            )    
            ->where('students.name', 'like','%'.$search.'%')
               ->orWhere('parents_infos.name', 'like', '%'.$search.'%') 
               ->orWhere('students.email', 'like', '%'.$search.'%') 
               ->orWhere('students.registration_no', 'like', '%'.$search.'%') 
               ->orWhere('students.dob', 'like', '%'.$search.'%')
               ->orWhere('students.admission_no', 'like', '%'.$search.'%')
               ->orWhere('parents_infos.mobile', 'like', '%'.$search.'%')
               ->orWhere('addresses.primary_mobile', 'like', '%'.$search.'%')
               ->take(10)->distinct('students.id')->get();
            return $datas;
           
       } catch (Exception $e) {
           
       }
    }
}
