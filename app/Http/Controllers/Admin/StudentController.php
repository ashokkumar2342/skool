<?php

namespace App\Http\Controllers\Admin;
 use App\Http\Controllers\Controller;
use App\Events\SmsEvent;
use App\Helper\MyFuncs;
use App\Model\Address;
use App\Model\BloodGroup;
use App\Model\Category;
use App\Model\ClassType;
use App\Model\DiscountType;
use App\Model\Document;
use App\Model\DocumentType;
use App\Model\Gender;
use App\Model\GuardianRelationType;
use App\Model\House;
use App\Model\IncomeRange;
use App\Model\Isoptional;
use App\Model\Minu;
use App\Model\ParentsInfo;
use App\Model\PaymentType;
use App\Model\Profession;
use App\Model\Religion;
use App\Model\RequestUpdate;
use App\Model\SessionDate;
use App\Model\Sms\SmsTemplate;
use App\Model\StudentAddressDetail;
use App\Model\StudentDefaultValue;
use App\Model\StudentFee;
use App\Model\StudentMedicalInfo;
use App\Model\StudentPerentDetail;
use App\Model\StudentSiblingInfo;
use App\Model\SiblingGroup;
use App\Model\StudentSubject;
use App\Model\Subject;
use App\Model\SubjectType;
use App\Model\Template\BirthdayTemplate;
use App\Student;
use Auth;
use Carbon;
use DB;
use Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use PDF;
use Storage;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$menuPermissionId)
    {
     
        $students= Student::where(['class_id'=>$request->class,'section_id'=>$request->section,'student_status_id'=>1])->get();
     $menuPermision= Minu::find($menuPermissionId); 
        $response = array(); 
        $response['data']= view('admin.student.studentdetails.list',compact('students','menuPermision'))->render();
            $response['status'] = 1;
            return $response;
    }
   
     

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $classes = MyFuncs::getClasses();   
        $sessions = array_pluck(SessionDate::get(['id','date'])->toArray(),'date', 'id');
        $genders = array_pluck(Gender::get(['id','genders'])->toArray(),'genders', 'id');
        $religions = array_pluck(Religion::get(['id','name'])->toArray(),'name', 'id');
        $categories = array_pluck(Category::get(['id','name'])->toArray(),'name', 'id');
        $default = StudentDefaultValue::find(1); 
        $houses=House::orderBy('id','ASC')->get();   
        return view('admin.student.studentdetails.add',compact('classes','sessions','default','genders','religions','categories','houses'));
    }
    public function showForm()
    {        
        $classes = MyFuncs::getClasses();    
        $sessions = array_pluck(SessionDate::get(['id','date'])->toArray(),'date', 'id');
        $genders = array_pluck(Gender::get(['id','genders'])->toArray(),'genders', 'id');
        $religions = array_pluck(Religion::get(['id','name'])->toArray(),'name', 'id');
        $categories = array_pluck(Category::get(['id','name'])->toArray(),'name', 'id');
        $default = StudentDefaultValue::find(1); 
        $menuPermission= MyFuncs::menuPermission(); 
        return view('admin.student.studentdetails.showForm',compact('classes','sessions','default','genders','religions','categories','menuPermission'));
    }

    public function  passwordReset(Student $student){
        $char = substr( str_shuffle("abcdefghijklmnopqrstuvwxyz0123456789"), 0, 6 );
        $student->password = bcrypt($char);
        $student->tmp_pass = $char;
        if($student->save()){ 
             //Event::fire('');
            return redirect()->back()->with(['class'=>'success','message'=>'student Password reset success ...']);
           
        }
        return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);
    }
     
    public function previewshow($id){
         
          $student = Student::find($id);
           $parent =new StudentPerentDetail();  

          $fatherDetail =$parent->getParent($id,1);
          $motherDetail =$parent->getParent($id,2); 
           
          $StudentAddressDetail =new StudentAddressDetail(); 
          $address =$StudentAddressDetail->getAddress($id);
           //sibling details//
          $studentSibling=SiblingGroup::where('student_id',$id)->count();
         if ($studentSibling!=0) {
           $studentSiblingId=SiblingGroup::where('student_id',$id)->first();
         $studentSiblingInfos=SiblingGroup::
                                                   where('group',$studentSiblingId->group)
                                                 ->where('student_id','!=',$id)->get();
         }else{
            $studentSiblingInfos=array();
         } 
         //end sibling detaild///

         $studentMedicalInfos = StudentMedicalInfo::where('student_id',$id)->get(); 
          $documents = Document::where('student_id',$id)->get(); 
          $studentSubjects=StudentSubject::where('student_id',$id)->get();
         return view('admin.student.studentdetails.preview',compact('student','fatherDetail','motherDetail','documents','studentMedicalInfos','studentSiblingInfos','studentSubjects','address'));
    }
    public function pdfGenerate($id){
        
          $student = Student::find($id);
          $parent =new StudentPerentDetail();           
          $fatherDetail =$parent->getParent($id,1);
          $motherDetail =$parent->getParent($id,2);

          $StudentAddressDetail =new StudentAddressDetail(); 
          $address =$StudentAddressDetail->getAddress($id);
           //sibling details//
          $studentSibling=SiblingGroup::where('student_id',$id)->count();
         if ($studentSibling!=0) {
           $studentSiblingId=SiblingGroup::where('student_id',$id)->first();
         $studentSiblingInfos=SiblingGroup::
                                                   where('group',$studentSiblingId->group)
                                                 ->where('student_id','!=',$id)->get();
         }else{
            $studentSiblingInfos=array();
         } 
         //end sibling detaild///  
          $studentMedicalInfos = StudentMedicalInfo::where('student_id',$id)->get(); 
          $documents = Document::where('student_id',$id)->get(); 
          $studentSubjects=StudentSubject::where('student_id',$id)->get(); 
      $pdf = PDF::setOptions([
            'logOutputFile' => storage_path('logs/log.htm'),
            'tempDir' => storage_path('logs/')
        ])
        ->loadView('admin.student.studentdetails.pdf_generate',compact('student','fatherDetail','motherDetail','documents','studentMedicalInfos','studentSiblingInfos','studentSubjects','address'));
      
      return $pdf->stream('student_all_report.pdf');
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
       
       $rules=[
            'class' => 'required|numeric|max:20',
            "section" => 'required|numeric|max:20',
            "registration_no" => 'required|max:20|unique:students',
            "admission_no" => 'max:20|unique:students',
            "roll_no" => 'max:20',
            "date_of_admission" => 'required|date', 
            "date_of_activation" => 'required|date',
            "student_name" => 'required|max:199',
            "nick_name" => 'max:30|nullable', 
            "date_of_birth" => 'required|max:199', 
            
            "aadhaar_no" => "required|digits:12",
            "house_name" => "required", 
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $response=array();
            $response["status"]=0;
            $response["msg"]=$errors[0];
            return response()->json($response);// response as json
        }
        else {
        $admin_id = Auth::guard('admin')->user()->id;
        $username = str_random('10');
        $char = substr( str_shuffle( "abcdefghijklmnopqrstuvwxyz0123456789" ), 0, 6 );
        $student= new Student();
        $student->username= $username;    
        $student->password = bcrypt($char);
        $student->tem_pass = $char; 
        $student->admin_id = $admin_id; 
        $student->class_id= $request->class;
        $student->section_id= $request->section;     
        $student->registration_no= $request->registration_no;     
        $student->admission_no= $request->admission_no;     
        $student->roll_no= $request->roll_no;     
        $student->adhar_no= $request->aadhaar_no;     
        $student->house_no= $request->house_name;     
        $student->date_of_admission= $request->date_of_admission == null ? $request->date_of_admission : date('Y-m-d',strtotime($request->date_of_admission));        
        $student->date_of_activation= $request->date_of_activation == null ? $request->date_of_activation : date('Y-m-d',strtotime($request->date_of_activation));
        $student->name= $request->student_name;
        $student->nick_name= $request->nick_name; 
        $student->email= $request->email;
        $student->dob= $request->date_of_birth == null ? $request->date_of_birth : date('Y-m-d',strtotime($request->date_of_birth));
        $student->gender_id= $request->gender; 
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
                  
                 $studentSubject->save();                     
                }
           
            } 
             
            $response=['status'=>1,'msg'=>'Created Successfully'];
            return response()->json($response);
          } 
        }




        return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StudentDetails  $studentDetails
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        $parentsType = array_pluck(GuardianRelationType::get(['id','name'])->toArray(),'name','id');
        $incomes = array_pluck(IncomeRange::get(['id','range'])->toArray(),'range', 'id');
        $documentTypes = array_pluck(DocumentType::get(['id','name'])->toArray(),'name', 'id');
        $subjectTypes = array_pluck(SubjectType::get(['id','name'])->toArray(),'name', 'id');
        $sessions = array_pluck(SessionDate::get(['id','date'])->toArray(),'date', 'id');
        $isoptionals = array_pluck(Isoptional::get(['id','name'])->toArray(),'name', 'id');
        $bloodgroups = array_pluck(BloodGroup::get(['id','name'])->toArray(),'name', 'id');
        $professions = array_pluck(Profession::get(['id','name'])->toArray(),'name', 'id');
        $classes = MyFuncs::getClasses(); 
        $sections = MyFuncs::getSections($student->class_id);
        $houses=House::orderBy('id','ASC')->get(); 
         
        return view('admin.student.studentdetails.view',compact('student','parentsType','incomes','documentTypes','isoptionals','sessions','subjectTypes','bloodgroups','professions','classes','sections','houses'));
    }
    public function excelData(){

        $students = Student::orderBy('center_id','session_id','class_id','section_id')->where('student_status_id',1)->get();
        foreach($students as $student){
            $data[] =['id'=>$student->username,'name'=>$student->name,'center'=>$student->centers->name,'class'=>$student->classes->name,'section'=>$student->sections->name,'date of admission'=>Carbon\Carbon::parse( $student->date_of_admission)->format('d-m-Y'),'father name'=>$student->father_name,'mother name'=>$student->mother_name,'date of birthday'=>Carbon\Carbon::parse( $student->dob)->format('d-m-Y'),'religion'=>$student->religion,'category'=>$student->category,'address'=>$student->address,'state'=>$student->state,'city'=>$student->city,'pincode'=>$student->pincode,'mobile one'=>$student->mobile_one,'mobile two'=>$student->mobile_two,'mobile sms'=>$student->mobile_sms];
        }
        Excel::create('studentlist', function($excel) use ($data) {
            $excel->sheet('sheet', function($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->export('xls');

    }
    public function image($image){
        $img = Storage::disk('student')->get('profile/'.$image);
        return response($img);
    }
     public function imageWebUpdate(Request $request,$id){
      
      $name = date('YmdHis').".jpg";
      $file = file_put_contents( $name, file_get_contents('php://input') );

      if(!$file){
          return "ERROR: Failed to write data to ".$name.", check permissions\n";
      }
      else
      {
                    
          $path = $name;
          $type = pathinfo($path, PATHINFO_EXTENSION);
          $data = file_get_contents($path);
          $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data); 
          $data = base64_decode(base64_encode($data));
        $image_name= 'profile'.date('d-m-Y').time().'.jpg';       
        $path = Storage_path() . "/app/student/profile/" . $image_name;       
        file_put_contents($path, $data); 

          $student= Student::find($id) ;
          $student->picture = $image_name;
          $student->save();
          return response()->json(['success'=>'done']);
      }  


     }

         
    public function camera(Request $request,$id){
        $student=Student::find($id); 
      return view('admin.student.studentdetails.include.webcam',compact('student'));  
        
    }
     public function imageUpdate(Request $request, Student $student){
        
        $data = $request->image; 
        list($type, $data) = explode(';', $data);
        list(, $data)      = explode(',', $data);
        $data = base64_decode($data);
        $image_name= time().'.png';       
        $path = Storage_path() . "/app/student/profile/" . $image_name;       
        file_put_contents($path, $data); 
        $student->picture = $image_name;
        $student->save();
        return response()->json(['success'=>'done']);
    
        
        // $file = $request->file('image');

        // $file->store('student/profile');
        // $student->picture = $file->hashName();
        // if($student->save()){  
        // return response()->json(['success'=>'done']);

        //     return redirect()->route('admin.student.view',$student->id)->with(['class'=>'success','message'=>'student registration success ...']);
        // }
        // return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StudentDetails  $studentDetails
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {   $houses=House::orderBy('id','ASC')->get();      
       $classes = MyFuncs::getClasses();    
       $sessions = array_pluck(SessionDate::get(['id','date'])->toArray(),'date', 'id');
       $genders = array_pluck(Gender::get(['id','genders'])->toArray(),'genders', 'id');
       $religions = array_pluck(Religion::get(['id','name'])->toArray(),'name', 'id');
       $categories = array_pluck(Category::get(['id','name'])->toArray(),'name', 'id');
       $default = StudentDefaultValue::find(1); 
          
       return view('admin.student.studentdetails.edit',compact('student','classes','sessions','default','genders','religions','categories','houses'));
    }

     public function profileedit(Student $student)
    {
         
    }

      public function totalfeeedit(Student $student)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StudentDetails  $studentDetails
     * @return \Illuminate\Http\Response
     */
    public function totalfeeupdate(Request $request, Student $student)
    {
        $this->validate($request,[
            'center' => 'required|numeric',

            'session' => 'required|numeric',
            'class' => 'required|numeric',
            "section" => 'required|numeric',           
            "student_name" => 'required|max:199',            
            
            'payment_type' => 'required|numeric'
      
        ]);
        $transport_fee = ($request->driver_id)?$request->transport_fees:0;
        $transport_fee2 = (!$request->driver_id)?$request->transport_fees:0;
        
        

        $student->center_id= $request->center;
        $student->session_id= $request->session;
        $student->class_id= $request->class;
        $student->section_id= $request->section;
        $student->totalFee= $request->total_fee-$transport_fee2;
        $student->firsttime_fee = ($request->admission_fees+$request->registration_fees+$request->annual_charges+$request->caution_money) ;
        $student->installment_fee = ($request->activity_charges+$request->smart_class_fees+$request->sms_charges+$request->tution_fees+$transport_fee);
        
        $student->admission_fee =$request->admission_fees ;
        $student->registration_fee =$request->registration_fees ;
        $student->annual_charge =$request->annual_charges ;
        $student->caution_money =$request->caution_money ;
        
        $student->activity_charge =$request->activity_charges ;
        $student->smart_class_fee =$request->smart_class_fees ;
        $student->sms_charge =$request->sms_charges;
        $student->tution_fee = $request->tution_fees;
        $student->transport_fee= $transport_fee;
        
        
        $student->name= $request->student_name;
        
        $student->discount_type_id= $request->discount_type;
        $student->payment_type_id= $request->payment_type;
       
        
        if($student->save()){ 
            return redirect()->route('admin.student.view',$student->id)->with(['class'=>'success','message'=>'student fee update success ...']);
        }
        return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);
    }

    public function update(Request $request, Student $student)
    { 
        $rules=[
            'class' => 'required|numeric|max:20',
            "section" => 'required|numeric|max:20',
            "registration_no" => 'required|max:20|unique:students',
            "admission_no" => 'max:20|unique:students',
            "roll_no" => 'max:20',
            "date_of_admission" => 'required|date', 
            "date_of_activation" => 'required|date',
            "student_name" => 'required|max:199',
            "nick_name" => 'max:30|nullable', 
            "date_of_birth" => 'required|max:199', 
            "aadhaar_no" => "required|digits:12",
            "house_name" => "required", 
          ];

         $validator = Validator::make($request->all(),$rules);
         if ($validator->fails()) {
             $errors = $validator->errors()->all();
             $response=array();
             $response["status"]=0;
             $response["msg"]=$errors[0];
             return response()->json($response);// response as json
         }
         
         
        $admin_id = Auth::guard('admin')->user()->id; 
        $student->admin_id = $admin_id;                               
        $student->session_id= 1;
        $student->class_id= $request->class;
        $student->section_id= $request->section;  
        $student->roll_no= $request->roll_no;     
        $student->adhar_no= $request->aadhaar_no;     
        $student->house_no= $request->house_name;     
        $student->date_of_admission= $request->date_of_admission == null ? $request->date_of_admission : date('Y-m-d',strtotime($request->date_of_admission));
        $student->date_of_leaving= $request->date_of_leaving == null ? $request->date_of_leaving : date('Y-m-d',strtotime($request->date_of_leaving)); 
        $student->date_of_activation= $request->date_of_activation == null ? $request->date_of_activation : date('Y-m-d',strtotime($request->date_of_activation));
        $student->name= $request->student_name;
        $student->nick_name= $request->nick_name; 
        $student->email= $request->email;
        $student->dob= $request->date_of_birth == null ? $request->date_of_birth : date('Y-m-d',strtotime($request->date_of_birth));
        $student->gender_id= $request->gender; 
         $student->save();           
           $response= array();
           $response['status']= 1;
           $response['msg']= 'Student Update Successfully';
        return $response; 
        
       
    }

    public function viewUpdate(Request $request, Student $student)
    {   
        $rules=[
             
            
             
             
            
            "date_of_admission" => 'required|date', 
            "date_of_activation" => 'required|date',
            "student_name" => 'required|max:199',
            "nick_name" => 'max:30|nullable', 
            "class" => 'required', 
            "section" => 'required', 
            "date_of_birth" => 'required|max:199', 
            "aadhaar_no" => "required|digits:12",
            "house" => "required",
             
          ];

         $validator = Validator::make($request->all(),$rules);
         if ($validator->fails()) {
             $errors = $validator->errors()->all();
             $response=array();
             $response["status"]=0;
             $response["msg"]=$errors[0];
             return response()->json($response);// response as json
         }
         
         
        $admin_id = Auth::guard('admin')->user()->id; 
        $student->admin_id = $admin_id; 
        $student->roll_no= $request->roll_no;     
        $student->class_id= $request->class;     
        $student->section_id= $request->section;     
        $student->date_of_admission= $request->date_of_admission == null ? $request->date_of_admission : date('Y-m-d',strtotime($request->date_of_admission));
        $student->date_of_leaving= $request->date_of_leaving == null ? $request->date_of_leaving : date('Y-m-d',strtotime($request->date_of_leaving)); 
        $student->date_of_activation= $request->date_of_activation == null ? $request->date_of_activation : date('Y-m-d',strtotime($request->date_of_activation));
        $student->name= $request->student_name;
       $student->nick_name= $request->nick_name; 
        $student->adhar_no= $request->aadhaar_no; 
        $student->house_no= $request->house; 
         $student->dob= $request->date_of_birth == null ? $request->date_of_birth : date('Y-m-d',strtotime($request->date_of_birth)); 
         $student->save();           
           $response= array();
           $response['status']= 1;
           $response['msg']= 'Student Update Successfully';
        return $response; 
        
       
    }

    public function profileupdate(Request $request, Student $student)
    {
        $this->validate($request,[
            'center' => 'required|numeric',

            'session' => 'required|numeric',
            'class' => 'required|numeric',
            "section" => 'required|numeric',
            "date_of_admission" => 'required|date',
            "student_name" => 'required|max:199',
            "father_name" => 'required|max:199',
            "mother_name" => 'required|max:199',
            "date_of_birth" => 'required|max:199',
            "religion" => "required|max:199",
            "category" => "required|max:199",
            "address" => 'required|max:1000',
            "state" => "required|max:199",
            "city" => "required|max:199",
            "pincode" => 'required|numeric',
            "mobile_one" => 'nullable|numeric',
            "mobile_two" => 'nullable|numeric',
            "mobile_sms" => 'required|numeric',
            
      
        ]);
       
        $student->center_id= $request->center;
        $student->session_id= $request->session;
        $student->class_id= $request->class;
        $student->section_id= $request->section;
        $student->date_of_admission= date('Y-m-d',strtotime($request->date_of_admission));
        $student->name= $request->student_name;
        $student->father_name= $request->father_name;
        $student->mother_name= $request->mother_name;
        $student->dob= date('Y-m-d',strtotime($request->date_of_birth));
        $student->religion= $request->religion;
        $student->category= $request->category;
        $student->address= $request->address;
        $student->state= $request->state;
        $student->city= $request->city;
        $student->pincode= $request->pincode;
        $student->mobile_one= $request->mobile_one;
        $student->mobile_two= $request->mobile_two;
        $student->mobile_sms= $request->mobile_sms;
     
        if($student->save()){ 
            return redirect()->route('admin.student.view',$student->id)->with(['class'=>'success','message'=>'student profile update success ...']);
        }
        return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);
    }
    public function importview() {
         
        $classes = MyFuncs::getClasses();    
        $sessions = array_pluck(SessionDate::get(['id','date'])->toArray(),'date', 'id');
        $genders = array_pluck(Gender::get(['id','genders'])->toArray(),'genders', 'id');
        $religions = array_pluck(Religion::get(['id','name'])->toArray(),'name', 'id');
        $categories = array_pluck(Category::get(['id','name'])->toArray(),'name', 'id');
        $default = StudentDefaultValue::find(1);  
        return view('admin.student.studentdetails.import',compact('classes','sessions','default','genders','religions','categories'));
    }
    public function importStudent(Request $request){
        // dd($request->all());
        // if($request->hasFile('excel_file')){
        //     $path = $request->file('excel_file')->getRealPath();
        //     $data = \Excel::load($path)->get();

        //     if($data->count()){
        //         foreach ($data as $key => $value) {
        //             $arr[] = ['name' => $value->name, 'email' => $value->email];
        //         }
        //         if(!empty($arr)){
        //             DB::table('students')->insert($arr);
        //             dd('Insert Recorded successfully.');
        //         }
        //     }
        // }
        // dd('Request data does not have any files to import.'); 

        
        $file = Input::file('excel_file');
      
        $file_name = $file->getClientOriginalName();
        $file->move('files/',$file_name);
        $results = Excel::load('files/'.$file_name,function($reader){
            $reader->all();
        })->get();

       
        foreach ($results as $key => $value) {  

             if ($value->registration_no!=null) {
                    // dd($value); 
                $admin_id = Auth::guard('admin')->user()->id;
                $username = str_random('10');
                $char = substr( str_shuffle( "abcdefghijklmnopqrstuvwxyz0123456789" ), 0, 6 );
                $student= Student::firstOrNew(['registration_no' => $value->registration_no]);
                $student->username= $username;    
                $student->password = bcrypt($char);
                $student->tem_pass = $char; 
                $student->admin_id = $admin_id;                               
                $student->session_id= 1;
                $student->class_id= $request->class;
                $student->section_id= $request->section;     
                $student->registration_no = $value->registration_no;     
                $student->admission_no= $value->admission_no;     
                $student->roll_no= $value->roll_no;     
                $student->date_of_admission= $value->date_of_admission == null ? $value->date_of_admission : date('Y-m-d',strtotime($value->date_of_admission));
                $student->date_of_leaving= $value->date_of_leaving == null ? $value->date_of_leaving : date('Y-m-d',strtotime($value->date_of_leaving)); 
                $student->date_of_activation= $value->date_of_activation == null ? $value->date_of_activation : date('Y-m-d',strtotime($value->date_of_activation));
                $student->name= $value->name;
                $student->nick_name= $value->nick_name;
                $student->father_name= $value->father_name;
                $student->mother_name= $value->mother_name; 
                $student->father_mobile= $value->father_mobile;
                $student->mother_mobile= $value->mother_mobile;
                $student->email= $value->email;
                $student->dob= $value->dob == null ? $value->dob : date('Y-m-d',strtotime($value->dob));
                $student->gender_id= $value->gender_id;
                $student->religion_id= $value->religion_id;
                $student->category_id= $value->category_id;
                $student->c_address= $value->c_address;
                $student->p_address= $value->p_address;
                $student->state= $value->state;
                $student->city= $value->city;
                $student->pincode= $value->pincode;        
                $student->save() ;          
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
                     $parentsinfo = new ParentsInfo();                
                     $parentsinfo->student_id = $student->id; 
                     $parentsinfo->relation_type_id = 1; 
                     $parentsinfo->name = $student->father_name; 
                     $parentsinfo->mobile = $student->father_mobile; 
                     $parentsinfo->save();  
                }
                if ($student->mother_name != NULL) {
                                     
                     $parentsinfo = new ParentsInfo();
                     $parentsinfo->student_id = $student->id;                
                    $parentsinfo->relation_type_id = 2;                
                     $parentsinfo->name = $student->mother_name; 
                     $parentsinfo->mobile = $student->mother_mobile; 
                     $parentsinfo->save();  
                }  
             }else {    
                    // $students= Student::where('class_id',$request->class)->where('section_id',$request->section)->where('student_status_id',1)->get();
                    // return view('admin.student.studentdetails.show',compact('students'));
     
             }

        }
         

           $response=array();
           $response['status']=1;
           $response['msg']='Excel Import Data successfully';
            return $response;
        // return redirect()->back()->with(['message'=>'Excel Import Data successfully']);

 
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StudentDetails  $studentDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {  
       
        if ($student->delete()) { 
        $response=array();
        $response['status']=1;
        $response['msg']='Delete successfully';
        return $response;
           
        }
        return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);
    }
    //
    public function feeReceipt(StudentFee $studentFee)
    {
        return view('admin.student.studentdetails.feeReceipt',compact('studentFee'));
    }

    //birthday
    Public function birthday(){
         
       $students = Student::whereMonth('dob',date('m'))
                            ->whereDay('dob',date('d'))
                            ->get();
       return view('admin.student.birthday.list',compact('students'));                     
    }

      //birthday
    Public function birthdaySearch(Request $request){
         
     $from_month =date('m',strtotime($request->from_date));
     $to_month =date('m',strtotime($request->to_date));
     $from_day =date('d',strtotime($request->from_date));
     $to_day =date('d',strtotime($request->to_date));

     $students = Student::whereMonth('dob','>=',$from_month)
                           ->whereMonth('dob','<=',$to_month)
                           ->whereDay('dob','>=',$from_day)
                           ->whereDay('dob','<=',$to_day)
                           ->get(); 
      
    $response= array();                       
    $response['status']= 1;                       
    $response['data']=view('admin.student.birthday.search_result',compact('students'))->render();
    return $response;

    }

    //birthday print one
    public function birthdayPrint($id){
        $template = BirthdayTemplate::find(1);
        $viewUrl = 'admin.student.birthday.'.$template->name;
        $students = Student::find($id);  
        $pdf = PDF::setOptions([
            'logOutputFile' => storage_path('logs/log.htm'),
            'tempDir' => storage_path('logs/')
        ])
        ->loadView($viewUrl,compact('students'));  
        return $pdf->download($students->registration_no.'_birthday_card.pdf');
    }

    //birthday print all
    public function birthdayPrintAll(Request $request){ 
     
        $this->validate($request,[ 
            'student' => 'required', 
        ]);   
        $students = Student::where('id',$request->student)->first(); 
         $customPaper = array(0,0,355.00,530.80);
        $pdf = PDF::loadView('admin.student.birthday.birthday_card', compact('students'))->setPaper($customPaper, 'landscape');; 
       
        return $pdf->stream('_birthday_card.pdf');
        
    }
    public function birthdayDashboard($value='')
    {
        $studentDOBs = Student::whereMonth('dob',date('m'))
                            ->whereDay('dob',date('d'))
                            ->get(); 
         return view('admin.student.birthday.birthday',compact('studentDOBs'));
    } 
    public function birthdayDashboardUpcoming($value='')
    {   $date = date('Y-m-d'); 
        $tommowDate = date('Y-m-d',strtotime($date ."+1 days"));   
         $nextWeek=date('Y-m-d',strtotime($tommowDate ."+7 days"));  
         $data = array();
            for ($i=1; $i <7 ; $i++) { 
               $students = Student::where('student_status_id',1)->whereMonth('dob',date('m',strtotime($date ." +1 days")))->whereDay('dob',date('d',strtotime($date .'+'.$i."days")))->get(); 
               if (!empty($students)) {
                 foreach ($students as $key => $student) {
                 $data[]= $student->id;
                }  
               }
                
            }
            $st = new Student();
            $studentDOBs=$st->getStudentsByArrId($data);
        
         
         return view('admin.student.birthday.birthday',compact('studentDOBs'));
    }
    public function birthdaySmsSend($id){
         $students = Student::find($id);
         $smsTemplate = SmsTemplate::where('id',1)->first();
        event(new SmsEvent($students->father_mobile,$smsTemplate->message)); 
        $response=['status'=>1,'msg'=>'Message Sent successfully'];
            return response()->json($response);
    }

     public function resetAdmission(Request $request)
    {
        
        $classes = MyFuncs::getClasses();  

        return view('admin.student.reset.list',compact('classes'));
    }
    // newAdmissionStudentShow
    public function resetAdmissionStudentShow(Request $request)
    {  

       $students = Student::where('admission_no',$request->admission_no) 
                                   ->where('student_status_id',1)
                                   ->get();
          
        $response= array();                       
        $response['status']= 1;                       
        $response['data']=view('admin.student.reset.student_list',compact('students'))->render();
        return $response;
         
    }
    public function resetRollNoshow(Request $request)
    {  if ($request->select_format==1) {
         $students = Student::where('class_id',$request->class) 
                                     ->where('section_id',$request->section)
                                     ->where('student_status_id',1)
                                     ->orderBy('name','asc')
                                     ->get();
        }
        if ($request->select_format==2) {
                 $students = Student::where('class_id',$request->class) 
                                             ->where('section_id',$request->section)
                                             ->where('student_status_id',1)
                                             ->orderBy('admission_no','asc')
                                             ->get();
            }
        if ($request->select_format==3) {
                 $students = Student::where('class_id',$request->class) 
                                             ->where('section_id',$request->section)
                                             ->where('student_status_id',1)
                                             ->orderBy('roll_no','asc')
                                             ->get();
            }    
       
          
        $response= array();                       
        $response['status']= 1;                       
        $response['data']=view('admin.student.reset.student_list_show',compact('students'))->render();
        return $response;
         
    }

  public function resetRollNoshowUpdate(Request $request) 
  {    

    $rules=[

      'admission_no' => 'required', 
      ];

     $validator = Validator::make($request->all(),$rules);
     if ($validator->fails()) {
         $errors = $validator->errors()->all();
         $response=array();
         $response["status"]=0;
         $response["msg"]=$errors[0];
         return response()->json($response);// response as json
     }
         
   foreach ($request->admission_no as $student_id => $admission_no) {
           
          $student=Student::find($student_id)->pluck('admission_no')->toArray();
         if (in_array($admission_no,$student)) {                   
                  $response=['status'=>0,'msg'=>'Admission No Already Teken'];
                  return response()->json($response);
              }else{

               $student =Student::find($student_id);
               $student->admission_no =$admission_no;
               $student->save();
              }  
            }  
       $response= array();                       
       $response['status']= 1; 
       $response['msg']= 'Update Adminssion No Successfully '; 

       return  $response;

  }
  // resetRoollno
  public function resetRollNoUpdate(Request $request) 
  {       
    $rules=[

      'roll_no' => 'required', 
       
      ];

     $validator = Validator::make($request->all(),$rules);
     if ($validator->fails()) {
         $errors = $validator->errors()->all();
         $response=array();
         $response["status"]=0;
         $response["msg"]=$errors[0];
         return response()->json($response);// response as json
     }

     foreach ($request->roll_no as $student_id => $roll_no) {
       $student =Student::find($student_id);
       $student->roll_no =$roll_no;
       $student->save();
      }   
   
      
       $response= array();                       
       $response['status']= 1; 
       $response['msg']= 'Update roll Number Successfully '; 

       return  $response;

  }


    public function resetRollNo(Request $request)
    {
        $students = Student::where('student_status_id',1)->get();
        $classes = MyFuncs::getClasses();  
    
        return view('admin.student.reset.resetRollNo',compact('students','classes'));
    }

    public function newAdmission(Request $request)
    {
        $students = Student::where('student_status_id',2)->get();     
    return view('admin.student.newadmission.list',compact('students'));
    }

    public function newAdmissionStatusChange($id)
    {
        $student = Student::find(Crypt::decrypt($id));     
        $student->student_status_id =1;
        $student->save();
    return redirect()->back()->with(['class'=>'success','message'=>'Final Addmission Successfully']);
    }
    public function studentRequestUpdate($value='')
    {
        $studentRequests=RequestUpdate::orderBy('id','DESC')->get();
        return view('admin.student.requestUpdation.request_list',compact('studentRequests')); 
    }
}