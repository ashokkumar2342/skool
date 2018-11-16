<?php

namespace App\Http\Controllers\Admin\Exam;

use App\Http\Controllers\Controller;
use App\Model\ClassType;
use App\Model\Exam\ExamSchedule;
use App\Model\Exam\ExamTerm;
use App\Model\SubjectType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ExamScheduleController extends Controller
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
        $examTerms = ExamTerm::all();
        $examSchedules = ExamSchedule::all();
        
        return view('admin.exam.exam_schedule',compact('classes','subjects','examTerms','examSchedules'));
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
         $rules=[
        'exam_term' => 'required|max:30', 
        'class' => 'required|max:30',  
        'subject' => 'required|max:30',  
        'on_date' => 'required|max:30',  
        'max_marks' => 'required|max:30',  
        'pass_marks' => 'required|max:30',  
        'fail_marks' => 'required|max:30',             
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $response=array();
            $response["status"]=0;
            $response["msg"]=$errors[0];
            return response()->json($response);// response as json
        } 
        $examSchedule = new ExamSchedule();
        $examSchedule->class_id = $request->class;
        $examSchedule->subject_id = $request->subject;
        $examSchedule->exam_term_id = $request->exam_term;
        $examSchedule->on_date = $request->on_date; 
        $examSchedule->max_marks = $request->max_marks;
        $examSchedule->pass_marks = $request->pass_marks;
        $examSchedule->fail_marks = $request->fail_marks; 
        $examSchedule->save(); 
        $response = array();
        $response['msg'] = 'Submit Successfully';
        $response['status'] = 1;
        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Exam\ExamSchedule  $examSchedule
     * @return \Illuminate\Http\Response
     */
    public function show(ExamSchedule $examSchedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Exam\ExamSchedule  $examSchedule
     * @return \Illuminate\Http\Response
     */
    public function edit(ExamSchedule $examSchedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Exam\ExamSchedule  $examSchedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExamSchedule $examSchedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Exam\ExamSchedule  $examSchedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExamSchedule $examSchedule)
    {
        //
    }
}
