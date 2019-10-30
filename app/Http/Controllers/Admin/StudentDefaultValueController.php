<?php

namespace App\Http\Controllers\Admin;

 use App\Http\Controllers\Controller;
use App\Helper\MyFuncs;
use App\Model\AcademicYear;
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
use App\Model\Sms\EmailTemplate;
use App\Model\Sms\SmsTemplate;
use App\Model\Sms\TemplateType;
use App\Model\StudentDefaultValue;
use App\Model\StudentFee;
use App\Model\StudentSubject;
use App\Model\Subject;
use App\Model\SubjectType;
use App\Student;
use Auth;
use Carbon;
use DB;
use Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Storage;

class StudentDefaultValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id=Auth::guard('admin')->user()->id;
        $classes = MyFuncs::getClasses();    
        $sessions = array_pluck(SessionDate::get(['id','date'])->toArray(),'date', 'id');
        $academicYears = array_pluck(AcademicYear::get(['id','name'])->toArray(),'name', 'id');
        $genders = array_pluck(Gender::get(['id','genders'])->toArray(),'genders', 'id');
        $religions = array_pluck(Religion::get(['id','name'])->toArray(),'name', 'id');
        $categories = array_pluck(Category::get(['id','name'])->toArray(),'name', 'id');
        $default = StudentDefaultValue::where('user_id',$user_id)->first();
        $smsbirthdayTemplates=SmsTemplate::where('template_type_id',1)->get(); 
        $emailbirthdayTemplates=EmailTemplate::where('template_type_id',1)->get(); 
        $smshomeworkTemplates=SmsTemplate::where('template_type_id',2)->get(); 
        $emailhomeworkTemplates=EmailTemplate::where('template_type_id',2)->get();
        $smsclasstestTemplates=SmsTemplate::where('template_type_id',3)->get(); 
        $emailclasstestTemplates=EmailTemplate::where('template_type_id',3)->get();
        $smsclasstestDetailsTemplates=SmsTemplate::where('template_type_id',4)->get(); 
        $emailclasstestDetailsTemplates=EmailTemplate::where('template_type_id',4)->get();
        $smsTimetableTemplates=SmsTemplate::where('template_type_id',5)->get(); 
        $emailTimetableTemplates=EmailTemplate::where('template_type_id',5)->get();
        $smsMedicalTemplates=SmsTemplate::where('template_type_id',6)->get(); 
        $emailMedicalTemplates=EmailTemplate::where('template_type_id',6)->get();
        $smsabsentTemplates=SmsTemplate::where('template_type_id',7)->get(); 
        $emailabsentTemplates=EmailTemplate::where('template_type_id',7)->get(); 
           
        return view('admin.student.studentdetails.default',compact('classes','sessions','default','genders','religions','categories','default','academicYears','smsbirthdayTemplates','emailbirthdayTemplates','smshomeworkTemplates','emailhomeworkTemplates','smsclasstestTemplates','emailclasstestTemplates','smsTimetableTemplates','emailTimetableTemplates','smsclasstestDetailsTemplates','emailclasstestDetailsTemplates','smsMedicalTemplates','emailMedicalTemplates','smsabsentTemplates','emailabsentTemplates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // return $request;
        $user_id=Auth::guard('admin')->user()->id;
        $default = StudentDefaultValue::firstOrNew(['user_id'=>$user_id]);
        $default->year = $request->academic_year;
        $default->user_id = $user_id;
        $default->class_id = $request->class;
        $default->section_id = $request->section;
        $default->religion_id = $request->religion;
        $default->category_id = $request->category;
        $default->state = $request->state;
        $default->city = $request->city;
        $default->pincode = $request->pincode;
        
        $default->birthday_message_id = $request->birthday_message_id;
        $default->birthday_email_id = $request->birthday_email_id; 
        
        
        $default->homework_message_id = $request->homework_message_id;
        $default->homework_email_id = $request->homework_email_id; 
        
        
        $default->classTest_message_id = $request->classTest_message_id;
        $default->classTest_email_id = $request->classTest_email_id;

        $default->class_test_details_email_id = $request->class_test_details_email_id;
        $default->class_test_details_message_id = $request->class_test_details_message_id; 
        
       
        $default->timetable_message_id = $request->timetable_message_id;
        $default->timetable_email_id = $request->timetable_email_id;

        $default->medical_message_id = $request->medical_message_id;
        $default->medical_email_id = $request->medical_email_id;

        $default->absent_student_message_id = $request->absent_student_message_id;
        $default->absent_student_email_id = $request->absent_student_email_id; 
        
        $default->save();
        return redirect()->back()->with(['message'=>'Default Value Updated','class'=>'success']);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\StudentDefaultValue  $studentDefaultValue
     * @return \Illuminate\Http\Response
     */
    public function template(Request $request,$option_id)
    {
        if ($option_id==1) {
            if ($request->id==1) {
                $default = StudentDefaultValue::
                                               where('birthday_template_id',$request->id)
                                               ->first()->birthday_message_id; 
            }
            if ($request->id==2) { 
                $default = StudentDefaultValue::
                                              where('homework_template_id',$request->id)
                                              ->first()->homework_message_id;
            }
            if ($request->id==3) {
                $default = StudentDefaultValue::
                                              where('classTest_template_id',$request->id)
                                              ->first()->classTest_message_id;
            }                                  
           $smsTemplates=SmsTemplate::where('template_type_id',$request->id)->get();
           return view('admin.student.studentdetails.template_default',compact('option_id','smsTemplates','default'));   
        }

       $default = StudentDefaultValue::where('email_template_type_id',$request->id)->first();
       $EmailTemplates=EmailTemplate::where('template_type_id',$request->id)->get();
       return view('admin.student.studentdetails.template_default',compact('option_id','EmailTemplates'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\StudentDefaultValue  $studentDefaultValue
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentDefaultValue $studentDefaultValue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\StudentDefaultValue  $studentDefaultValue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentDefaultValue $studentDefaultValue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\StudentDefaultValue  $studentDefaultValue
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentDefaultValue $studentDefaultValue)
    {
        //
    }
}
