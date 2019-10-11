<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\StudentSubject;
use Illuminate\Http\Request; 
use Validator;

class StudentSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
             'subject_type_id' => 'required',
            'student_id' => 'required',
        ];
         $validator = Validator::make($request->all(),$rules);
         if ($validator->fails()) {
             $errors = $validator->errors()->all();
             $response=array();
             $response["status"]=0;
             $response["msg"]=$errors[0];
             return response()->json($response);// response as json
         } 
         

            $studentSubject = StudentSubject::firstOrNew(['subject_type_id' => $request->subject_type_id, 'student_id' => $request->student_id]);
             $studentSubject->subject_type_id = $request->subject_type_id;
             $studentSubject->student_id = $request->student_id;
             $studentSubject->isoptional_id = $request->isoptional_id;
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
    public function destroy(Request $request, StudentSubject $studentSubject)
    {
        
        $studentSubject = StudentSubject::find($request->id);
        $studentSubject->delete();

    return response()->json([$studentSubject, 'message'=>'Delete Succeefully','class'=>'success']);
    }
}
