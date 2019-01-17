<?php

namespace App\Http\Controllers\Admin;
 use App\Http\Controllers\Controller;
use App\Helper\MyFuncs;
use App\Model\BloodGroup;
use App\Model\Category;
use App\Model\ClassType;
use App\Model\DiscountType;
use App\Model\DocumentType;
use App\Model\Gender;
use App\Model\GuardianRelationType;
use App\Model\IncomeRange;
use App\Model\Isoptional;
use App\Model\ParentsInfo;
use App\Model\PaymentType;
use App\Model\Religion;
use App\Model\SessionDate;
use App\Model\StudentDefaultValue;
use App\Model\StudentFee;
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
use Illuminate\Support\Facades\Input;
use PDF;
use Storage;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $students= Student::where(['class_id'=>$request->class,'section_id'=>$request->section])->get();
        
        return view('admin.student.studentdetails.list',compact('students'));
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
           
        return view('admin.student.studentdetails.add',compact('classes','sessions','default','genders','religions','categories'));
    }
    public function showForm()
    {        
        $classes = array_pluck(ClassType::get(['id','alias'])->toArray(),'alias', 'id');    
        $sessions = array_pluck(SessionDate::get(['id','date'])->toArray(),'date', 'id');
        $genders = array_pluck(Gender::get(['id','genders'])->toArray(),'genders', 'id');
        $religions = array_pluck(Religion::get(['id','name'])->toArray(),'name', 'id');
        $categories = array_pluck(Category::get(['id','name'])->toArray(),'name', 'id');
        $default = StudentDefaultValue::find(1); 
           
        return view('admin.student.studentdetails.showForm',compact('classes','sessions','default','genders','religions','categories'));
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
     
    

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
       // dd($request->all());
        $this->validate($request,[ 
            'class' => 'required|numeric|max:20',
            "section" => 'required|numeric|max:20',
            "registration_no" => 'required|max:20|unique:students',
            "admission_no" => 'max:20|unique:students',
            "roll_no" => 'max:20|unique:students',
            "date_of_admission" => 'required|date',
            "date_of_leaving" => 'date|nullable',
            "date_of_activation" => 'required|date',
            "student_name" => 'required|max:199',
            "nick_name" => 'max:30|nullable',
            "father_name" => 'required|max:30',
            "mother_name" => 'required|max:30',
            "father_mobile" => 'required|digits:10',
            "mother_mobile" => 'required|digits:10',
            "date_of_birth" => 'required|max:199',
            "religion" => "required|max:30",
            "category" => "required|max:30",
            "c_address" => 'required|max:1000',
            "p_address" => 'required|max:1000',
            "state" => "required|max:30",
            "email" => "required|max:50|email",
            "city" => "required|max:30",
            "pincode" => 'required|numeric|digits:6',
                      
      
        ]);   
         
        $admin_id = Auth::guard('admin')->user()->id;
        $username = str_random('10');
        $char = substr( str_shuffle( "abcdefghijklmnopqrstuvwxyz0123456789" ), 0, 6 );
        $student= new Student();
        $student->username= $username;    
        $student->password = bcrypt($char);
        $student->tem_pass = $char; 
        $student->admin_id = $admin_id;                               
        $student->session_id= 1;
        $student->class_id= $request->class;
        $student->section_id= $request->section;     
        $student->registration_no= $request->registration_no;     
        $student->admission_no= $request->admission_no;     
        $student->roll_no= $request->roll_no;     
        $student->date_of_admission= $request->date_of_admission == null ? $request->date_of_admission : date('Y-m-d',strtotime($request->date_of_admission));
        $student->date_of_leaving= $request->date_of_leaving == null ? $request->date_of_leaving : date('Y-m-d',strtotime($request->date_of_leaving)); 
        $student->date_of_activation= $request->date_of_activation == null ? $request->date_of_activation : date('Y-m-d',strtotime($request->date_of_activation));
        $student->name= $request->student_name;
        $student->nick_name= $request->nick_name;
        $student->father_name= $request->father_name;
        $student->mother_name= $request->mother_name; 
        $student->father_mobile= $request->father_mobile;
        $student->mother_mobile= $request->mother_mobile;
        $student->email= $request->email;
        $student->dob= $request->date_of_birth == null ? $request->date_of_birth : date('Y-m-d',strtotime($request->date_of_birth));
        $student->gender_id= $request->gender;
        $student->religion_id= $request->religion;
        $student->category_id= $request->category;
        $student->c_address= $request->c_address;
        $student->p_address= $request->p_address;
        $student->state= $request->state;
        $student->city= $request->city;
        $student->pincode= $request->pincode;        
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
            return redirect()->route('admin.student.view',$student->id)->with(['class'=>'success','message'=>'Student Registration Success ...']);
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

         
        return view('admin.student.studentdetails.view',compact('student','parentsType','incomes','documentTypes','isoptionals','sessions','subjectTypes','bloodgroups'));
    }
    public function excelData(){

        $students = Student::orderBy('center_id','session_id','class_id','section_id')->get();
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
     public function imageWebUpdate(Request $request, Student $student){
      return 'done';
      return dd($request->all());

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
    {       
       $classes = array_pluck(ClassType::get(['id','alias'])->toArray(),'alias', 'id');    
       $sessions = array_pluck(SessionDate::get(['id','date'])->toArray(),'date', 'id');
       $genders = array_pluck(Gender::get(['id','genders'])->toArray(),'genders', 'id');
       $religions = array_pluck(Religion::get(['id','name'])->toArray(),'name', 'id');
       $categories = array_pluck(Category::get(['id','name'])->toArray(),'name', 'id');
       $default = StudentDefaultValue::find(1); 
          
       return view('admin.student.studentdetails.edit',compact('student','classes','sessions','default','genders','religions','categories'));
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
        
        $this->validate($request,[ 
            'class' => 'required|numeric',
            "section" => 'required|numeric',
            "registration_no" => 'required|max:199',
            "admission_no" => 'max:199',
            "roll_no" => 'max:199',
            "date_of_admission" => 'required|date',
            // "date_of_leaving" => 'required|date',
            // "date_of_activation" => 'required|date',
            "student_name" => 'required|max:199',
            // "nick_name" => 'required|max:199',
            "father_name" => 'required|max:199',
            "mother_name" => 'required|max:199',
            "father_mobile" => 'required|numeric',
            "mother_mobile" => 'required|numeric',
            "date_of_birth" => 'required|max:199',
            "religion" => "required|max:199",
            "category" => "required|max:199",
            "c_address" => 'required|max:1000',
            "p_address" => 'required|max:1000',
            "state" => "required|max:199",
            "email" => "required|max:199|email",
            "city" => "required|max:199",
            "pincode" => 'required|numeric',
                      
      
        ]);   
         
        $admin_id = Auth::guard('admin')->user()->id; 
        $student->admin_id = $admin_id;                               
        $student->session_id= 1;
        $student->class_id= $request->class;
        $student->section_id= $request->section;     
        $student->registration_no= $request->registration_no;     
        $student->admission_no= $request->admission_no;     
        $student->roll_no= $request->roll_no;     
        $student->date_of_admission= $request->date_of_admission == null ? $request->date_of_admission : date('Y-m-d',strtotime($request->date_of_admission));
        $student->date_of_leaving= $request->date_of_leaving == null ? $request->date_of_leaving : date('Y-m-d',strtotime($request->date_of_leaving)); 
        $student->date_of_activation= $request->date_of_activation == null ? $request->date_of_activation : date('Y-m-d',strtotime($request->date_of_activation));
        $student->name= $request->student_name;
        $student->nick_name= $request->nick_name;
        $student->father_name= $request->father_name;
        $student->mother_name= $request->mother_name; 
        $student->father_mobile= $request->father_mobile;
        $student->mother_mobile= $request->mother_mobile;
        $student->email= $request->email;
        $student->dob= $request->date_of_birth == null ? $request->date_of_birth : date('Y-m-d',strtotime($request->date_of_birth));
        $student->gender_id= $request->gender;
        $student->religion_id= $request->religion;
        $student->category_id= $request->category;
        $student->c_address= $request->c_address;
        $student->p_address= $request->p_address;
        $student->state= $request->state;
        $student->city= $request->city;
        $student->pincode= $request->pincode;        
        if($student->save()){            
           
         
            return redirect()->route('admin.student.view',$student->id)->with(['class'=>'success','message'=>'student update success ...']);
        }
        return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);
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
         
        $classes = array_pluck(ClassType::get(['id','alias'])->toArray(),'alias', 'id');    
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
                    $students= Student::where('class_id',$request->class)->where('section_id',$request->section)->get();
                    return view('admin.student.studentdetails.show',compact('students'));
     
             }
        }
         

        return 'data null';  
        
        // return redirect()->route('admin.student.studentdetails.list')->with(['message'=>'success']);

 
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
            
         return redirect()->back()->with(['class'=>'success','message'=>'student delete success ...']);
           
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
        $student = Student::find($id);  
        $pdf = PDF::loadView($viewUrl,compact('student'));  
        return $pdf->download($student->registration_no.'_birthday_card.pdf');
    }

    //birthday print all
    public function birthdayPrintAll(Request $request){ 
     
        $this->validate($request,[ 
            'student' => 'required', 
        ]);   
        $students = Student::find($request->student); 
        $pdf = PDF::loadView('admin.student.birthday.birthday_card_all', compact('students')); 
       
        return $pdf->download('_birthday_card.pdf');
        
    }
    
   
}