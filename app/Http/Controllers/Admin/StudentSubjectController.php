<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\StudentSubject;
use App\Model\SubjectType;
use App\Model\Isoptional;
use Illuminate\Http\Request; 
use Validator;

class StudentSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$student_id)
    {  
       $studentSubjects=StudentSubject::where('student_id',$student_id)->get();
       return view('admin.student.studentdetails.include.subject_list',compact('studentSubjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addForm(Request $request,$student_id)
    {
        $student=$student_id;
         $subjectTypes=SubjectType::all();
         $isoptionals=Isoptional::all();
         return view('admin.student.studentdetails.include.add_subject',compact('subjectTypes','student','isoptionals'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $rules=[
             'subject' => 'required',
            'isoptional' => 'required',
        ];
         $validator = Validator::make($request->all(),$rules);
         if ($validator->fails()) {
             $errors = $validator->errors()->all();
             $response=array();
             $response["status"]=0;
             $response["msg"]=$errors[0];
             return response()->json($response);// response as json
         } 
         

            $studentSubject = StudentSubject::firstOrNew(['subject_type_id' => $request->subject, 'student_id' => $request->student_id]);
             $studentSubject->subject_type_id = $request->subject;
             $studentSubject->student_id = $request->student_id;
             $studentSubject->isoptional_id = $request->isoptional;
             $studentSubject->session_id = $request->session_id;
            
             $studentSubject->save();
              
             $response=['status'=>1,'msg'=>'Save Successfully'];
            return response()->json($response);
       

         
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\StudentSubject  $studentSubject
     * @return \Illuminate\Http\Response
     */
    public function show(StudentSubject $studentSubject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\StudentSubject  $studentSubject
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,StudentSubject $studentSubject)
    {
        $studentSubject = StudentSubject::where('id', $request->id)->get();
        return response()->json(['studentSubject'=>$studentSubject]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\StudentSubject  $studentSubject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentSubject $studentSubject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\StudentSubject  $studentSubject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        
        $studentSubject = StudentSubject::find($id);
        $studentSubject->delete();
        $response=['status'=>1,'msg'=>'Delete Succeefully'];
            return response()->json($response);

     
    }
}
