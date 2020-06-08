<?php

namespace App\Http\Controllers\Admin\Exam;

use App\Events\SmsEvent;
use App\Helper\MyFuncs;
use App\Helpers\MailHelper;
use App\Http\Controllers\Controller;
use App\Model\AcademicYear;
use App\Model\ClassType;
use App\Model\Exam\ClassTest;
use App\Model\Sms\SmsTemplate;
use App\Model\StudentDefaultValue;
use App\Model\Subject;
use App\Model\SubjectType;
use App\Student;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ClassTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $academicYears=AcademicYear::orderBy('id','ASC')->get();
        $classTypes =MyFuncs::getClassByHasUser();
        $subjects = SubjectType::orderBy('id','name')->get();
        $StudentDefaultValue=MyFuncs::UserWiseStudentDefaultValue();
        return view('admin.exam.class_test',compact('classTypes','subjects','classTests','academicYears','StudentDefaultValue'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addForm(Request $request)
    {  $academic_year_id= $request->academic_year_id;
       $class_id =$request->class_id;
       $section_id= $request->section_id;
       $subject= $request->subject;
        $academicYears=AcademicYear::orderBy('id','ASC')->get();
        $classes = MyFuncs::getClasses();
        $subjects = array_pluck(SubjectType::get(['id','name'])->toArray(),'name', 'id');
        $classTypes=MyFuncs::getClassByHasUser(); 
        return view('admin.exam.class_test_add_form',compact('classes','subjects','classTests','academicYears','classTypes','academic_year_id','class_id','section_id','subject'));
    }
    public function editForm($id)
    {   
        $classTest=ClassTest::find($id);
        $academicYears=AcademicYear::orderBy('id','ASC')->get(); 
        $subjects = array_pluck(SubjectType::get(['id','name'])->toArray(),'name', 'id');
        $classTypes=MyFuncs::getClassByHasUser(); 
        return view('admin.exam.class_test_edit_form',compact('subjects','classTest','academicYears','classTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id=null)
    {  
        $user_id=Auth::guard('admin')->user()->id; 
        $rules=[
        'academic_year_id' => 'required', 
        'class_id' => 'required', 
        'section_id' => 'required', 
        'subject' => 'required',  
        'test_date' => 'required',  
        'max_marks' => 'required',  
        'sylabus' => 'nullable|mimes:pdf|max:2048', 
        ]; 
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $response=array();
            $response["status"]=0;
            $response["msg"]=$errors[0];
            return response()->json($response);// response as json
        }
        $classTest = ClassTest::firstOrNew(['id'=>$id]);
        $classTest->academic_year_id = $request->academic_year_id;
        $classTest->class_id = $request->class_id;
        $classTest->section_id = $request->section_id;
        $classTest->subject_id = $request->subject;
        $classTest->test_date = $request->test_date;
        $classTest->max_marks = $request->max_marks;
        $classTest->discription = $request->description;
        if ($request->is_include_term_exam==null) {
         $classTest->is_include_term_exam =0;   
        }else{
        $classTest->is_include_term_exam =$request->is_include_term_exam; 
        }
        $classTest->marks_entered_status =0;
        if ($request->hasFile('sylabus')) { 
                $sylabus=$request->sylabus;
                $filename='sylabus'.date('d-m-Y').time().'.pdf'; 
                $sylabus->storeAs('student/classtest/',$filename);
                $classTest->sylabus=$filename; 
        } 
        $classTest->save(); 
        $response = array();
        $response['msg'] = 'Submit Successfully';
        $response['status'] = 1;
        return response()->json($response); 

    }
    public function classSectionSubject(Request $request)
    {
        $StudentDefaultValue=MyFuncs::UserWiseStudentDefaultValue(); 
        $sections = MyFuncs::getSections($request->id);
        $subjects = Subject::where('classType_id',$request->id)->get();
        return view('admin.exam.class_section_subject',compact('sections','subjects','StudentDefaultValue'));
    }
    public function tableShow(Request $request)
    {
         
        if ($request->has('academic_year_id') && ($request->has('class_id')&& ($request->has('section_id')&& ($request->has('subject'))))) {
            
          $classTests = ClassTest::where('academic_year_id',$request->academic_year_id)->where('class_id',$request->class_id)->where('section_id',$request->section_id)->where('subject_id',$request->subject)->get(); 
        }elseif ($request->has('academic_year_id') && ($request->has('class_id')&& ($request->has('section_id')))) {
            
          $classTests = ClassTest::where('academic_year_id',$request->academic_year_id)->where('class_id',$request->class_id)->where('section_id',$request->section_id)->get(); 
        }elseif ($request->has('academic_year_id') && ($request->has('class_id'))) {
            
          $classTests = ClassTest::where('academic_year_id',$request->academic_year_id)->where('class_id',$request->class_id)->get(); 
        }elseif($request->has('academic_year_id')&&($request->has('subject'))){
          $classTests = ClassTest::where('academic_year_id',$request->academic_year_id)->where('subject_id',$request->subject)->get();
        }elseif($request->has('academic_year_id')){
          $classTests = ClassTest::where('academic_year_id',$request->academic_year_id)->get();
        }
        $response = array(); 
        $response['status'] = 1;
        $response['data'] = view('admin.exam.class_test_table_show',compact('classTests'))->render();
        return response()->json($response);
    }
    public function addMarks($classTest_id)
    {
      $user_id=Auth::guard('admin')->user()->id;  
      $students=DB::select(DB::raw("call up_show_student_testmarks ('$classTest_id','$user_id')")); 
      return view('admin.exam.marks',compact('students','classTest_id'));
    }
    public function attendenceImport($classTest_id)
    { $user_id=Auth::guard('admin')->user()->id;  
      $importAttendance=DB::select(DB::raw("call up_importAttendance_Test_ClassAttendance ('$classTest_id','$user_id','1')"));
        $response = array();
        $response['status'] = 1;
        $response['msg'] = $importAttendance[0]->Result;
        return response()->json($response);  
    }
    public function marksVerify($classTest_id)
    {
      $user_id=Auth::guard('admin')->user()->id;  
      $students=DB::select(DB::raw("call up_show_student_testmarks ('$classTest_id','$user_id')")); 
      return view('admin.exam.marks_verify',compact('students','classTest_id'));
    }
    public function sendSmsTest($classTest_id)
     {
        $user_id=Auth::guard('admin')->user()->id;  
        $sendSmsTest=DB::select(DB::raw("call up_sms_classTestInform ('$classTest_id','$user_id','1','1','1','1')"));
        $response = array();
        $response['status'] = 1;
        $response['msg'] = 'SMS Send Successfully';
        return response()->json($response);   
     } 
    public function downloadSyllabus($path)
    {
        $documentUrl = Storage_path() . '/app/student/classtest';
        return response()->file($documentUrl.'/'.$path);
           
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Exam\ClassTest  $classTest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClassTest $classTest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Exam\ClassTest  $classTest
     * @return \Illuminate\Http\Response
     */
   public function destroy($id)
   {

       $ClassTest = ClassTest::findOrFail(Crypt::decrypt($id));
       $ClassTest->delete();
       $response = array();
        $response['status'] = 1;
        $response['msg'] = 'Delete Successfully' ;
        return response()->json($response);
   }
}
