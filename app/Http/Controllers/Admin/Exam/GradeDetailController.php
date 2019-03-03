<?php

namespace App\Http\Controllers\Admin\Exam;

use App\Http\Controllers\Controller;
use App\Model\ClassType;
use App\Model\Exam\ExamTerm;
use App\Model\Exam\GradeDetail;
use App\Model\SubjectType;
use App\Student;
use Illuminate\Http\Request;

class GradeDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $classes = array_pluck(ClassType::get(['id','alias'])->toArray(),'alias', 'id');
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
}
