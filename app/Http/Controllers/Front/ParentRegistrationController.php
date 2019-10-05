<?php

namespace App\Http\Controllers\Front;

use App\Events\SmsEvent;
use App\Helper\MyFuncs;
use App\Http\Controllers\Controller;
use App\Model\AcademicYear;
use App\Model\BloodGroup;
use App\Model\Category;
use App\Model\ClassType;
use App\Model\DocumentType;
use App\Model\Gender;
use App\Model\IncomeRange;
use App\Model\ParentRegistration;
use App\Model\Parent\RegistrationDocument;
use App\Model\Profession;
use App\Model\RegSibling;
use App\Model\Religion;
use App\Model\SessionDate;
use App\Model\StudentDefaultValue;
use App\Model\Tongue;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use PDF;
use Validator;

class ParentRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.

     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct()
    // {
    //     $this->middleware('auth')->except('firststep','login','resitrationForm');;

    // }
    
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function firststep()
    {
        return view('front.registration.firststep');
    }
    public function login()
    {        
        return view('front.registration.login');
    }

    public function resitrationForm($id=null)
    {
       $pr = ParentRegistration::find(Crypt::decrypt($id));
        $classes = MyFuncs::getAllClasses();    
        $incomeRanges = array_pluck(IncomeRange::get(['id','range'])->toArray(),'range', 'id');
        $documentTypes = array_pluck(DocumentType::get(['id','name'])->toArray(),'name', 'id');    
        $professions = array_pluck(Profession::get(['id','name'])->toArray(),'name', 'id');    
        $sessions = array_pluck(SessionDate::get(['id','date'])->toArray(),'date', 'id');
        $genders = array_pluck(Gender::get(['id','genders'])->toArray(),'genders', 'id');
        $religions = array_pluck(Religion::get(['id','name'])->toArray(),'name', 'id');
        $categories = array_pluck(Category::get(['id','name'])->toArray(),'name', 'id');
        $tongues = array_pluck(Tongue::get(['id','name'])->toArray(),'name', 'id');
        $bloodGroups = array_pluck(BloodGroup::get(['id','name'])->toArray(),'name', 'id');
        $academicYear = array_pluck(AcademicYear::get(['id','name'])->toArray(),'name', 'id');
        $default = StudentDefaultValue::find(1); 
        $registrationDocuments =RegistrationDocument::where('parent_registration_id',Auth::user()->id)->get();
           
        return view('front.registration.form',compact('classes','sessions','default','genders','religions','categories','tongues','bloodGroups','academicYear','pr','incomeRanges','professions','documentTypes','registrationDocuments'));
       
    }
    


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email|max:50|unique:users',             
            'mobile' => 'required|numeric|digits:10|unique:users',             
            'password' => 'required|min:6',
            'password_confirm' => 'required_with:password|same:password|min:6'            
            ]);
        $parent = new ParentRegistration();
        $accounts = new User(); 
        $accounts->email = $request->email;
        $accounts->email_otp = mt_rand(100000,999999);
        $accounts->mobile_otp = mt_rand(100000,999999);
        $accounts->password = bcrypt($request['password']);
        $accounts->mobile = $request->mobile;
        $accounts->registration_no = 'REG'.mt_rand(100000,999999);
        

       

       
        if ($accounts->save())
         {
            $parent->registration_no=$accounts->registration_no;
            $parent->parent_id=$accounts->id;
            $parent->save();
            
            event(new SmsEvent($accounts->mobile,$accounts->mobile_otp));
            $data = array( 'email' => $accounts->email, 'otp' => $accounts->email_otp, 'from' => 'school@iskool.com', 'from_name' => 'school' );

            Mail::send( 'mail', $data, function( $message ) use ($data)
            {
                $message->to( $data['email'] )->from( $data['from'], $data['otp'] )->subject( 'Otp Verification!' );
            });

          return redirect()->route('student.resitration.verification',Crypt::encrypt($accounts->id))->with(['message'=>'Account created Successfully.','class'=>'success']);        
        }
        else{
            return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ParentRegistration  $parentRegistration
     * @return \Illuminate\Http\Response
     */
    public function verification($id)
    {
       $parentRegistration= User::find(Crypt::decrypt($id));
         return view('front.registration.verification',compact('parentRegistration'));
    }

    public function verifyMobile(Request $request)
    {
        $this->validate($request,[
                      
            'mobile_otp' => 'required|numeric',  
            ]);
         
        $parentRegistration= User::where('mobile',$request->mobile)
                                                    ->where('mobile_otp',$request->mobile_otp)
                                                    ->first();
        if ($parentRegistration==null) {
            return redirect()->back()->with(['class'=>'error','message'=>'Mobile Otp Not Match']);      
        }else{
             $parentRegistration->mobile_verify=1;                                        
             $parentRegistration->save() ;
             if ($parentRegistration->email_verify==1 && $parentRegistration->mobile_verify==1) {
               return redirect()->route('parent.login.form')->with(['class'=>'success','message'=>'Mobile Otp Verify']);  
            }else{
             return redirect()->back()->with(['class'=>'success','message'=>'Mobile Otp Verify']);
            }

        }
                                           
             
             
        
        
        // return redirect()->back()->with(['class'=>'success','message'=>'Email Otp Verify']);
        

    }
    public function verifyEmail(Request $request)
    {

       $this->validate($request,[
                     
           'email_otp' => 'required|numeric',  
           ]);
        
       $parentRegistration= User::where('email',$request->email)
                                                   ->where('email_otp',$request->email_otp)
                                                   ->first();
       if ($parentRegistration==null) {
           return redirect()->back()->with(['class'=>'error','message'=>'Email Otp Not Match']);      
       }else{
            $parentRegistration->email_verify=1;                                        
            $parentRegistration->save() ;
            if ($parentRegistration->email_verify==1 && $parentRegistration->mobile_verify==1) {
               return redirect()->route('parent.login.form')->with(['class'=>'success','message'=>'Email Otp Verify']);  
            }else{
               return redirect()->back()->with(['class'=>'success','message'=>'Email Otp Verify']); 
            }
            

       }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ParentRegistration  $parentRegistration
     * @return \Illuminate\Http\Response
     */
    public function student(Request $request)
    { 
        $rules=[
        'first_name' => 'required',
        'mobile' => 'required|numeric|digits:10',
        'aadhaar_no' => 'required|numeric|digits:12',
        'email' => 'required|email',
        'image' => 'nullable|mimes:jpeg,jpg,png|max:100',
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $response=array();
            $response["status"]=0;
            $response["msg"]=$errors[0];
            return response()->json($response);// response as json
        }
      
        $parentRegistration = ParentRegistration::firstOrNew(['parent_id'=>Auth::user()->id]);
        $parentRegistration->parent_id=Auth::user()->id;
        $parentRegistration->aadhaar_no=$request->aadhaar_no;
        $parentRegistration->academic_year_id=$request->academic_year;
        $parentRegistration->blood_group=$request->blood_group;
        $parentRegistration->category_id=$request->category;
        $parentRegistration->class_id=$request->class;
        $parentRegistration->dob=$request->dob == null ? $request->dob : date('Y-m-d',strtotime($request->dob)); 
        $parentRegistration->email=$request->email;
        $parentRegistration->name=$request->first_name;
        $parentRegistration->gender_id=$request->gender;
        $parentRegistration->last_name=$request->last_name;
        $parentRegistration->locality=$request->locality;
        $parentRegistration->nick_name=$request->nick_name;
        $parentRegistration->religion_id=$request->religion;
        $parentRegistration->staff_ward=$request->staff_ward;
        $parentRegistration->tongue=$request->tongue;
        $parentRegistration->mobile=$request->mobile;
        if ($request->file('image')!=null) {
             $file = $request->file('image');
             $file->store('public/profile');
             $fileName = $file->hashName();
            $parentRegistration->image=$fileName;
        }
        
        $parentRegistration->status=1;
        
        $parentRegistration->save();
         $response=['status'=>1,'msg'=>'Save Success'];
        return response()->json($response); 


    }

    public function previousSchool(Request $request)
    {     
        $parentRegistration = ParentRegistration::firstOrNew(['parent_id'=>Auth::user()->id]); 
        $parentRegistration->last_school=$request->last_school;
        $parentRegistration->leaving_date=$request->leaving_date;
        $parentRegistration->reason_change_school=$request->reason_change_school; 
        $parentRegistration->status=2;
        $parentRegistration->save();
         $response=['status'=>1,'msg'=>'Save Success'];
        return response()->json($response);  
    }

     public function address(Request $request)
    {   
        $rules=[
            'c_address' => 'required|min:5|max:200',
            'p_address' => 'required|min:5|max:200',
            'pincode' => 'required|digits:6',
            'phone' => 'nullable|numeric', 
            'p_phone' => 'nullable|numeric', 
            ];
        $message = array();
        $message['c_address.min'] ='residential address minimum 5 character.';
        $message['c_address.max'] ='residential address maximum 200 character.';
        $message['c_address.required'] ='residential address required.';
        $message['p_address.min'] ='permanent address minimum 5 character.';
        $message['p_address.max'] ='permanent address maximum 200 character.';
        $message['p_address.required'] ='permanent address required.';
        $message['p_phone.numeric'] ='phone must be a number.';

        $validator = Validator::make($request->all(),$rules,$message);
            if ($validator->fails()) {
                $errors = $validator->errors()->all();
                $response=array();
                $response["status"]=0;
                $response["msg"]=$errors[0];
                return response()->json($response);// response as json
            } 
        $parentRegistration = ParentRegistration::firstOrNew(['parent_id'=>Auth::user()->id]);
        $parentRegistration->c_address=$request->c_address; 
        $parentRegistration->pincode=$request->pincode; 
        $parentRegistration->phone=$request->phone; 
        $parentRegistration->p_address=$request->p_address; 
        $parentRegistration->p_pincode=$request->p_pincode; 
        $parentRegistration->p_phone=$request->p_phone; 
        $parentRegistration->status=3;

        $parentRegistration->save();
        $response=['status'=>1,'msg'=>'Save Success'];
        return response()->json($response);  
    }

     public function father(Request $request)
    {    $rules=[
        'father_name' => 'required',
        'father_mobile' => 'required|numeric|digits:10',
        'f_phone_no' => 'nullable|numeric',
        'f_pin_code' => 'nullable|numeric|digits:6', 
        'f_email' => 'required|email',
        'father_image' => 'nullable|mimes:jpeg,jpg,png|max:100', 
        ];

        $message = array();
        $message['f_phone_no.numeric'] ='father phone must be number .';
        $message['f_pin_code.numeric'] ='father pin code must be number .';
        $message['f_pin_code.digits'] ='father pin code must be 6 digits .';
        $message['f_email.email'] ='The father email must be a valid email address .';
        $message['f_email.required'] ='The father email field is required .';
       

        $validator = Validator::make($request->all(),$rules,$message);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $response=array();
            $response["status"]=0;
            $response["msg"]=$errors[0];
            return response()->json($response);// response as json
        }   
        $parentRegistration = ParentRegistration::firstOrNew(['parent_id'=>Auth::user()->id]); 
        $parentRegistration->f_title=$request->f_title;
        $parentRegistration->father_name=$request->father_name;
        $parentRegistration->f_qualification=$request->f_qualification;
        $parentRegistration->f_occupation=$request->f_occupation;
        $parentRegistration->f_designation=$request->f_designation;
        $parentRegistration->f_college=$request->f_college;
        $parentRegistration->f_residence_telephone=$request->f_residence_telephone;
        $parentRegistration->f_office_telephone=$request->f_office_telephone;
        $parentRegistration->f_annual_income=$request->f_annual_income;
        $parentRegistration->f_organization=$request->f_organization;
        $parentRegistration->f_organization_address=$request->f_organization_address;
        $parentRegistration->f_pin_code=$request->f_pin_code;
        $parentRegistration->f_phone_no=$request->f_phone_no;
        $parentRegistration->f_email=$request->f_email;
        $parentRegistration->father_mobile=$request->father_mobile;
        $parentRegistration->f_fax=$request->f_fax;
        $parentRegistration->status=4;
        if ($request->file('father_image')!=null) {
             $file = $request->file('father_image');
             $file->store('public/profile');
             $fileName = $file->hashName();
            $parentRegistration->father_image=$fileName;
        }
          if ($request->file('f_signature')!=null) {
             $file = $request->file('f_signature');
             $file->store('public/profile');
             $fileName = $file->hashName();
            $parentRegistration->f_signature=$fileName;
        }
        $parentRegistration->save();
        $response=['status'=>1,'msg'=>'Save Success'];
        return response()->json($response);  
    }

     public function mother(Request $request)
    {   
    $rules=[
           'mother_name' => 'required',
           'mother_mobile' => 'required|numeric|digits:10',
            
           'm_email' => 'required|email',
           'mother_image' => 'nullable|mimes:jpeg,jpg,png|max:100',
            
           'm_pin_code' => 'nullable|numeric|digits:6',
           ];

           $message = array();
          
           $message['m_pin_code.numeric'] ='mother pin code must be number .';
           $message['m_pin_code.digits'] ='mother pin code must be 6 digits .';
           $message['m_email.email'] ='The mother email must be a valid email address .';
           $message['m_email.required'] ='The mother email field is required .';

           $validator = Validator::make($request->all(),$rules,$message);
           if ($validator->fails()) {
               $errors = $validator->errors()->all();
               $response=array();
               $response["status"]=0;
               $response["msg"]=$errors[0];
               return response()->json($response);// response as json
           }       
        $parentRegistration = ParentRegistration::firstOrNew(['parent_id'=>Auth::user()->id]); 
        $parentRegistration->m_title=$request->m_title;
        $parentRegistration->mother_name=$request->mother_name;
        $parentRegistration->m_qualification=$request->m_qualification;
        $parentRegistration->m_occupation=$request->m_occupation;
        $parentRegistration->m_designation=$request->m_designation;
        $parentRegistration->m_college=$request->m_college;
        $parentRegistration->m_residence_telephone=$request->m_residence_telephone;
        $parentRegistration->m_office_telephone=$request->m_office_telephone;
        $parentRegistration->m_annual_income=$request->m_annual_income;
        $parentRegistration->m_organization=$request->m_organization;
        $parentRegistration->m_organization_address=$request->m_organization_address;
        $parentRegistration->m_pin_code=$request->m_pin_code;
        $parentRegistration->m_phone_no=$request->m_phone_no;
        $parentRegistration->m_email=$request->m_email;
        $parentRegistration->mother_mobile=$request->mother_mobile;
        $parentRegistration->m_fax=$request->m_fax;
        $parentRegistration->status=5;
          if ($request->file('mother_image')!=null) {
             $file = $request->file('mother_image');
             $file->store('public/profile');
             $fileName = $file->hashName();
            $parentRegistration->mother_image=$fileName;
        }
          if ($request->file('m_signature')!=null) {
             $file = $request->file('m_signature');
             $file->store('public/profile');
             $fileName = $file->hashName();
            $parentRegistration->m_signature=$fileName;
        }
        $parentRegistration->save();
        $response=['status'=>1,'msg'=>'Save Success'];
        return response()->json($response);  
    }

     public function guardian(Request $request)
    {    
    $rules=[
            'guardian_name' => 'required',
            'guardian_mobile' => 'required|numeric|digits:10',
             
            'g_email' => 'required|email',
            'guardian_image' => 'nullable|mimes:jpeg,jpg,png|max:100',
            'g_phone_no' => 'nullable|numeric|digits:10',
            'g_pin_code' => 'nullable|numeric|digits:6',
            ];
        $message = array();
        $message['g_phone_no.numeric'] ='guardian phone must be number .';
        $message['g_pin_code.numeric'] ='guardian pin code must be number .';
        $message['g_pin_code.digits'] ='guardian pin code must be 6 digits .';
        $message['g_email.email'] ='The guardian email must be a valid email address .';
        $message['g_email.required'] ='The guardian email field is required .';
            $validator = Validator::make($request->all(),$rules,$message);
            if ($validator->fails()) {
                $errors = $validator->errors()->all();
                $response=array();
                $response["status"]=0;
                $response["msg"]=$errors[0];
                return response()->json($response);// response as json
            }      
        $parentRegistration = ParentRegistration::firstOrNew(['parent_id'=>Auth::user()->id]); 
        $parentRegistration->g_title=$request->g_title;
        $parentRegistration->guardian_name=$request->guardian_name;
        $parentRegistration->g_qualification=$request->g_qualification;
        $parentRegistration->g_occupation=$request->g_occupation;
        $parentRegistration->g_designation=$request->g_designation;
        $parentRegistration->g_college=$request->g_college;
        $parentRegistration->g_residence_telephone=$request->g_residence_telephone;
        $parentRegistration->g_office_telephone=$request->g_office_telephone;
        $parentRegistration->g_annual_income=$request->g_annual_income;
        $parentRegistration->g_organization=$request->g_organization;
        $parentRegistration->g_organization_address=$request->g_organization_address;
        $parentRegistration->g_pin_code=$request->g_pin_code;
        $parentRegistration->g_phone_no=$request->g_phone_no;
        $parentRegistration->g_email=$request->g_email;
        $parentRegistration->guardian_mobile=$request->guardian_mobile;
        $parentRegistration->g_fax=$request->g_fax;
        $parentRegistration->g_relation=$request->g_relation;
        $parentRegistration->status=6;
          if ($request->file('guardian_image')!=null) {
             $file = $request->file('guardian_image');
             $file->store('public/profile');
             $fileName = $file->hashName();
            $parentRegistration->guardian_image=$fileName;
        }
          if ($request->file('g_signature')!=null) {
             $file = $request->file('g_signature');
             $file->store('public/profile');
             $fileName = $file->hashName();
            $parentRegistration->g_signature=$fileName;
        }
        $parentRegistration->save();
        $response=['status'=>1,'msg'=>'Save Success'];
        return response()->json($response);  
    }
 

     public function sibling(Request $request)
    {    
       $rules=[
       'admission_no' => 'required',
       'name' => 'required|string',
       'class' => 'required',
       'school_name' => 'required|string', 
       ];

       $validator = Validator::make($request->all(),$rules);
       if ($validator->fails()) {
           $errors = $validator->errors()->all();
           $response=array();
           $response["status"]=0;
           $response["msg"]=$errors[0];
           return response()->json($response);// response as json
       }
       
       $parentRegistration = ParentRegistration::firstOrNew(['parent_id'=>Auth::user()->id]); 
      
       $parentRegistration->status=7; 
       $parentRegistration->save();
         $regSibling = new RegSibling(); 
       $regSibling->parent_registration_id=$parentRegistration->id;
       $regSibling->admission_no=$request->admission_no;
       $regSibling->name=$request->name; 
       $regSibling->class=$request->class;
       $regSibling->school_name=$request->school_name;
       $regSibling->save();
        $response=['status'=>1,'msg'=>'Save Success'];
       return response()->json($response);   
    }

     public function career(Request $request)
    {    
   

       $parentRegistration = ParentRegistration::firstOrNew(['parent_id'=>Auth::user()->id]); 
     
       $parentRegistration->sport=$request->sport;
       $parentRegistration->is_medical=$request->is_medical;
       $parentRegistration->medical_history=$request->medical_history;
       $parentRegistration->is_evidence_learning=$request->is_evidence_learning;
       $parentRegistration->is_scholarship=$request->is_scholarship;
       $parentRegistration->scholarship=$request->scholarship;
       if ($request->co_curricular !=null) {
            $parentRegistration->co_curricular=implode(',', $request->co_curricular);
       }  
       if ($request->music !=null) {
            $parentRegistration->music=implode(',', $request->music);
       }
      
      
       $parentRegistration->status=8; 
       
       $parentRegistration->save();
          
        $response=['status'=>1,'msg'=>'Save Success'];
       return response()->json($response);   
   }

     public function other(Request $request)
    {        
        

         
        
        $parentRegistration = ParentRegistration::firstOrNew(['parent_id'=>Auth::user()->id]); 
        
        $parentRegistration->passport_no=$request->passport_no; 
        $parentRegistration->date_of_issued_passport=$request->date_of_issued_passport == null ? $request->date_of_issued_passport : date('Y-m-d',strtotime($request->date_of_issued_passport));  
       
        $parentRegistration->passport_issue_place=$request->passport_issue_place; 
        $parentRegistration->passport_expiry_date=$request->passport_expiry_date == null ? $request->passport_expiry_date : date('Y-m-d',strtotime($request->passport_expiry_date));    
        $parentRegistration->school_bus=$request->school_bus; 
        $parentRegistration->status=9; 
       
        $parentRegistration->save();         
         $response=['status'=>1,'msg'=>'Save Success'];
        return response()->json($response);    
    }

    public function document(Request $request)
    {   $rules=[
            
            
            'document_type' => 'required',
            'file' => 'required|mimes:pdf|max:200',
           
            ];

            $validator = Validator::make($request->all(),$rules);
            if ($validator->fails()) {
                $errors = $validator->errors()->all();
                $response=array();
                $response["status"]=0;
                $response["msg"]=$errors[0];
                return response()->json($response);// response as json
            }        
        $parentRegistration = ParentRegistration::firstOrNew(['parent_id'=>Auth::user()->id]);
        $registrationDocument = new RegistrationDocument(); 
        $registrationDocument->parent_registration_id =Auth::user()->id;
        $registrationDocument->document_type_id =$request->document_type;
        $file = $request->file('file');
        $file->store('public/document');
        $fileName = $file->hashName(); 
        $registrationDocument->name =$fileName;
        $registrationDocument->save();
         
        $parentRegistration->status=10; 
        $parentRegistration->save(); 
        $response=['status'=>1,'msg'=>'Upload Successfully'];
        return response()->json($response);     
    }
     public function declaration(Request $request)
    {        
        $parentRegistration = ParentRegistration::firstOrNew(['parent_id'=>Auth::user()->id]); 
        
        $parentRegistration->status=11; 
        $parentRegistration->save();
       
         return redirect()->back()->with(['class'=>'success','message'=>'Final Submit Successfully']);    
    }
    //preview
    public function preview($id)
    {
         $pr = ParentRegistration::find(Crypt::decrypt($id));
        $classes = MyFuncs::getClasses();    
        $sessions = array_pluck(SessionDate::get(['id','date'])->toArray(),'date', 'id');
        $genders = array_pluck(Gender::get(['id','genders'])->toArray(),'genders', 'id');
        $religions = array_pluck(Religion::get(['id','name'])->toArray(),'name', 'id');
        $categories = array_pluck(Category::get(['id','name'])->toArray(),'name', 'id');
        $tongues = array_pluck(Tongue::get(['id','name'])->toArray(),'name', 'id');
        $bloodGroups = array_pluck(BloodGroup::get(['id','name'])->toArray(),'name', 'id');
        $academicYear = array_pluck(AcademicYear::get(['id','name'])->toArray(),'name', 'id');
        $default = StudentDefaultValue::find(1); 
      
      
        return  view('front.registration.include.preview',compact('classes','sessions','default','genders','religions','categories','tongues','bloodGroups','academicYear','pr'))->render();
    }

    public function previewDownload($id){
        $pr = ParentRegistration::find(Crypt::decrypt($id));
            PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        $pdf = PDF::setOptions([
            'logOutputFile' => storage_path('logs/log.htm'),
            'tempDir' => storage_path('logs/')
        ])
        ->loadView('front.registration.include.previewDownload',compact('classes','sessions','default','genders','religions','categories','tongues','bloodGroups','academicYear','pr')); 
        
        return $pdf->download('download_registration_form.pdf');
    }

   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ParentRegistration  $parentRegistration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ParentRegistration $parentRegistration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ParentRegistration  $parentRegistration
     * @return \Illuminate\Http\Response
     */
    public function destroy(ParentRegistration $parentRegistration)
    {
        //
    }
}
