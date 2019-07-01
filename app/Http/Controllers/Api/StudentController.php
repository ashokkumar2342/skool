<?php
namespace App\Http\Controllers\Api;
use App\Events\SmsEvent;
use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use App\Model\Category;
use App\Model\ClassType;
use App\Model\Gender;
use App\Model\Homework;
use App\Model\ParentRegistration;
use App\Model\Religion;
use App\Model\SessionDate;
use App\Model\StudentDefaultValue;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
class StudentController extends Controller
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
             $student =Student::find($id); 
             return response()->json($student);     
        } catch (Exception $e) {
           return $e; 
        }
       
    }

    public function image($id){ 
        try {
            $student =Student::find($id); 
            $img = Storage::disk('student')->get('profile/'.$student->picture); 
            return response($img)->header('Content-Type', 'image/jpeg');
        } catch (Exception $e) {
            return $e;
        }
       
    }
    public function Login(Request $request){ 
        try {  

            $student = Student::orWhere('email',$request->email)->orWhere('username',$request->email)->orWhere('father_mobile',$request->email)->first();
             if (!empty($student)) {
                 if (Hash::check($request->password, $student->password)) {
                     auth()->guard('student')->loginUsingId($student->id);
                     return $student;

                 } else {
                     return 'not Match';
                 }
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
            if (!empty($homework)) {
              return $homework;   
            }
             return response()->json(['data'=>'null','status'=>'Not Found']);  
        } catch (Exception $e) {
            return $e;
        }
       
    }
        
}