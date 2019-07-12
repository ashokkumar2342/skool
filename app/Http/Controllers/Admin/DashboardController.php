<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Model\ClassType;
use App\Model\ParentRegistration;
use App\Model\StudentAttendance;
use App\Model\StudentFeeDetail;
use App\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Passport\createToken;

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
        $date = date('Y-m-d');
        $present = StudentAttendance::where('attendance_type_id',1)
                    ->Where('date',$date)
                    ->OrWhere('attendance_type_id',3)
                    ->OrWhere('attendance_type_id',4)->count();
        $absent = StudentAttendance::where('attendance_type_id',2) 
                    ->Where('date',$date)
                    ->count();
        
        $date = date('Y-m-d');
        $students = Student::where('status',1)->count();                        
        $newRegistraions = ParentRegistration::get();  
        $feeDues = StudentFeeDetail::where('paid',0)->get()->sum('fee_amount');                      
         $feePaid = StudentFeeDetail::where('paid',1)->get()->sum('fee_amount');
         $classTypes=ClassType::orderBy('id','ASC')->get();
        $students=Student::where('class_id',1)->get()->count(); 
        return view('admin/dashboard/dashboard',compact('students','present','absent','newRegistraions','feeDues','feePaid','classTypes','students'));
        
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
