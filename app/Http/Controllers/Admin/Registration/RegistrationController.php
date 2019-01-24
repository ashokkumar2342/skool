<?php

namespace App\Http\Controllers\Admin\Registration;
 

use App\Events\SmsEvent;
use App\Helper\MyFuncs;
use App\Http\Controllers\Controller;
use App\Model\AcademicYear;
use App\Model\BloodGroup;
use App\Model\Category;
use App\Model\ClassType;
use App\Model\Document;
use App\Model\Gender;
use App\Model\ParentRegistration;
use App\Model\Parent\RegistrationDocument;
use App\Model\ParentsInfo;
use App\Model\RegSibling;
use App\Model\Religion;
use App\Model\SessionDate;
use App\Model\StudentDefaultValue;
use App\Model\StudentSubject;
use App\Model\Subject;
use App\Model\Tongue;
use App\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Validator;

class RegistrationController extends Controller
{
    
    
    public function index()
    {    
        $classes = array_pluck(ClassType::get(['id','alias'])->toArray(),'alias', 'id');    
        $sessions = array_pluck(SessionDate::get(['id','date'])->toArray(),'date', 'id');
        $genders = array_pluck(Gender::get(['id','genders'])->toArray(),'genders', 'id');
        $religions = array_pluck(Religion::get(['id','name'])->toArray(),'name', 'id');
        $categories = array_pluck(Category::get(['id','name'])->toArray(),'name', 'id');
        $bloodgroups = array_pluck(BloodGroup::get(['id','name'])->toArray(),'name', 'id');
         $acardemicYear = array_pluck(AcademicYear::get(['id','name'])->toArray(), 'name', 'id');
         $registrationForm = array_pluck(AcademicYear::get(['id','name'])->toArray(), 'name', 'id');
        $parents =ParentRegistration::latest()->get();
        $parentsApproveds=ParentRegistration::all(); 
        $parentsPendings=ParentRegistration::all(); 
        $parentsRejects=ParentRegistration::all(); 
        return view('admin.registration.formList',compact('parents','classes','sessions','default','genders','religions','categories','bloodgroups','acardemicYear','registrationform','parentsApproveds','parentsPendings','parentsRejects'));
    }  

    public function remarkAdd(Request $request)
    {   
        $registrationForm = ParentRegistration::find($request->parent_id);
        $registrationForm->remarks=$request->remark;
        $registrationForm->save();
        return response()->json(['class'=>'success','message'=>'Add Remark Successfully']);

    }

      public function remarkShow(Request $request)
    {

        $registrationForm = ParentRegistration::where('id',$request->id)->get(['remarks']);
        
        return response()->json($registrationForm);

    }
   

    public function statusCancel($id)
    {

        $registrationForm = ParentRegistration::find($id);
         $registrationForm->active_status=2;
         $registrationForm->save();
         $response =array();
         $response['status'] = 1;
         $response['msg'] = 'Status Changed';
        return $response;
        
        

    }

    public function statusReject($id)
    {

        $registrationForm = ParentRegistration::find($id);
         $registrationForm->active_status=3;
         $registrationForm->save();
        $response =array();
        $data['status'] = 1;
         $data['msg'] = 'Status Changed';
        return $data;

    }

    public function statusApproved($id)
    {

        $registrationForm = ParentRegistration::find($id);
         $registrationForm->active_status=1;
         $registrationForm->save();
        $response =array();
         $response['status'] = 1;
         $response['msg'] = 'Status Changed';
        return $response;

    }

    public function report(Request $request){
       
        if ($request->report_for == 1) {
           $results = ParentRegistration::where('academic_year_id',$request->academic_year_id)
                    ->where('class_id',$request->class)
                    ->get();
           return  $this->responseResult($results);
        }
             
        elseif ($request->report_for == 2 ){       
            $results = ParentRegistration::where('academic_year_id',$request->academic_year_id)->where('category_id',$request->category)->get();
                   return  $this->responseResult($results);
        }
         
        elseif ($request->report_for == 3){   
            $results = ParentRegistration::where('academic_year_id',$request->academic_year_id)->where('religion_id',$request->religion)->get();
                   return  $this->responseResult($results);
        }
        
        elseif ($request->report_for == 4){       
            $results = ParentRegistration::where('academic_year_id',$request->academic_year_id)->where('gender_id',$request->gender)->get();
                   return  $this->responseResult($results);
        }
        elseif ($request->report_for == 5){ 
            $results = ParentRegistration::where('academic_year_id',$request->academic_year_id)->where('f_annual_income',$request->incomeSlab)->get();
                   return  $this->responseResult($results);
             
        } elseif ($request->report_for == 6 ){ 
            $results = ParentRegistration::where('academic_year_id',$request->academic_year_id)->where('f_occupation',$request->profession)->get();
           return  $this->responseResult($results);
             
        } elseif ($request->report_for == 7){ 
           $results = ParentRegistration::where('academic_year_id',$request->academic_year_id)->get();
                    return  $this->responseResult($results);
             
        }

         else{
            return redirect()->route('admin.student.report');
         }
    }

