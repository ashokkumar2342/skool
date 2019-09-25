<?php

namespace App\Http\Controllers\Admin\Exam;

use App\Helper\MyFuncs;
use App\Http\Controllers\Controller;
use App\Model\ClassType;
use App\Model\Exam\ExamTerm;
use App\Model\Exam\Grade;
use App\Model\Exam\GradeDetail;
use App\Model\SubjectType;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PDF;
class GradeDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $classes = MyFuncs::getClasses();
        $subjects = array_pluck(SubjectType::get(['id','name'])->toArray(),'name', 'id');
        $students = array_pluck(Student::get(['id','registration_no'])->toArray(),'registration_no', 'id');
        $examTerms = ExamTerm::all();
        $gradeDetails = GradeDetail::all();
        return view('admin.exam.grade_details',compact('classes','subjects','examTerms','students','gradeDetails'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
        $gradeDetail = new GradeDetail();
        $gradeDetail->exam_schedule_id = $request->exam_term;
        $gradeDetail->student_id = $request->student_id;
        $gradeDetail->subject_id = $request->subject; 
        $gradeDetail->gradeobt = $request->gradeobt; 
        $gradeDetail->discription = $request->discription;
        
        $gradeDetail->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Exam\GradeDetail  $gradeDetail
     * @return \Illuminate\Http\Response
     */
    public function show(GradeDetail $gradeDetail)
    {
         
  

        


    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Exam\GradeDetail  $gradeDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(GradeDetail $gradeDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Exam\GradeDetail  $gradeDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GradeDetail $gradeDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Exam\GradeDetail  $gradeDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(GradeDetail $gradeDetail)
    {
        //
    }
    public function grade()
    {
        $grades=Grade::orderBy('id','DESC')->get();
         return view('admin.exam.grade',compact('grades'));
    }
    public function gradeStore(Request $request)
    {
        $rules=[
          
             
       
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
     
        $gradeDetail = new Grade();
        $gradeDetail->from_marks = $request->from_marks;
        $gradeDetail->to_marks = $request->to_marks;
        $gradeDetail->grade_short = $request->grade_short; 
        $gradeDetail->grade_full = $request->grade_full; 
        $gradeDetail->color = $request->color; 
        $gradeDetail->save();
        $response=['status'=>1,'msg'=>'Created Successfully'];
            return response()->json($response);
        } 
    }
     
}
