<?php

namespace App\Http\Controllers\Admin;

use App\Helper\MyFuncs;
use App\Http\Controllers\Controller;
use App\Model\CharCertIssueDetail;
use App\Model\Schoolinfo;
use App\Model\StudentSportHobby;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;

class StudentCertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regmaxlength=Schoolinfo::first();
        return view('admin.stucertificate.stucharcertificate',compact('regmaxlength'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showStudent(Request $request)
    {
        $student=Student::where('registration_no',$request->regsno)->first();
        if (empty($student->registration_no)) {
          $response=array();
          $response["status"]=0;
          $response["msg"]='Invalid Registration.No.';
          return response()->json($response);
         }
        $CharCertIssueDetails=CharCertIssueDetail::where('StudentInfoId',$student->id)->get();  
        $st=new Student();
        $studentdetail=$st->getStudentDetailsById($student->id); 
        $response = array();
        $response['status'] = 1;
        $response['data'] = view('admin.stucertificate.showstudent',compact('studentdetail','CharCertIssueDetails'))->render();
        return $response; 
       
    }

    public function addForm($student_id)
    {
     $classTypes=MyFuncs::getClassByHasUser();
     $student=Student::find($student_id);   
     $sportsActivityName=StudentSportHobby::where('student_id',$student_id)->first();
     
     return view('admin.stucertificate.stucharcertificate_add_form',compact('classTypes','sportsActivityName','student'));    
    } 
    public function store(Request $request)
    { 
        $rules=[
            
       ];

      $validator = Validator::make($request->all(),$rules);
      if ($validator->fails()) {
          $errors = $validator->errors()->all();
          $response=array();
          $response["status"]=0;
          $response["msg"]=$errors[0];
          return response()->json($response);// response as json
      }
        $user_id=Auth::guard('admin')->user();
        $CharCertIssueDetail=new CharCertIssueDetail();
        $CharCertIssueDetail->UserId=$user_id->id;
        $CharCertIssueDetail->StudentInfoId=$request->student_id;
        $CharCertIssueDetail->DOB=$request->dob;
        $CharCertIssueDetail->ClassPassed=$request->class_id;
        $CharCertIssueDetail->ExamRollNo=$request->Exam_Roll_No;
        $CharCertIssueDetail->ExamHeldOn=$request->Exam_Held_On;
        $CharCertIssueDetail->ExtraActivity=$request->Extra_Activity;
        $CharCertIssueDetail->CharacterType=$request->Character_Type;
        $CharCertIssueDetail->ApplicationDate=$request->Application_Date;
        // $CharCertIssueDetail->Issue_Date=$request->Issue_Date; 
        if ($request->hasFile('application_attach')) { 
                $application_attach=$request->application_attach;
                $filename='application_attach'.date('d-m-Y').'.pdf'; 
                $application_attach->storeAs('student/certificateissu/character/',$filename);
                $CharCertIssueDetail->application_attach=$filename;
      }
      $CharCertIssueDetail->save();
      $response=['status'=>1,'msg'=>'Submit Successfully'];
      return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $activity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activity $activity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity)
    {
        //
    }
}
