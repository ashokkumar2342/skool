<?php

namespace App\Http\Controllers\Admin\Library;

use App\Http\Controllers\Controller;
use App\Student;
use Illuminate\Http\Request;

class MemberShipRegistrationController extends Controller
{
    public function index()
    {
    	 $students = Student::all();
    	 return view('admin.library.memberShipRegistration.view',compact('students'));
    }
}
