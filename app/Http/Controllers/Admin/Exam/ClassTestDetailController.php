<?php

namespace App\Http\Controllers\Admin\Exam;

use App\Http\Controllers\Controller;
use App\Model\Exam\ClassTest;
use App\Model\Exam\ClassTestDetail;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class ClassTestDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classTests = ClassTest::all();
        $students = Student::all();
        $classTestDetails = ClassTestDetail::all();         
        return view('admin.exam.class_test_details',compact('classTestDetails','students','classTests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchStudent(Request $request)
    {
         $classTest = CLassTest::find($request->class_test_id);
         $classTestDetails = ClassTestDetail::where('class_test_id',$request->class_test_id)->get();
         $students = Student::where('class_id',$classTest->class_id)->where('section_id',$classTest->section_id)->get();
         return view('admin.exam.student_details',compact('students','classTest','classTestDetails'))->render();
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
        'class_test_id' => 'required|max:30', 
        'student_id' => 'required|max:30', 
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
          $classTestDetail = ClassTestDetail::firstOrNew(['student_id'=>$value,'class_test_id'=>$request->class_test_id[$key]]);
          $classTestDetail->class_test_id = $request->class_test_id[$key];
          $classTestDetail->student_id = $value;
          $classTestDetail->marksobt = $request->marksobt[$key];     
          $classTestDetail->any_remarks = $request->any_remarks[$key]; 
          $classTestDetail->save();      
        }  
        
        $response = array();
        $response['msg'] = 'Submit Successfully';
        $response['status'] = 1;
        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Exam\ClassTestDetail  $classTestDetail
     * @return \Illuminate\Http\Response
     */
    public function show(ClassTestDetail $classTestDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Exam\ClassTestDetail  $classTestDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassTestDetail $classTestDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Exam\ClassTestDetail  $classTestDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClassTestDetail $classTestDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Exam\ClassTestDetail  $classTestDetail
     * @return \Illuminate\Http\Response
     */
   public function destroy($id)
   { 
       $ClassTestDetail = ClassTestDetail::findOrFail(Crypt::decrypt($id));
       $ClassTestDetail->delete();
       return  redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);
   }
}
