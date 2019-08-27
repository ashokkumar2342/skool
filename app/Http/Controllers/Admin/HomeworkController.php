<?php

namespace App\Http\Controllers\Admin;

use App\Events\SmsEvent;
use App\Http\Controllers\Controller;
use App\Model\ClassType;
use App\Model\Homework;
use App\Model\Sms\SmsTemplate;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
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
                    $response = array();
                    $response['status'] = 1;
                    $response['msg'] = "Homework Created Successfully";
                    return $response;
                }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Homework  $homework
     * @return \Illuminate\Http\Response
     */
    public function view(Homework $homework,$id)
    {
         $homework = Homework::find($id);
         return view('admin.homework.view',compact('homework'));
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
    public function destroy(Request $request,$id)
    {  
        $id =Crypt::decrypt($id);
        $homework = Homework::find($id);
        $homework->delete();
       return  redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);
    }
    public function sendHomework(Request $request)
    {
        
          $studentHomeworkSendSms=Student::whereIn('class_id',$request->class_id)->whereIn('section_id',$request->section_id)->get();
         foreach ($studentHomeworkSendSms as  $value) {
             
         $smsTemplate = SmsTemplate::where('id',3)->first();
        event(new SmsEvent($value->father_mobile,$smsTemplate->message)); 
         }
        $response=['status'=>1,'msg'=>'Message Sent successfully'];
            return response()->json($response); 
    }
}
