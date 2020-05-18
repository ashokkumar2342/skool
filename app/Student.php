<?php

namespace App;

use App\Helper\MyFuncs;
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
      //single student get all details
    public function getStudentDetailsById($id)
    {
        try {
          return $student =Student::with(['classes','academicYear','sectionTypes','genders','studentStatus','addressDetails.address.religions','addressDetails.address.categories','parents','parents.relation','parents.parentInfo'])->find($id);  
        } catch (Exception $e) {
            return $e;
        }

    }
    //All student get data
    public function getStudentAllDetails()
    {
        try {
          return $student =Student::with(['classes','academicYear','sectionTypes','genders','studentStatus','addressDetails.address.religions','addressDetails.address.categories','parents','parents.relation','parents.parentInfo'])->orderBy('class_id','ASC')->get();  
        } catch (Exception $e) {
            return $e;
        }

    }
      //multi student get data
    public function getStudentDetailsByArrId($arr_id)
    {
        try {
          $class_id =MyFuncs::getClassByHasUser()->pluck('id')->toArray(); 
          return $student =Student::whereIn('id',$arr_id)->whereIn('class_id',$class_id)->with(['classes','academicYear','sectionTypes','genders','studentStatus','addressDetails.address.religions','addressDetails.address.categories','parents','parents.relation','parents.parentInfo'])->get();  
        } catch (Exception $e) {
            return $e;
        }

    }
      // Arrya class  student get data
    public function getStudentByClassMultiselectId($class_id)
    {
        try {
          return $student =Student::whereIn('class_id',$class_id) 
                                  
                                  ->with(['classes','academicYear','sectionTypes','genders','studentStatus','addressDetails.address.religions','addressDetails.address.categories','parents','parents.relation','parents.parentInfo'])->orderBy('class_id','ASC')->get();  
        } catch (Exception $e) {
            return $e;
        }

    }
    public function getStudentByClassSection($class_id,$section_id)
    {
        try {
          return $student =Student::where('class_id',$class_id)
                                  ->where('section_id',$section_id)
                                  // ->where('student_status_id',1)
                                  ->with(['classes','academicYear','sectionTypes','genders','studentStatus','addressDetails.address.religions','addressDetails.address.categories','parents','parents.relation','parents.parentInfo'])->get();  
        } catch (Exception $e) {
            return $e;
        }

    }
    public function getStudentByClassSectionArray($class_id,$section_id)
    {
        try {
          return $student =Student::whereIn('class_id',$class_id)
                                  ->whereIn('section_id',$section_id)
                                  // ->where('student_status_id',1)
                                  ->with(['classes','academicYear','sectionTypes','genders','studentStatus','addressDetails.address.religions','addressDetails.address.categories','parents','parents.relation','parents.parentInfo'])->get();  
        } catch (Exception $e) {
            return $e;
        }

    }
    //single student get data
    public function getAllStudents()
    {
        try {
           return $this->get();
        } catch (Exception $e) {
            return $e;
        }

    }
    //all student get data
    public function getStudentsByArrId($arrId)
    {
        try {
           return $this->whereIn('id',$arrId)->get();
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
      

     
    
    public function getStudentsSearchDetilas($search)
    {
       try {
            $class_id =MyFuncs::getClassByHasUser()->pluck('id')->toArray();           
       return $student =Student::                   
                 with(['classes','academicYear','sectionTypes','genders','studentStatus','addressDetails.address.religions','addressDetails.address.categories','parents','parents.relation','parents.parentInfo'])
               ->whereIn('students.class_id',$class_id)
               ->where(function($query) use($search){
                $query->orWhere('students.name', 'like','%'.$search.'%'); 
                $query->orWhere('students.registration_no', 'like', '%'.$search.'%'); 
                $query->orWhere('students.dob', 'like', '%'.$search.'%');
                $query->orWhere('students.admission_no', 'like', '%'.$search.'%');
               }) 
               ->take(10)->get(); 
            
       } catch (Exception $e) {
           
       }
    }
    public function getStudentAllDetailsBirthday($from_month,$to_month,$from_day,$to_day)
    {
        try {
          return $student =Student::whereMonth('dob','>=',$from_month)
                           ->whereMonth('dob','<=',$to_month)
                           ->whereDay('dob','>=',$from_day)
                           ->whereDay('dob','<=',$to_day)
                           ->with(['classes','academicYear','sectionTypes','genders','studentStatus','addressDetails.address.religions','addressDetails.address.categories','parents','parents.relation','parents.parentInfo'])->get();  
        } catch (Exception $e) {
            return $e;
        }

    }
    public function getStudentAllDetailsTodayBirthday()
    {
        try {
          return $student =Student::
                             whereMonth('dob',date('m'))
                            ->whereDay('dob',date('d')) 
                            ->with(['classes','academicYear','sectionTypes','genders','studentStatus','addressDetails.address.religions','addressDetails.address.categories','parents','parents.relation','parents.parentInfo'])->get();  
        } catch (Exception $e) {
            return $e;
        }

    }

    public function getDetailByRegistrationNo($registration_no){
    try {
      $class_id =MyFuncs::getClassByHasUser()->pluck('id')->toArray(); 
    return $this->where("registration_no",$registration_no)->whereIn("class_id",$class_id)
    ->first();
    } catch (QueryException $e) {
    return $e; 
    }
    }

    
}
