<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Model\AcademicYear;
use App\Model\Cashbook;
use App\Model\Event\EventDetails;
use App\Model\Exam\ClassTest;
use App\Model\Homework;
use App\Model\StudentAttendance;
use App\Model\StudentFeeDetail;
use App\Model\StudentRemark;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:admin');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = Auth::guard('student')->user();
        $student_id = $student->id;
        $date = date('Y-m-d');
        $year = date('Y');
        $firstDay = date('d')-1;
   
        $sessionDate =  AcademicYear::find($student->session_id)->start_date;
        $monthOfFirstDate = date('Y-m-d',strtotime($date ."-".$firstDay." days"));
        
        
     
         $monthly=date('Y-m-d',strtotime($date ."-30 days"));
         $weekly=date('Y-m-d',strtotime($date ."-7 days")); 

         $cashbook = new Cashbook(); 
         $cashbooks = $cashbook->getCashbookFeeByStudentId($student_id,$sessionDate,$date);
         $lastFee = $cashbook->getLastFeeByStudentId($student_id);
         $studentFeeDetail = new StudentFeeDetail();
         // $studentFeeDetails = $studentFeeDetail->getFeeDetailsNextByStudentId($student_id);


         $monthlyPresent = StudentAttendance::where('attendance_type_id',1)
                    ->where('student_id', $student_id)
                    ->whereBetween('date', [$monthly, $date])
                    ->OrWhere('attendance_type_id',3)
                    ->OrWhere('attendance_type_id',4)->count();
        $monthlyAbsent = StudentAttendance::where('attendance_type_id',2) 
                    ->where('student_id', $student_id)
                    ->whereBetween('date', [$monthly, $date])
                    ->count();
        $weeklyPresent = StudentAttendance::where('attendance_type_id',1)
                    ->where('student_id', $student_id)
                    ->whereBetween('date', [$weekly, $date])
                    ->OrWhere('attendance_type_id',3)
                    ->OrWhere('attendance_type_id',4)->count();            
        $weeklyAbsent = StudentAttendance::where('attendance_type_id',2) 
                    ->where('student_id', $student_id)
                    ->whereBetween('date', [$weekly, $date])
                    ->count();
       $workingDays = StudentAttendance::where('student_id', $student_id)
                    ->whereBetween('date', [$monthOfFirstDate, $date])
                   ->count();
        $tillPresent = StudentAttendance::where('attendance_type_id',1)
                            ->where('student_id', $student_id)
                            ->whereBetween('date', [$sessionDate, $date])
                            ->OrWhere('attendance_type_id',3)
                            ->OrWhere('attendance_type_id',4)->count();
        $tillAbsent = StudentAttendance::where('attendance_type_id',2) 
                    ->where('student_id', $student_id)
                    ->whereBetween('date', [$sessionDate, $date])
                    ->count(); 
        $classTests = ClassTest::where('class_id',$student->class_id)->where('section_id',$student->section_id)->orderBy('created_at','desc')->take(10)->get();              
       $homeworks = Homework::where('class_id',$student->class_id)->where('section_id',$student->section_id)->orderBy('created_at','desc')->take(10)->get();            
        
        $students = Student::where('status',1)->count();
         
         $studentRemarks=StudentRemark::where('student_id',$student->id)->take(10)->get(); 
        return view('student/dashboard',compact('students','monthlyPresent','monthlyAbsent','weeklyPresent','weeklyAbsent','workingDays','tillPresent','tillAbsent','cashbooks','homeworks','classTests','studentRemarks','lastFee'));
        
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
    public function homework(Homework $homework)
    {         
        return view('student.homework.view',$homework)->render();      
    }

    public function image($image){
        $img = Storage::disk('student')->get('profile/'.$image);
        return response($img);
    }  

    public function profile(){

        $student = Auth::guard('student')->user();
        return view('student.profile.view',compact('student'));
    }
    public function homeworkList(){
        $student = Auth::guard('student')->user();
        $homeworks =Homework::where('class_id',$student->class_id)->where('section_id',$student->section_id)->orderBy('created_at','desc')->paginate(10);
        return view('student.homework.list',compact('homeworks'));
    }
    public function attendance(){
        $student = Auth::guard('student')->user();
       $attendances = StudentAttendance::where('student_id',$student->id)->get();
            return view('student.attendance.list',compact('attendances'));
    }
    public function feeDetails(){ 
        $student = Auth::guard('student')->user(); 
       $cashbook = new Cashbook();
       $fees = $cashbook->getFeeByStudentId($student->id);
            return view('student.fee.list',compact('fees'));
     }
     public function classTest(){ 
        $student = Auth::guard('student')->user(); 
        $classTests = ClassTest::where('class_id',$student->class_id)->where('section_id',$student->section_id)->orderBy('created_at','desc')->paginate(10); 
            return view('student.classtest.list',compact('classTests'));
     }
     public function event(){
        // $student = Auth::guard('student')->user();
        $events = EventDetails::all();
            return view('student.event.list',compact('events'));
    }

   public function studentReplyremarks($id)
    {
        $studentRemarks=StudentRemark::find($id);
        return view('student.remark.student_reply_remark',compact('studentRemarks'));
    }
     public function remarksView($id)
    {
           $studentRemarks=StudentRemark::find($id);
        return view('student.remark.student_remark_view',compact('studentRemarks'));
    }
    public function passwordChange(Request $request)
    {
        $rules=[
          'old_password' => 'required', 
          'password' => 'required|min:6|max:50', 
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $response=array();
            $response["status"]=0;
            $response["msg"]=$errors[0];
            return response()->json($response);// response as json
        }

       $student=Auth::guard('student')->user();
        if (Hash::check($request->old_password, $student->password))
        {
           $newPasswrod = Hash::make($request->password);
            $st=Student::find($student->id);
            $st->password =$newPasswrod ;
            $st->save();
            $response =array();
            $response['status'] =1;
            $response['msg'] ='Password Updated Successfully';
            return $response;
        }else{
           return 'not fond';
        }

    }
}
