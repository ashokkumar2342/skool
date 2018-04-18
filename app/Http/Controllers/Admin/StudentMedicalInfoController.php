<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\StudentMedicalInfo;
use Illuminate\Http\Request;
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
         $validator = Validator::make($request->all(), [
             
            'ondate' => 'required', 
            'hb' => 'numeric|max:20', 
            'height' => 'numeric', 
            'weight' => 'numeric', 
            'vision' => 'numeric', 
             
           
              
        ]);

        if ($validator->passes()) {

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
        return response()->json([$medical, 'message'=>'add success','class'=>'success']);
          }

        return response()->json(['message'=>$validator->errors()->all(),'class'=>'error']); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\StudentMedicalInfo  $studentMedicalInfo
     * @return \Illuminate\Http\Response
     */
    public function show(StudentMedicalInfo $studentMedicalInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\StudentMedicalInfo  $studentMedicalInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, StudentMedicalInfo $studentMedicalInfo)
    {
        $medicalInfo = StudentMedicalInfo::where('id', $request->id)->get();
        return response()->json(['medicalInfo'=>$medicalInfo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\StudentMedicalInfo  $studentMedicalInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentMedicalInfo $studentMedicalInfo)
    {    
        $medical = StudentMedicalInfo::find($request->id);
        $medical->alergey = $request->alergey;
        $medical->alergey_vacc = $request->alergey_vacc;
        $medical->bp_uper = $request->bp_uper;
        $medical->bp_lower = $request->bp_lower;
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
        return response()->json([$medical, 'message'=>'Update success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\StudentMedicalInfo  $studentMedicalInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, StudentMedicalInfo $studentMedicalInfo)
    {
          $medicalInfo = StudentMedicalInfo::find($request->id);
           

         $medicalInfo->delete();

         return response()->json([$medicalInfo, 'message'=>'Delete Succeefully','class'=>'success']);
    }
}
