<?php
namespace App\Http\Controllers\Api;
use App\Admin;
use App\Events\SmsEvent;
use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use App\Model\AcademicYear;
use App\Model\Cashbook;
use App\Model\Category;
use App\Model\ClassType;
use App\Model\Event\EventDetails;
use App\Model\Gender;
use App\Model\Homework;
use App\Model\ParentRegistration;
use App\Model\Quote;
use App\Model\Religion;
use App\Model\Remark\Remark;
use App\Model\SessionDate;
use App\Model\StudentAttendance;
use App\Model\StudentDefaultValue;
use App\Model\StudentRemark;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
    //  */
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        try {             

             $student =Admin::with(['classes','roles'])->find($id);  
             return response()->json($student);    
        } catch (Exception $e) {
           return $e; 
        }
       
    }

    public function image($id){ 
        try {
            $admin =Admin::find($id); 
            $img = Storage::disk('student')->get('profile/admin/'.$admin->profile_pic); 
            return response($img)->header('Content-Type', 'image/jpeg');
        } catch (Exception $e) {
            return $e;
        }
       
    }
    public function forgotPassword(Request $request)
    {
        try {
            $student = Student::orWhere('email',$request->email)->orWhere('username',$request->email)->orWhere('father_mobile',$request->email)->where('status',1)->first();
            if (!empty($student)) {
                $otp =mt_rand(100000,999999);
                 $student->mobile_otp = $otp;
                 $student->save();
                 event(new SmsEvent($student->father_mobile,'Forget Password Otp is '.$student->mobile_otp));
                 $data=array();
                 $data['status']=1;
                 $data['mobile_no']=$student->father_mobile; 
                 return $data; 
            }else{
               $data=array();
                    $data['status']=0;
                    $data['data']='null';
                    return $data;
            }
        } catch (Exception $e) {
           return $e; 
        }
    }
    //otp verification
    public function forgotPasswordOtpVerify(Request $request)
    {
        try {
            $student = Student::orWhere('email',$request->email)->orWhere('username',$request->email)->orWhere('father_mobile',$request->email)->where('status',1)->first();
            if (!empty($student)) {
                if ($student->mobile_otp==$request->otp) {
                    $char = substr( str_shuffle( "abcdefghijklmnopqrstuvwxyz0123456789" ), 0, 6 );
                    $student->mobile_otp = 0;
                    $student->password = bcrypt($char);
                    $student->save();
                    event(new SmsEvent($student->father_mobile,'Login Password '.$char));
                    $data=array();
                    $data['status']=1;
                    $data['mobile_no']=$student->father_mobile;  
                }else{
                    $data=array();
                     $data['status']=0;
                     $data['data']='null';
                     return $data;
                } 
                
                 $data=array();
                 $data['status']=1;
                 $data['mobile_no']=$student->father_mobile; 
                 return $data; 
            }else{
               $data=array();
                    $data['status']=0;
                    $data['data']='null';
                    return $data;
            }
        } catch (Exception $e) {
           return $e; 
        }
    }
    public function Login(Request $request){     
                     
        try {  

            $student = Student::orWhere('email',$request->email)->orWhere('username',$request->email)->orWhere('father_mobile',$request->email)->where('status',1)->first();
            $admin = Admin::orWhere('email',$request->email)->orWhere('mobile',$request->email)->where('status',1)->first();

             if (!empty($student)) {  
                 if (Hash::check($request->password, $student->password)) {
                     auth()->guard('student')->loginUsingId($student->id);
                     $data=array();
                     $data['status']=1;
                     $data['id']=$student->id; 
                     $data['role_id']=6; 
                     return $data;

                 }elseif (!empty($admin)){
                    if (Hash::check($request->password, $admin->password)) {
                        auth()->guard('admin')->loginUsingId($admin->id);
                        $data=array();
                        $data['status']=1;
                        $data['id']=$admin->id; 
                        $data['role_id']=$admin->role_id; 
                        return $data;

                    } else {
                    $data=array();
                    $data['status']=0;
                    $data['data']='null';
                    return $data;
                    }
                 }
                 else {
                    $data=array();
                    $data['status']=0;
                    $data['data']='null';
                    return $data;
                }

             }elseif (!empty($admin)) {  
                if (Hash::check($request->password, $admin->password)) {
                    auth()->guard('admin')->loginUsingId($admin->id);
                    $data=array();
                    $data['status']=1;
                    $data['id']=$admin->id; 
                    $data['role_id']=$admin->role_id; 
                    return $data;

                } else {
                    $data=array();
                    $data['status']=0;
                    $data['data']='null';
                    return $data;
                }
             }
             else{
                $data=array();
                     $data['status']=0;
                     $data['data']='null';
                     return $data;
             }
            // return $student =Student::where('email',$request->email)->first(); 
            
        } catch (Exception $e) {
            return $e;
        }
       
    }
    public function homework(Request $request){ 
        try {  
            $homework =Homework::get(); 
            if (!empty($homework)) {
              return $homework;   
            }
             return response()->json(['data'=>'null','status'=>'Not Found']);  
        } catch (Exception $e) {
            return $e;
        }
       
    }
    public function homeworkToday(Request $request,$id){ 
        try {   
           $student =Student::find($id); 
            $homework =Homework::where('class_id',$student->class_id)->where('section_id',$student->section_id)->orderBy('created_at','desc')->first(); 
            if (!empty($student)) {
              return $homework;   
            }
             return response()->json(['data'=>'null','status'=>'Not Found']);  
        } catch (Exception $e) {
            return $e;
        }
       
    }

    public function attendance(Request $request,$id){ 
        try {   
           $student =Student::find($id); 
           $session_id =$student->session_id;
            $present =StudentAttendance::where('student_id',$student->id)->where('attendance_type_id',1)->count(); 
            $absent =StudentAttendance::where('student_id',$student->id)->where('attendance_type_id',2)->count();
             $attendance =StudentAttendance::where('student_id',$student->id)->where('date',date('Y-m-d'))->first(); 
             $todayAttendance='';
            if (!empty($attendance)) {
               $todayAttendance=$attendance->attendance_type_id==1?'Present':'Absent'; 
             } 
                     
            if (!empty($student)) {
              return ['present'=>$present,'absent'=>$absent,'todayAttendance'=>$todayAttendance];   
            }
             return response()->json(['data'=>'null','status'=>'0']);  
        } catch (Exception $e) {
            return $e;
        }
       
    }

    public function feeDetails(Request $request,$id){ 
        try {   

           $student =Student::find($id);  
           $date = date('Y-m-d');
            $sessionDate =  AcademicYear::find($student->session_id)->start_date;
           $cashbook = new Cashbook();
           $fees = $cashbook->getFeeByStudentId($student->id); 
           $cashbooks = $cashbook->getCashbookFeeByStudentId($student->id,$sessionDate,$date);
           $lastFee = $cashbook->getLastFeeByStudentId($student->id);
            if (!empty($fees)) {
              return $fees;   
            }
             return response()->json(['data'=>'null','status'=>'0']);  
        } catch (Exception $e) {
            return $e;
        }
       
    }
    public function lastFee(Request $request,$id){ 
        try {   

           $student =Student::find($id);  
           $date = date('Y-m-d');
            $sessionDate =  AcademicYear::find($student->session_id)->start_date;
           $cashbook = new Cashbook();
           $fees = $cashbook->getFeeByStudentId($student->id); 
           $cashbooks = $cashbook->getCashbookFeeByStudentId($student->id,$sessionDate,$date);
           $lastFee = $cashbook->getLastFeeByStudentId($student->id);

            if (!empty($lastFee)) {
              return $lastFee; 
              // return [$lastFee,$cashbooks->sum('receipt_amount')];   
            }
             return response()->json(['data'=>'null','status'=>'0']);  
        } catch (Exception $e) {
            return $e;
        }
       
    }
    public function feeUpto(Request $request,$id){ 
        try { 
           $student =Student::find($id);  
           $date = date('Y-m-d');
            $sessionDate =  AcademicYear::find($student->session_id)->start_date;
           $cashbook = new Cashbook();
           $fees = $cashbook->getFeeByStudentId($student->id); 
           $cashbooks = $cashbook->getCashbookFeeByStudentId($student->id,$sessionDate,$date);
           $lastFee = $cashbook->getLastFeeByStudentId($student->id);  
           $feeUpto =$cashbooks->sum('receipt_amount');         
            if (!empty($lastFee)) {
              return ['feeUpto'=>$feeUpto]; 
              // return [$lastFee,$cashbooks->sum('receipt_amount')];   
            }
             return response()->json(['data'=>'null','status'=>'0']);  
        } catch (Exception $e) {
            return $e;
        }
       
    } 
    public function event(Request $request,$id){ 
        try { 
           $events = EventDetails::all();
              
            if (!empty($events)) {
              return $events; 
              // return [$lastFee,$cashbooks->sum('receipt_amount')];   
            }
             return response()->json(['data'=>'null','status'=>'0']);  
        } catch (Exception $e) {
            return $e;
        }
       
    } 
    public function remarks(Request $request,$id){ 
        try { 
        $student =Student::find($id);
        $remarks = StudentRemark::with(['admin'])->where('student_id',$student->id)->get();
              
            if (!empty($remarks)) {
              return $remarks; 
              // return [$lastFee,$cashbooks->sum('receipt_amount')];   
            }
             return response()->json(['data'=>'null','status'=>'0']);  
        } catch (Exception $e) {
            return $e;
        }
       
    }
    public function quotes(Request $request,$id){ 
        try { 
       
           $quotes = Quote::orderBy('id','DSEC')->get();
              
            if (!empty($quotes)) {
              return $quotes; 
              // return [$lastFee,$cashbooks->sum('receipt_amount')];   
            }
             return response()->json(['data'=>'null','status'=>'0']);  
        } catch (Exception $e) {
            return $e;
        }
       
    }
        
}
