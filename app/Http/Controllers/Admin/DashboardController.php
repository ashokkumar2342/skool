<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Model\ClassType;
use App\Model\StudentAttendance;
use App\Student;
use App\User;
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
        $newRegistraions = User::get();                        
        return view('admin/dashboard/dashboard',compact('students','present','absent','newRegistraions'));
        
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

   
}
