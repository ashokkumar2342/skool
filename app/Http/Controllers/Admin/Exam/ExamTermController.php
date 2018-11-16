<?php

namespace App\Http\Controllers\Admin\Exam;

use App\Http\Controllers\Controller;
use App\Model\Exam\ExamTerm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class ExamTermController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $examTerms = ExamTerm::latest()->get();
        return view('admin.exam.exam_term',compact('examTerms'));
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
        'to_date' => 'required|max:30', 
        'from_date' => 'required|max:30', 
        'percentage' => 'required|max:30',  
        'discription' => 'nullable|string',
              
          
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
        if (!$file==null) {
           $file->store('public/class_test'); 
        }
        
        
        $examTerm = new ExamTerm();
        $examTerm->to_date = $request->to_date;
        $examTerm->from_date = $request->from_date;
        $examTerm->percentage_include_final_exam = $request->percentage; 
        $examTerm->discription = $request->discription; 
        $examTerm->save(); 
        $response = array();
        $response['msg'] = 'Submit Successfully';
        $response['status'] = 1;
        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Exam\ExamTerm  $examTerm
     * @return \Illuminate\Http\Response
     */
    public function show(ExamTerm $examTerm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Exam\ExamTerm  $examTerm
     * @return \Illuminate\Http\Response
     */
    public function edit(ExamTerm $examTerm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Exam\ExamTerm  $examTerm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExamTerm $examTerm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Exam\ExamTerm  $examTerm
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ExamTerm = ExamTerm::findOrFail(Crypt::decrypt($id));
        $ExamTerm->delete();
        return  redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);
    }
}
