<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\ClassType;
use App\Model\Homework;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class HomeworkController extends Controller
{
    protected $rules =
       [
           'class' => 'required',
           'section' => 'required',
           'homework' => 'required|regex:/^[a-z ,.\'-]+$/i'
       ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = array_pluck(ClassType::get(['id','alias'])->toArray(),'alias', 'id');    
        $homeworks = Homework::latest('created_at')->paginate(10);

       return view('admin.homework.list',compact('classes','homeworks'));
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
        
        'homework_doc' => 'nullable|mimes:pdf|max:2048',
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $response=array();
            $response["status"]=0;
            $response["msg"]=$errors[0];
            return response()->json($response);// response as json
        }  else {
                    $homework = new Homework();
                    $homework->class_id = $request->class;
                    $homework->section_id = $request->section;
                    $homework->homework = $request->homework;
                    $homework->date = $request->date == null ? $request->date : date('Y-m-d',strtotime($request->date)); 
                     if ($request->file('homework_doc')!=null) {
                         $file = $request->file('homework_doc');
                         $file->store('public/homework');
                         $fileName = $file->hashName();
                        $homework->homework_doc=$fileName;
                    }
                    $homework->save();
                    return response()->json([$homework,'class'=>'success','message'=>'Homework Created Successfully']);
                }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Homework  $homework
     * @return \Illuminate\Http\Response
     */
    public function show(Homework $homework)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Homework  $homework
     * @return \Illuminate\Http\Response
     */
    public function edit(Homework $homework)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Homework  $homework
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Homework $homework)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Homework  $homework
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $homework = Homework::findOrFail($request->id)->first();
        $homework->delete();
        return  response()->json([$homework,'message'=>'Homework Delete Successfully','class'=>'success']);
    }
}
