<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\BloodGroup;
use App\Model\Category;
use App\Model\ClassType;
use App\Model\DiscountType;
use App\Model\DocumentType;
use App\Model\Gender;
use App\Model\GuardianRelationType;
use App\Model\IncomeRange;
use App\Model\Isoptional;
use App\Model\ParentsInfo;
use App\Model\PaymentType;
use App\Model\Religion;
use App\Model\SessionDate;
use App\Model\StudentDefaultValue;
use App\Model\StudentFee;
use App\Model\StudentSubject;
use App\Model\Subject;
use App\Model\SubjectType;
use App\Model\StudentMedicalInfo;
use App\Student;
use Auth;
use Carbon;
use DB;
use Excel; 
use Illuminate\Support\Facades\Input;
use Storage;

class ReportController extends Controller
{
    public function index(){
    	$classes = array_pluck(ClassType::get(['id','alias'])->toArray(),'alias', 'id');    
        $sessions = array_pluck(SessionDate::get(['id','date'])->toArray(),'date', 'id');
        $genders = array_pluck(Gender::get(['id','genders'])->toArray(),'genders', 'id');
        $religions = array_pluck(Religion::get(['id','name'])->toArray(),'name', 'id');
        $categories = array_pluck(Category::get(['id','name'])->toArray(),'name', 'id');
        $bloodgroups = array_pluck(BloodGroup::get(['id','name'])->toArray(),'name', 'id');
    	return view('admin.report.form',compact('classes','sessions','default','genders','religions','categories','bloodgroups'));
    }

    public function reportfilter(Request $request){
    	 
    	if ($request->report_for == 1 && $request->school_class == 1 ) {
    	   $results = Student::
    	            Join('student_medical_infos', 'students.id', '=', 'student_medical_infos.student_id')    	             
    	            ->where('bloodgroup_id',$request->bloodgroup)
    	            ->get();
    	   return view('admin.report.result',compact('results'));
    	}
    	elseif ($request->report_for == 1 &&  $request->school_class == 2){ 
    		$results = Student::
    		            Join('student_medical_infos', 'students.id', '=', 'student_medical_infos.student_id')
    		            ->where('class_id',$request->class)
    		            ->where('section_id',$request->section)
    		            ->where('bloodgroup_id',$request->bloodgroup)    		             
    		            ->get();
    		            
    		return view('admin.report.result',compact('results'));  
    	}    	
    	elseif ($request->report_for == 2 && $request->school_class == 1){       
    		$results = Student::where('category_id',$request->category)->get();
                   return view('admin.report.result',compact('results'));
    	}
        elseif ($request->report_for == 2 &&  $request->school_class == 2){ 
            $results = Student::where(['class_id'=>$request->class,'section_id'=>$request->section])->where('category_id',$request->category)->get();
                   return view('admin.report.result',compact('results'));
                        
            return view('admin.report.result',compact('results'));  
        }
        elseif ($request->report_for == 3 && $request->school_class == 1){       
            $results = Student::where('religion_id',$request->religion)->get();
                   return view('admin.report.result',compact('results'));
        }
        elseif ($request->report_for == 3 &&  $request->school_class == 2){ 
            $results = Student::where(['class_id'=>$request->class,'section_id'=>$request->section])->where('religion_id',$request->religion)->get();
                   return view('admin.report.result',compact('results'));
                        
            return view('admin.report.result',compact('results'));  
        }
        elseif ($request->report_for == 4 && $request->school_class == 1){       
            $results = Student::where('gender_id',$request->gender)->get();
                   return view('admin.report.result',compact('results'));
        }
        elseif ($request->report_for == 4 &&  $request->school_class == 2){ 
            $results = Student::where(['class_id'=>$request->class,'section_id'=>$request->section])->where('gender_id',$request->gender)->get();
                   return view('admin.report.result',compact('results'));
                        
            return view('admin.report.result',compact('results'));  
        }
    	 else{
    	 	return redirect()->route('admin.student.report');
    	 }
    }
}
