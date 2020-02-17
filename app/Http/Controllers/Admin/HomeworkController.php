<?php

namespace App\Http\Controllers\Admin;

use App\Events\SmsEvent;
use App\Helper\MyFuncs;
use App\Http\Controllers\Controller;
use App\Model\ClassType;
use App\Model\Homework;
use App\Model\Sms\SmsTemplate;
use App\Model\StudentDefaultValue;
use App\Student;
use Auth;
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
        $classes = MyFuncs::getClasses();    
        $homeworks = Homework::where('date',date('Y-m-d'))->paginate(10);

       return view('admin.homework.list',compact('classes','homeworks'));
    }
    public function form()
    {
        $classTypes = MyFuncs::getClassByHasUser();    
        $homeworks = Homework::where('date',date('Y-m-d'))->paginate(10);

       return view('admin.homework.form',compact('classTypes','homeworks'));
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
        
        'class' => 'required',
        'section_id' => 'required',
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
                    $homework->section_id = $request->section_id;
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
    public function search(Request $request)
    {
        
       $classes = MyFuncs::getClasses();    
       $homeworks=Homework::where('date',date('Y-m-d',strtotime($request->date)))->get(); 
       return view('admin.homework.search',compact('classes','homeworks'));

    }
    public function sendHomework(Request $request)
    {
          $user_id=Auth::guard('admin')->user()->id;
          $st= new Student(); 
          $studentHomeworkSendSms=$st->getStudentByClassSectionArray($request->class_id,$request->section_id);
          $studentdefaultValue=StudentDefaultValue::where('user_id',$user_id)->first()->homework_message_id; 
         $smsTemplate = SmsTemplate::where('id',$studentdefaultValue)->first()->message;
         foreach ($studentHomeworkSendSms as  $value) {
           
         $findword = ["#SN#", "#FN#", "#MN#"];
         $replaceword   = [$value->name];

         $message = str_replace($findword, $replaceword, $smsTemplate);
         
        event(new SmsEvent($value->addressDetails->address->primary_mobile,$message)); 
         }
        $response=['status'=>1,'msg'=>'Message Sent successfully'];
            return response()->json($response); 
    }
    public function HomeworkSend(Request $request,$id)
    {
       $user_id=Auth::guard('admin')->user()->id;
         $homework = Homework::find($id);
         $st= new Student(); 
         $studentHomeworkSendSms=$st->getStudentByClassSection($homework->class_id,$homework->section_id); 
          $studentdefaultValue=StudentDefaultValue::where('user_id',$user_id)->first()->homework_message_id;
           $smsTemplate = SmsTemplate::where('id',$studentdefaultValue)->first()->message; 
        foreach ($studentHomeworkSendSms as  $value) { 
         $findword = ["#SN#", "#FN#", "#MN#"];
         $replaceword   = [$value->name]; 
         $message = str_replace($findword, $replaceword, $smsTemplate);
        event(new SmsEvent($value->addressDetails->address->primary_mobile,$message)); 
         }
         return  redirect()->back()->with(['message'=>'Send  Successfully','class'=>'success']);  
    }
}
