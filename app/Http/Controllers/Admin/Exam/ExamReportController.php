<?php

namespace App\Http\Controllers\Admin\Exam;

use App\Http\Controllers\Controller;
use App\Model\AcademicYear;
use App\Model\Exam\ClassTestDetail;
use Illuminate\Http\Request;

class ExamReportController extends Controller
{
    public function index($value='')
    {
    	$academicYears=AcademicYear::orderBy('id','ASC')->get();
    	return view('admin.exam.report.index',compact('academicYears'));
    }
    public function filter(Request $request)
    {
    	return $request;
    	 $classTestDetails=ClassTestDetail::all();
    	 return view('admin.exam.report.filter_table',compact('classTestDetails'));
    }
}
