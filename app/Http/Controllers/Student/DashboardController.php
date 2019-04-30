<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Model\StudentAttendance;
use App\Student;
use Illuminate\Http\Request;

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
        return view('student/dashboard',compact('students','present','absent'));
        
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

   
}
