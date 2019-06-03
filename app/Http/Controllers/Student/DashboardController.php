<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Model\AcademicYear;
use App\Model\Cashbook;
use App\Model\Event\EventDetails;
use App\Model\Exam\ClassTest;
use App\Model\Homework;
use App\Model\Library\BookAccession;
use App\Model\Library\Book_Reserve;
use App\Model\Library\Booktype; 
use App\Model\Library\memberShipDetails;
use App\Model\StudentAttendance;
use App\Model\StudentFeeDetail;
use App\Model\StudentRemark;
use App\Model\StudentReplyRemark;
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
        $studentReplyremarks=StudentReplyRemark::where('student_remark_id',$id)->get();
        return view('student.remark.student_reply_remark',compact('studentRemarks','studentReplyremarks'));
    }
     public function remarksView($id)
    {
           $studentRemarks=StudentRemark::find($id);
        return view('student.remark.student_remark_view',compact('studentRemarks'));
    }
    public function studentReplyremarkStore(Request $request,$id)
    {  
           $studentReplyRemark=new StudentReplyRemark();
           $studentReplyRemark->student_remark_id=$id;
           $studentReplyRemark->remark=$request->remark;
           $studentReplyRemark->save();
           $response = array();
           $response['status']=1;
           $response['msg']="Submit Successfully";
           return $response; 
        
    }
    public function library()
    {
       $student = Auth::guard('student')->user();
      $memberShipDetails=memberShipDetails::where('member_ship_registration_no',$student->registration_no)->first(); 
      $bookReserves = Book_Reserve::where('member_ship_no_id',$memberShipDetails->id)->get(); 
         return view('student.library.list',compact('bookReserves'));
           
    }
    public function bookReserve()
    {
         $bookTypes =Booktype::orderBy('name','asc')->get(); 
         return view('student.library.book_reserve',compact('bookTypes'));
    }
     public function bookReserveOnchange(Request $request)
    {
        $bookAccessionWiseNames=BookAccession::where('book_id',$request->id)->get();
         return view('student.library.book_accession_select_box',compact('bookAccessionWiseNames'));

    }
    public function bookReserveStatusUpdate(Request $request)
    {
        // return $request;
        $rules=[ 
            
            'book_name' => 'required', 
             
      ];

      $validator = Validator::make($request->all(),$rules);
      if ($validator->fails()) {
          $errors = $validator->errors()->all();
          $response=array();
          $response["status"]=0;
          $response["msg"]=$errors[0];
          return response()->json($response);// response as json
      } else{

             
            $bookAccession=BookAccession::where('book_id',$request->book_name)->where('status',1)->first();
    
              $student = Auth::guard('student')->user(); 
             $memberShipDetails=MemberShipDetails::where('member_ship_no',$student->id)->first();
             
              if ($bookAccession!=null) { 
              $this->bookAccessionStatusUpdate($bookAccession->id);
                $bookReserveRequest= new Book_Reserve();
                $bookReserveRequest->member_ship_no_id=$memberShipDetails->id; 
                $bookReserveRequest->book_name_id=$request->book_name;
                $bookReserveRequest->accession_no=$bookAccession->id;
                $bookReserveRequest->request_date=date('Y-m-d');
                $bookReserveRequest->reserve_date=date('Y-m-d');
                $bookReserveRequest->reserve_upto_date=date('Y-m-d',strtotime(date('Y-m-d')."+2 days")); 
                $bookReserveRequest->status=2; 
                $bookReserveRequest->save();
               
               $response=['status'=>1,'msg'=>'Reserve Successfully'];
                   return response()->json($response);
                 }
               else{   
                    
                        $bookReserveRequest= new Book_Reserve();
                        $bookReserveRequest->member_ship_no_id=$request->member_ship_registration_no; 
                        $bookReserveRequest->book_name_id=$request->book_name;                      
                        $bookReserveRequest->request_date=date('Y-m-d');
                        $bookReserveRequest->status=1; 
                        $bookReserveRequest->save();
                        $response=['status'=>1,'msg'=>'Request Successfully'];
                             return response()->json($response);
                      
                   // }else{
                   //     $response=['status'=>0,'msg'=>'Already Reserve']; 
                   //     return response()->json($response);
                   // }
                
               }
      }


    }

     public function bookAccessionStatusUpdate($accession_no)
    {
           $bookAccession=BookAccession::find($accession_no);
         $bookAccession->status=3;
         $bookAccession->save();
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
