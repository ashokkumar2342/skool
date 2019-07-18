<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\StudentMedicalInfo;
use Illuminate\Http\Request;
use App\Helper\MyFuncs;
use App\Model\BloodGroup;
use App\Model\Category;
use App\Model\ClassType;
use App\Model\DiscountType;
use App\Model\Document;
use App\Model\DocumentType;
use App\Model\Gender;
use App\Model\GuardianRelationType;
use App\Model\IncomeRange;
use App\Model\Isoptional;
use App\Model\Minu;
use App\Model\ParentsInfo;
use App\Model\PaymentType;
use App\Model\Profession;
use App\Model\Religion;
use App\Model\SessionDate;
use App\Model\StudentDefaultValue;
use App\Model\StudentFee;
use App\Student;
use App\Model\StudentSubject;
use App\Model\Subject;
use App\Model\SubjectType;
use Illuminate\Support\Facades\Validator;
 

class StudentMedicalInfoController extends Controller
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
          
            'ondate' => 'required', 
            'hb' => 'numeric|max:20', 
            'height' => 'required', 
            'weight' => 'required', 
            'vision' => 'required', 
            'bloodgroup_id' => 'required', 
            'id_marks1' => 'required', 
       
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $response=array();
            $response["status"]=0;
            $response["msg"]=$errors[0];
            return response()->json($response);// response as json
        }
        else {
        $medical = new StudentMedicalInfo();
        $medical->alergey = $request->alergey;
        $medical->alergey_vacc = $request->alergey_vacc;
        $medical->bp_lower = $request->bp_lower;
        $medical->bp_uper = $request->bp_uper;
        $medical->bloodgroup_id = $request->bloodgroup_id;
        $medical->complextion = $request->complextion;
        $medical->dental = $request->dental;
        $medical->hb = $request->hb;
        $medical->height = $request->height;
        $medical->id_marks1 = $request->id_marks1;
        $medical->id_marks2 = $request->id_marks2;
        $medical->narration = $request->narration;
        $medical->ondate = $request->ondate == null ? $request->ondate : date('Y-m-d',strtotime($request->ondate));
        $medical->physical_handicapped = $request->physical_handicapped;
        $medical->student_id = $request->student_id;
        $medical->vision = $request->vision;
        $medical->weight = $request->weight;
        
       $medical->save();
        $response=['status'=>1,'msg'=>'Created Successfully'];
            return response()->json($response);
        }  

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\StudentMedicalInfo  $studentMedicalInfo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {    
         $studentMedicalInfo=StudentMedicalInfo::find($id);
        return view('admin.student.studentdetails.include.medical_info_view',compact('studentMedicalInfo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\StudentMedicalInfo  $studentMedicalInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $medicalInfo = StudentMedicalInfo::find($id);
         $student=$request->id; 
         $parentsType = array_pluck(GuardianRelationType::get(['id','name'])->toArray(),'name','id');
        $incomes = array_pluck(IncomeRange::get(['id','range'])->toArray(),'range', 'id');
        $documentTypes = array_pluck(DocumentType::get(['id','name'])->toArray(),'name', 'id');
        $subjectTypes = array_pluck(SubjectType::get(['id','name'])->toArray(),'name', 'id');
        $sessions = array_pluck(SessionDate::get(['id','date'])->toArray(),'date', 'id');
        $isoptionals = array_pluck(Isoptional::get(['id','name'])->toArray(),'name', 'id');
        $bloodgroups = array_pluck(BloodGroup::get(['id','name'])->toArray(),'name', 'id');
        $professions = array_pluck(Profession::get(['id','name'])->toArray(),'name', 'id'); 
       return view('admin.student.studentdetails.include.medical_info_edit',compact('student','parentsType','incomes','documentTypes','isoptionals','sessions','subjectTypes','bloodgroups','professions','medicalInfo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\StudentMedicalInfo  $studentMedicalInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {  
        $rules=[
          
            'ondate' => 'required', 
            'hb' => 'numeric|max:20', 
            'height' => 'required', 
            'weight' => 'required', 
            'vision' => 'required', 
            'bloodgroup_id' => 'required', 
            'id_marks1' => 'required', 
       
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $response=array();
            $response["status"]=0;
            $response["msg"]=$errors[0];
            return response()->json($response);// response as json
        }
        else {
        $medical =StudentMedicalInfo::find($id);
        $medical->alergey = $request->alergey;
        $medical->alergey_vacc = $request->alergey_vacc;
        $medical->bp_lower = $request->bp_lower;
        $medical->bp_uper = $request->bp_uper;
        $medical->bloodgroup_id = $request->bloodgroup_id;
        $medical->complextion = $request->complextion;
        $medical->dental = $request->dental;
        $medical->hb = $request->hb;
        $medical->height = $request->height;
        $medical->id_marks1 = $request->id_marks1;
        $medical->id_marks2 = $request->id_marks2;
        $medical->narration = $request->narration;
        $medical->ondate = $request->ondate == null ? $request->ondate : date('Y-m-d',strtotime($request->ondate));
        $medical->physical_handicapped = $request->physical_handicapped;
        
        $medical->vision = $request->vision;
        $medical->weight = $request->weight;
        
       $medical->save();
        $response=['status'=>1,'msg'=>'Update Successfully'];
            return response()->json($response);
        }  

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\StudentMedicalInfo  $studentMedicalInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
          $medicalInfo = StudentMedicalInfo::find($id);
           

         $medicalInfo->delete();

         
        $response=['status'=>1,'msg'=>'Update Successfully'];
            return response()->json($response);
    }
    public function medicalInfoAddForm(Request $request){
         $student=$request->id; 
         $parentsType = array_pluck(GuardianRelationType::get(['id','name'])->toArray(),'name','id');
        $incomes = array_pluck(IncomeRange::get(['id','range'])->toArray(),'range', 'id');
        $documentTypes = array_pluck(DocumentType::get(['id','name'])->toArray(),'name', 'id');
        $subjectTypes = array_pluck(SubjectType::get(['id','name'])->toArray(),'name', 'id');
        $sessions = array_pluck(SessionDate::get(['id','date'])->toArray(),'date', 'id');
        $isoptionals = array_pluck(Isoptional::get(['id','name'])->toArray(),'name', 'id');
        $bloodgroups = array_pluck(BloodGroup::get(['id','name'])->toArray(),'name', 'id');
        $professions = array_pluck(Profession::get(['id','name'])->toArray(),'name', 'id'); 
         
        return view('admin.student.studentdetails.include.add_medical_info',compact('student','parentsType','incomes','documentTypes','isoptionals','sessions','subjectTypes','bloodgroups','professions'));
    }
    public function medicalInfoList(Request $request){ 
         $parentsType = array_pluck(GuardianRelationType::get(['id','name'])->toArray(),'name','id');
        $incomes = array_pluck(IncomeRange::get(['id','range'])->toArray(),'range', 'id');
        $documentTypes = array_pluck(DocumentType::get(['id','name'])->toArray(),'name', 'id');
        $subjectTypes = array_pluck(SubjectType::get(['id','name'])->toArray(),'name', 'id');
        $sessions = array_pluck(SessionDate::get(['id','date'])->toArray(),'date', 'id');
        $isoptionals = array_pluck(Isoptional::get(['id','name'])->toArray(),'name', 'id');
        $bloodgroups = array_pluck(BloodGroup::get(['id','name'])->toArray(),'name', 'id');
        $professions = array_pluck(Profession::get(['id','name'])->toArray(),'name', 'id'); 
        $student=$request->id; 
        return view('admin.student.studentdetails.include.medical_info_list',compact('student','parentsType','incomes','documentTypes','isoptionals','sessions','subjectTypes','bloodgroups','professions'));

    }
}
