<?php

namespace App\Http\Controllers\Admin\Exam;

use App\Http\Controllers\Controller;
use App\Model\Exam\ExamSchedule;
use App\Model\Exam\MarkDetail;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MarkDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $markDetails = MarkDetail::all();
        $students = Student::all();
        $examSchedules = ExamSchedule::all();         
        return view('admin.exam.marks_details',compact('markDetails','students','examSchedules'));
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

    public function searchStudent(Request $request)
    {   
       $examSchedule = ExamSchedule::find($request->exam_schedule);
        $marksDetails = MarkDetail::where('exam_schedule_id',$request->exam_schedule)->get();
         $students = Student::where('class_id',$examSchedule->class_id)->get();
         return view('admin.exam.student_marks_details',compact('students','examSchedule','marksDetails'))->render();
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
        'student_id' => 'nullable|max:30', 
        'marksobt' => 'required|max:30',  
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $response=array();
            $response["status"]=0;
            $response["msg"]=$errors[0];
            return response()->json($response);// response as json
        }
        foreach ($request->student_id as $key => $value) {
          $marksDetail = MarkDetail::firstOrNew(['student_id'=>$value,'exam_schedule_id'=>$request->exam_schedule_id[$key]]);
          $marksDetail->exam_schedule_id = $request->exam_schedule_id[$key];
          $marksDetail->student_id = $value;
          $marksDetail->marksobt = $request->marksobt[$key];     
          $marksDetail->discription = $request->any_remarks[$key]; 
          $marksDetail->save();      
        }  
        
        $response = array();
        $response['msg'] = 'Submit Successfully';
        $response['status'] = 1;
        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Exam\MarkDetail  $markDetail
     * @return \Illuminate\Http\Response
     */
    public function show(MarkDetail $markDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Exam\MarkDetail  $markDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(MarkDetail $markDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Exam\MarkDetail  $markDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MarkDetail $markDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Exam\MarkDetail  $markDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(MarkDetail $markDetail)
    {
        //
    }
}
