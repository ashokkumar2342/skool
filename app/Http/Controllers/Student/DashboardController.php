<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Model\StudentAttendance;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        $year = date('Y');
        $firstDay = date('d')-1;
       $sessionDate = date('Y-m-d',strtotime($year.'-04-01'));
        $monthOfFirstDate = date('Y-m-d',strtotime($date ."-".$firstDay." days"));
        $user_id = Auth::guard('student')->user()->id;
     
         $monthly=date('Y-m-d',strtotime($date ."-30 days"));
         $weekly=date('Y-m-d',strtotime($date ."-7 days")); 

         $monthlyPresent = StudentAttendance::where('attendance_type_id',1)
                    ->where('student_id', $user_id)
                    ->whereBetween('date', [$monthly, $date])
                    ->OrWhere('attendance_type_id',3)
                    ->OrWhere('attendance_type_id',4)->count();
        $monthlyAbsent = StudentAttendance::where('attendance_type_id',2) 
                    ->where('student_id', $user_id)
                    ->whereBetween('date', [$monthly, $date])
                    ->count();
        $weeklyPresent = StudentAttendance::where('attendance_type_id',1)
                    ->where('student_id', $user_id)
                    ->whereBetween('date', [$weekly, $date])
                    ->OrWhere('attendance_type_id',3)
                    ->OrWhere('attendance_type_id',4)->count();            
        $weeklyAbsent = StudentAttendance::where('attendance_type_id',2) 
                    ->where('student_id', $user_id)
                    ->whereBetween('date', [$weekly, $date])
                    ->count();
       $workingDays = StudentAttendance::where('student_id', $user_id)
                    ->whereBetween('date', [$monthOfFirstDate, $date])
                   ->count();
        $tillPresent = StudentAttendance::where('attendance_type_id',1)
                            ->where('student_id', $user_id)
                            ->whereBetween('date', [$sessionDate, $date])
                            ->OrWhere('attendance_type_id',3)
                            ->OrWhere('attendance_type_id',4)->count();
        $tillAbsent = StudentAttendance::where('attendance_type_id',2) 
                    ->where('student_id', $user_id)
                    ->whereBetween('date', [$sessionDate, $date])
                    ->count();
      
        $date = date('Y-m-d');
        $students = Student::where('status',1)->count();                        
        return view('student/dashboard',compact('students','monthlyPresent','monthlyAbsent','weeklyPresent','weeklyAbsent','workingDays','tillPresent','tillAbsent'));
        
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

    public function image($image){
        $img = Storage::disk('student')->get('profile/'.$image);
        return response($img);
    }

   
}
