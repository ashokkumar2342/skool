<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\StudentSubject;
use Validator;
use Illuminate\Http\Request;

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
         
        $validator = Validator::make($request->all(), [
            'subject_type_id' => 'required',
            'student_id' => 'required',
            'session_id' => 'required',
            
        ]);

        if ($validator->passes()) {

            $studentSubject = StudentSubject::firstOrNew(['subject_type_id' => $request->subject_type_id, 'student_id' => $request->student_id]);
             $studentSubject->subject_type_id = $request->subject_type_id;
             $studentSubject->student_id = $request->student_id;
             $studentSubject->isoptional_id = $request->isoptional_id;
             $studentSubject->session_id = $request->session_id;
            
             $studentSubject->save();
              
             return response()->json([$studentSubject, 'message'=>'add success','class'=>'success']);
        }

        return response()->json(['message'=>$validator->errors()->all(),'class'=>'error']);
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
