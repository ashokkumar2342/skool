<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Model\AcademicYear;
use App\Model\Cashbook;
use App\Model\ClassType;
use App\Model\Event\EventDetails;
use App\Model\Exam\ClassTest;
use App\Model\Homework;
use App\Model\ParentRegistration;
use App\Model\StudentAttendance;
use App\Model\StudentFeeDetail;
use App\Model\StudentRemark;
use App\Model\StudentUserMap;
use App\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Passport\createToken;
use Storage;
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
    {  $admins=Auth::guard('admin')->user();
        if ($admins->role_id==1) {
        //Administrator
            
        $date = date('Y-m-d');
        $present = StudentAttendance::where('attendance_type_id',1)
                    ->Where('date',$date)
                    ->OrWhere('attendance_type_id',3)
                    ->OrWhere('attendance_type_id',4)->count();
        $absent = StudentAttendance::where('attendance_type_id',2) 
                    ->Where('date',$date)
                    ->count();
        
        $date = date('Y-m-d');
        $students = Student::where('student_status_id',1)->count();
        $studentDOBs = Student::whereMonth('dob',date('m'))
                            ->whereDay('dob',date('d'))
                            ->get(); 
        // $newRegistraions = ParentRegistration::get();  
        $feeDues = StudentFeeDetail::where('paid',0)->get()->sum('fee_amount');                      
         $feePaid = StudentFeeDetail::where('paid',1)->get()->sum('fee_amount');
         $classTypes=ClassType::orderBy('id','ASC')->get(); 
            return view('admin/dashboard/dashboard',compact('students','studentDOBs','present','absent','feeDues','feePaid','classTypes','students','admins'));
        }elseif($admins->role_id==12) {
        //student    
        $student = Auth::guard('admin')->user();
        $studentUser = StudentUserMap::where('userid',$student->id)->first();
        $student_id = $studentUser->student_id;
        $date = date('Y-m-d');
        $year = date('Y');
        $firstDay = date('d')-1;
   
        $sessionDate =  AcademicYear::find(1)->start_date;
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
        $studentclse=Student::find($student_id);          
        $classTests = ClassTest::where('class_id',$studentclse->class_id)->where('section_id',$studentclse->section_id)->orderBy('created_at','desc')->take(10)->get();              
       $homeworks = Homework::where('class_id',$studentclse->class_id)->where('section_id',$studentclse->section_id)->orderBy('created_at','desc')->take(10)->get();            
        
        // $students = Student::where('status',1)->count();
         
         $studentRemarks=StudentRemark::where('student_id',$student->id)->take(10)->get();
        
            return view('admin/dashboard/student_dashboard',compact('students','monthlyPresent','monthlyAbsent','weeklyPresent','weeklyAbsent','workingDays','tillPresent','tillAbsent','cashbooks','homeworks','classTests','studentRemarks','lastFee'));
        }elseif($admins->role_id==2) {
        //Chairman
            return view('admin/dashboard/dashboard_'.'2');
        }elseif($admins->role_id==3) {
        //Trustee    
            return view('admin/dashboard/dashboard_'.'3');
        }elseif($admins->role_id==4) {
        //Principal     
            return view('admin/dashboard/dashboard_'.'4');
        }elseif($admins->role_id==5) {
        //Vice-Principal         
            return view('admin/dashboard/dashboard_'.'5');
        }elseif($admins->role_id==6) {
        //Teaching Staff    
            return view('admin/dashboard/dashboard_'.'6');
        }elseif($admins->role_id==7) {
        //Transport Manager    
            return view('admin/dashboard/dashboard_'.'7');
        }elseif($admins->role_id==8){ 
        //Account Officer    
            return view('admin/dashboard/dashboard_'.'8');
        }elseif($admins->role_id==9) {
        //Accountant    
            return view('admin/dashboard/dashboard_'.'9');
        }elseif($admins->role_id==10) {
        //Clerk    
            return view('admin/dashboard/dashboard_'.'10');
        }elseif($admins->role_id==11) {
        //Cashier    
            return view('admin/dashboard/dashboard_'.'11');
        }elseif($admins->role_id==13) {
        //Library Staff    
            return view('admin/dashboard/dashboard_'.'13');
        }elseif($admins->role_id==14) {
        //Store Incharge    
            return view('admin/dashboard/dashboard_'.'14');
        }elseif($admins->role_id==15) {
        //Examination Controller    
            return view('admin/dashboard/dashboard_'.'15');
        }elseif($admins->role_id==16) {
        //Public Relation Officer    
            return view('admin/dashboard/dashboard_'.'16');
        }elseif($admins->role_id==17) {
        //Reception Operator    
            return view('admin/dashboard/dashboard_'.'17');
        }elseif($admins->role_id==18) {
        //Other Staff    
            return view('admin/dashboard/dashboard_'.'18');
        }elseif($admins->role_id==19) {
        //Timetable Manager    
            return view('admin/dashboard/dashboard_'.'19');
        }

        
        
    }  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showStudentDetails(Request $request)
    {
        $classes = ClassType::all();
        $students = Student::all(); 
        return view('admin/dashboard/studentDetails',compact('classes','students'))->render();
    }
    //show Student Registration Details 
    public function showStudentRegistrationDetails(Request $request)
    {
        $classes = ClassType::all();
       $students = ParentRegistration::all(); 
        return view('admin/dashboard/studentRegistrationDetails',compact('classes','students'))->render();
    }

    public function passportTokenCreate(){
        $user = Admin::find(1);
        // Creating a token without scopes...
        $token = $user->createToken('Student')->accessToken;

        // Creating a token with scopes...
       // $token = $user->createToken('My Token', ['place-orders'])->accessToken;
        return $token;
    }

    public function proFile()
    {
        $admins = Auth::guard('admin')->user();
         return view('admin/dashboard/profile/view',compact('admins'));
    }
    public function proFileShow()
    {
        $admins = Auth::guard('admin')->user();
         return view('admin/dashboard/profile/profile_show',compact('admins'));
    }
    public function profileUpdate(Request $request)
    {
           
        $admins = Auth::guard('admin')->user();
         $rules=[
          
            'first_name' => 'required',
            'mobile' => 'required|digits:10',
            'email' => 'required',
            'dob' => 'required',
          
            
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
                $admins=Admin::find($admins->id);
                $admins->first_name=$request->first_name;
                $admins->email=$request->email;
                $admins->mobile=$request->mobile;
                $admins->dob=$request->dob; 
                $admins->save(); 
                $response=['status'=>1,'msg'=>'Upload Successfully'];
                return response()->json($response); 
            } 
          
    }
    public function profilePhoto()
    {
         
         return view('admin/dashboard/profile/profile_upload',compact('admins'));
    } 
    public function profilePhotoUpload(Request $request)
    {
        $admins = Auth::guard('admin')->user();
         $rules=[
          
             // 'image' => 'required|mimes:jpeg,jpg,png,gif|max:5000'          
            
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
                $data = $request->image; 
                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);
                $data = base64_decode($data);
                $image_name= time().'.jpg';       
                $path = Storage_path() . "/app/student/profile/admin/" . $image_name; 
                @mkdir(Storage_path() . "/app/student/profile/admin/", 0755, true);     
                file_put_contents($path, $data); 
                $admins->profile_pic = $image_name;
                $admins->save();
                return response()->json(['success'=>'done']);
            
            
          }
    }
     public function proFilePhotoShow(Request $request,$profile_pic)
     {
         $profile_pic = Storage::disk('student')->get('profile/admin/'.$profile_pic);           
         return  response($profile_pic)->header('Content-Type', 'image/jpeg');
     }
     public function profilePhotoRefrash()
      {
          return view('admin.dashboard.profile.photo_refrash');
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

       $admin=Auth::guard('admin')->user();
        if (Hash::check($request->old_password, $admin->password))
        {
           $newPasswrod = Hash::make($request->password);
            $st=Admin::find($admin->id);
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