    public function responseResult($parents){
        $response =array();
            $response['data']= view('admin.registration.result',compact('parents'))->render();
            $response['status'] = 1;
            return $response;
    }
    //allowadmission
    public function allowadmission($id)
    {  
      $parentsAllow=ParentRegistration::find($id);
      $classes = MyFuncs::getClasses();  
      return view('admin.registration.allowadmission',compact('parentsAllow','classes'));
    }
     //approved show
    public function approvedShow(Request $request)
    {  
      $parentsApproveds=ParentRegistration::where('active_status',1)->get(); 
      return view('admin.registration.approved',compact('parentsApproveds'))->render();
    }
    //copy data registration table to student table
    public function copyRegistrationData(Request $request,$registration_no)
    { 
    try {
      $rules=[

        'registration_no' => 'nullable|max:20|unique:students', 
        ];

       $validator = Validator::make($request->all(),$rules);
       if ($validator->fails()) {
           $errors = $validator->errors()->all();
           $response=array();
           $response["status"]=0;
           $response["msg"]=$errors[0];
           return response()->json($response);// response as json
       }
       $parent=ParentRegistration::where('registration_no',$registration_no)->first(); 
        $student=new Student(); 
        $admin_id = Auth::guard('admin')->user()->id;
        $username = str_random('10');
        $char = substr( str_shuffle( "abcdefghijklmnopqrstuvwxyz0123456789" ), 0, 6 );
        $student->name =$parent->name;
        $student->nick_name =$parent->nick_name;
        $student->admin_id =$admin_id;
        $student->registration_no =$parent->registration_no;
        $student->admission_no =$request->admission_no; 
        $student->session_id =$parent->academic_year_id;
        $student->class_id =$request->class_id;
        $student->section_id =$request->section;
        $student->date_of_admission =date('Y-m-d');  
        $student->email =$parent->email;
        $student->username =$username;
        $student->password =bcrypt($char);
        $student->tem_pass = $char;  
        $student->father_name =$parent->father_name;
        $student->mother_name =$parent->mother_name;
        $student->dob =$parent->dob;
        $student->gender_id =$parent->gender_id;
        $student->religion_id =$parent->religion_id;
        $student->category_id =$parent->category_id;
        $student->p_address =$parent->p_address;
        $student->c_address =$parent->c_address;
        $student->state =$parent->state;
        $student->city =$parent->city;
        $student->pincode =$parent->pincode;
        $student->father_mobile =$parent->father_mobile;
        $student->mother_mobile =$parent->mother_mobile;
        $student->student_status_id =1;
        $student->picture =$parent->picture;  
        $student->status =1;
        $student->student_status_id =2;
        if($student->save()){            
            $student->username= 'ISKOOL10'.$student->id;
            $student->save();

            $subjects = Subject::where('classType_id',$student->class_id)->get();
            if ($subjects != NULL) {
                foreach ($subjects as $subject){                 
                 $studentSubject = StudentSubject::firstOrNew(['subject_type_id' => $subject->subject_type_id, 'student_id' => $student->id]);
                 $studentSubject->subject_type_id = $subject->subjectType_id;
                 $studentSubject->student_id = $student->id;
                 $studentSubject->isoptional_id = $subject->isoptional_id;
                 $studentSubject->session_id = $student->session_id; 
                 $studentSubject->save();                     
                }
           
            } 
            if ($student->father_name != NULL) {                                 
                 $father = new ParentsInfo();                
                 $father->student_id = $student->id; 
                 $father->relation_type_id = 1; 
                 $father->name = $parent->father_name; 
                 $father->mobile = $parent->father_mobile; 
                 $father->education = $parent->f_qualification; 
                 $father->occupation = $parent->f_occupation; 
                 $father->income_id = $parent->f_annual_income; 
                 $father->email = $parent->f_email; 
                 $father->office_address = $parent->f_organization_address; 
                 $father->photo = $parent->f_phone_no; 
                 $father->islive = 1; 
                 $father->save();  
            }
            if ($student->mother_name != NULL) {
                                 
                 $mother = new ParentsInfo();
                 $mother->student_id = $student->id;                
                $mother->relation_type_id = 2;                
                 $mother->name = $parent->mother_name; 
                 $mother->mobile = $parent->mother_mobile;
                   $mother->education = $parent->m_qualification; 
                 $mother->occupation = $parent->m_occupation; 
                 $mother->income_id = $parent->m_annual_income; 
                 $mother->email = $parent->m_email; 
                 $mother->office_address = $parent->m_organization_address; 
                 $mother->photo = $parent->m_phone_no;  
                 $mother->save();  
            } 
             
                                 
             $guardian = new ParentsInfo();
             $guardian->student_id = $student->id;                
            $guardian->relation_type_id = 3;                
             $guardian->name = $parent->guardian_name; 
             $guardian->mobile = $parent->guardian_name;
               $guardian->education = $parent->g_qualification; 
             $guardian->occupation = $parent->g_occupation; 
             $guardian->income_id = $parent->g_annual_income; 
             $guardian->email = $parent->g_email; 
             $guardian->office_address = $parent->g_organization_address; 
             $guardian->photo = $parent->g_phone_no;  
             $guardian->save();
              
              $registrationDocuments = RegistrationDocument::where('parent_registration_id',$parent->parent_id)->get();
              foreach ($registrationDocuments as $registrationDocument) {
                $document = new Document();
                $document->name = $registrationDocument->name;   
                $document->document_type_id = $registrationDocument->document_type_id; 
                $document->student_id = $student->id;    
                $document->save();
              }
                  
             
              $parent->active_status=4;
              $parent->save();
        }
        
         $response['status'] = 1;
         $response['msg'] = 'Admission Successfully';
         return $response;
     
        
      } catch(Exception $e) { 
        Log::error('registration page: '.$e->getMessage());
        return false;
      }  
    
   }
     
}
