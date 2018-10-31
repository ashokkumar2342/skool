<?php

namespace App\Http\Controllers\Admin\Exam;

use App\Http\Controllers\Controller;
use App\Model\ClassType;
use App\Model\Exam\ClassTest;
use App\Model\SubjectType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class ClassTestController extends Controller
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
        $classTests = ClassTest::All();
        return view('admin.exam.class_test',compact('classes','subjects','classTests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
        'class' => 'required|max:30', 
        'section' => 'required|max:30', 
        'test_date' => 'required|max:30', 
        'max_marks' => 'required|max:10', 
        'highest_marks' => 'required|max:10', 
        'avg_marks' => 'required|max:10', 
        'sylabus' => 'nullable|mimes:pdf|max:2048',
              
          
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $response=array();
            $response["status"]=0;
            $response["msg"]=$errors[0];
            return response()->json($response);// response as json
        }
        $file = $request->file('sylabus');

        $file->store('public/class_test');
  
        $classTest = new ClassTest();
        $classTest->class_id = $request->class;
        $classTest->section_id = $request->section;
        $classTest->test_date = $request->test_date;
        $classTest->highest_marks = $request->highest_marks;
        $classTest->max_marks = $request->max_marks;
        $classTest->subject_id = $request->subject;
        $classTest->avg_marks = $request->avg_marks;
        $classTest->is_include_term_exam = 1;
        $classTest->sylabus = $file->hashName();
        $classTest->save();

        $response = array();
        $response['msg'] = 'Submit Successfully';
        $response['status'] = 1;
        return response()->json($response);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Exam\ClassTest  $classTest
     * @return \Illuminate\Http\Response
     */
    public function show(ClassTest $classTest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Exam\ClassTest  $classTest
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassTest $classTest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Exam\ClassTest  $classTest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClassTest $classTest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Exam\ClassTest  $classTest
     * @return \Illuminate\Http\Response
     */
   public function destroy($id)
   {

       $ClassTest = ClassTest::findOrFail(Crypt::decrypt($id));
       $ClassTest->delete();
       return  redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);
   }
}
