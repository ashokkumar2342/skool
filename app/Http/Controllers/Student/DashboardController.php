<?php

namespace App\Http\Controllers\Student;

use App\Helper\MyFuncs;
use App\Http\Controllers\Controller;
use App\Model\AcademicYear;
use App\Model\Cashbook;
use App\Model\DocumentType;
use App\Model\Event\EventDetails;
use App\Model\Exam\ClassTest;
use App\Model\Exam\ExamSchedule;
use App\Model\Homework;
use App\Model\LeaveRecord;
use App\Model\Library\BookAccession;
use App\Model\Library\Book_Reserve;
use App\Model\Library\Booktype;
use App\Model\Library\MemberShipDetails;
use App\Model\ReceiptDetail;
use App\Model\Schoolinfo;
use App\Model\StudentAttendance;
use App\Model\StudentFeeDetail;
use App\Model\StudentFeePaidUpTo;
use App\Model\StudentRemark;
use App\Model\StudentReplyRemark;
use App\Model\StudentUserMap;
use App\Model\leaveTypeStudent;
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
        $student = MyFuncs::getStudent();
        $student_id = $student->id;
        $date = date('Y-m-d');
        $year = date('Y');
        $firstDay = date('d')-1;
   
        $sessionDate =  AcademicYear::find($student->academic_year_id)->start_date;
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
    public function homework($homework)
    {   $homeworkList = Homework::find($homework);                  
        return view('student.homework.view',compact('homeworkList'));
    }
    public function homeworkListShow(Request $request)
    { 
       $homeworks= Homework::
       where('date',date('Y-m-d',strtotime($request->date)))->get();   
      if ($request->print==0) {
       $response = array();
       $response['status']=1;
       $response['data']=view('student.homework.table',compact('homeworks'))->render();
       return $response;
    }elseif ($request->print==1) {
      $response = array();
      $response['status']=1;
      $response['data']=view('student.homework.print',compact('homeworks'))->render();
      return $response;
  
    }
    }

    public function image($image){
        $img = Storage::disk('student')->get('profile/'.$image);
        return response($img);
    }  

    public function profile(){

        $students = MyFuncs::getStudent();
        $st=new Student();
        $student=$st->getStudentDetailsById($students->id); 
        return view('student.profile.view',compact('student'));
    }
    public function homeworkList(){
        $admin = Auth::guard('admin')->user();
        $student=StudentUserMap::where('userid',$admin->id)->first();
        $classid=Student::where('id',$student->student_id)->first();
        $homeworks =Homework::where('class_id',$classid->class_id)->where('section_id',$classid->section_id)->orderBy('created_at','desc')->get();
        return view('student.homework.list',compact('homeworks'));
    }
    public function attendance(){
        $student = MyFuncs::getStudent();
       //  $student_id = $student->id;
       //  $date = date('Y-m-d');
       //  $year = date('Y');
       //  $firstDay = date('d')-1;
       //  $monthOfFirstDate = date('Y-m-d',strtotime($date ."-".$firstDay." days"));
       //  $monthly=date('Y-m-d',strtotime($date ."-30 days"));
       //  $weekly=date('Y-m-d',strtotime($date ."-7 days"));
       //  $monthlyPresent = StudentAttendance::where('attendance_type_id',1)
       //              ->where('student_id', $student_id)
       //              ->whereBetween('date', [$monthly, $date])
       //              ->OrWhere('attendance_type_id',3)
       //              ->OrWhere('attendance_type_id',4)->count();
       //  $monthlyAbsent = StudentAttendance::where('attendance_type_id',2) 
       //              ->where('student_id', $student_id)
       //              ->whereBetween('date', [$monthly, $date])
       //              ->count();
       //  $weeklyPresent = StudentAttendance::where('attendance_type_id',1)
       //              ->where('student_id', $student_id)
       //              ->whereBetween('date', [$weekly, $date])
       //              ->OrWhere('attendance_type_id',3)
       //              ->OrWhere('attendance_type_id',4)->count();            
       //  $weeklyAbsent = StudentAttendance::where('attendance_type_id',2) 
       //              ->where('student_id', $student_id)
       //              ->whereBetween('date', [$weekly, $date])
       //              ->count();
       // $workingDays = StudentAttendance::where('student_id', $student_id)
       //              ->whereBetween('date', [$monthOfFirstDate, $date])
       //             ->count();
       //  $tillPresent = StudentAttendance::where('attendance_type_id',1)
       //                      ->where('student_id', $student_id)
       //                      ->whereBetween('date', [$sessionDate, $date])
       //                      ->OrWhere('attendance_type_id',3)
       //                      ->OrWhere('attendance_type_id',4)->count();
       //  $tillAbsent = StudentAttendance::where('attendance_type_id',2) 
       //              ->where('student_id', $student_id)
       //              ->whereBetween('date', [$sessionDate, $date])
       //              ->count(); 
       //  $classTests = ClassTest::where('class_id',$student->class_id)->where('section_id',$student->section_id)->orderBy('created_at','desc')->take(10)->get();              
       // $homeworks = Homework::where('class_id',$student->class_id)->where('section_id',$student->section_id)->orderBy('created_at','desc')->take(10)->get();            
        
       //  $students = Student::where('status',1)->count();
         
       //   $studentRemarks=StudentRemark::where('student_id',$student->id)->take(10)->get(); 
       $attendances = StudentAttendance::where('student_id',$student->id)->get();
       return view('student.attendance.list',compact('attendances'));
    }
    public function feeDetails(){ 
        $student = MyFuncs::getStudent(); 
       $cashbook = new Cashbook();
       $fees = $cashbook->getFeeByStudentId($student->id);
            return view('student.fee.list',compact('fees'));
     }
     public function classTest(){ 
        $academicYears = AcademicYear::orderBy('start_date','DESC')->get();
            return view('student.classtest.list',compact('academicYears'));
     }
     public function classTestShow(Request $request){
     if ($request->test_for==1) {
        $classtests=ClassTest::where('academic_year_id',$request->academic_year_id)->where('test_date','>',date('Y-m-d'))->orderBy('test_date','ASC')->take($request->record)->get();  
      } 
      elseif ($request->test_for==2) {
        $classtests=ClassTest::where('academic_year_id',$request->academic_year_id)->orderBy('test_date','ASC')->take($request->record)->get();
      } 
      
      $response = array();
      $response['status']=1;
      $response['data']=view('student.classtest.table',compact('classtests'))->render();
      return $response; 
      
     }
     public function examSchedule(){ 
        
        $academicYears = AcademicYear::orderBy('start_date','DESC')->get();
        return view('student.examschedule.index',compact('academicYears'));
     }
     public function examScheduleShow(Request $request){
      $examSchedules=ExamSchedule::where('academic_year_id',$request->academic_year_id)->where('exam_term_id',$request->exam_term)->get();
      $response = array();
      $response['status']=1;
      $response['data']=view('student.examschedule.table',compact('examSchedules'))->render();
      return $response; 
      
     }
     public function event(){
        // $student = MyFuncs::getStudent();
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
       $student = MyFuncs::getStudent();
       $memberShipDetails=MemberShipDetails::where('member_ship_registration_no',$student->registration_no)->first(); 
       $bookReserves = Book_Reserve::where('member_ship_no_id',@$memberShipDetails->id or '')->get(); 
         return view('student.library.list',compact('bookReserves'));
           
    }
    public function bookReserve()
    {
         $bookTypes =Booktype::orderBy('name','desc')->get();

         return view('student.library.book_reserve',compact('bookTypes'));
    }
     public function bookReserveOnchange(Request $request)
    {
        $bookAccessionWiseNames=BookAccession::where('book_id',$request->id)->get();
        $bookReserveHis=Book_Reserve::where('book_name_id',$request->id)->get();
         return view('student.library.book_accession_select_box',compact('bookAccessionWiseNames','bookReserveHis'));

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
    
              $student = MyFuncs::getStudent(); 
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
                        $bookReserveRequest->member_ship_no_id=$memberShipDetails->id; 
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

       $student=MyFuncs::getStudent();
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
          $response =array();
            $response['status'] =0;
            $response['msg'] ='Old Password Not Match';
            return $response;
        }

    }
    public function leaveApply(){
        $admin = Auth::guard('admin')->user();
        $student =new StudentUserMap();
        $students=$student->userIdBySibling($admin->id);
        $leaveRecords=LeaveRecord::whereIn('student_id',$students)->orderBy('apply_date','ASC')->get();
     return view('student.leave.list',compact('leaveRecords'));  
    }
    public function leaveApplyForm($value='')
    {
        $academicYears=AcademicYear::orderBy('id','ASC')->get();
       $leaveTypes=LeaveTypeStudent::orderBy('name','ASC')->get();
     return view('student.leave.apply_form',compact('students','leaveTypes','academicYears','leaveRecord'));
    }
    public function leaveApplyStore(Request $request ,$id=null)
   {    
        
       $rules=[
        
             
            'year_id' => 'required', 
            'leave_id' => 'required', 
            'apply_date' => 'required', 
            'from_date' => 'required', 
            'to_date' => 'required', 
           
       
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
       $leaveType= LeaveRecord::firstOrNew(['id'=>$id]);
       $leaveType->year_id=$request->year_id;
       $leaveType->leave_id=$request->leave_id;
       $leaveType->student_id=$request->student_id;
       $leaveType->apply_date=date('Y-m-d',strtotime($request->apply_date));
       $leaveType->from_date=$request->from_date;
       $leaveType->to_date=$request->to_date;
       $leaveType->remark=$request->remark;
       $leaveType->status=0;
       if ($request->hasFile('attachment')) { 
                $attachment=$request->attachment;
                $filename=$student->id.'attech'.date('d-m-Y').time().'.pdf'; 
                $attachment->storeAs('student/leave/',$filename);
                $leaveType->attachment=$filename; 
                $leaveType->save();
                $response=['status'=>1,'msg'=>'Created Successfully'];
                return response()->json($response);
        } 

      }
      $leaveType->save();
                $response=['status'=>1,'msg'=>'Created Successfully'];
                return response()->json($response);
   }

   public function uploadDocument($value='')
   {
       $student =  MyFuncs::getStudent();
       $documentTypes = array_pluck(DocumentType::get(['id','name'])->toArray(),'name', 'id');
       return view('student.document.list',compact('student','documentTypes'));
   }
   public function feeReceipt($value='')
   {  
       $academicYears = AcademicYear::orderBy('start_date','DESC')->get();
       return view('student.feereceipt.index',compact('academicYears','schoolinfo'));
   }
   public function feeReceiptShow(Request $request)
   {  
      
       $receiptDetails=ReceiptDetail::where('student_id',$request->student_id)->get();
       $response=array();
       $response['status']=1;
       $response['data']=view('student.feereceipt.list',compact('receiptDetails','schoolinfo'))->render();
       return $response;
      
   }
   public function feePay($value='')
   {
       return view('student.feepay.index');
   }
   public function viewSyllabus($value='')
   {
       return view('student.syllabus.index');
   }
   public function feeCertificate($value='')
   {
       $academicYears=AcademicYear::orderBy('id','ASC')->get();
       return view('student.feeCertificate.index',compact('academicYears'));
   }
   public function feeCertificateDownload( Request $request,$student_id)
   { 
       $student =Student::find($student_id);
       $documentUrl = Storage_path() . '/app/student/document/certificate/fee_certificate/'.'/'.$student->classes->name.'/'.$student->sectionTypes->name;
        return response()->file($documentUrl.'/'.'2year'.'_'.$student->registration_no.'_fee_certificate.pdf');
   }

}
