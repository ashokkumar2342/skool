<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\StudentSiblingInfo;
use App\Student;
use Illuminate\Http\Request;

class StudentSiblingInfoController extends Controller
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
    public function store(Request $request, Student $student)
    {
          

            $sibling_student = Student::where('registration_no',$request->student_sibling_id)->first();
            $arrayStudentIdSiblingIds=array(); 
            $arrayStudentIdSiblingIds=[$request->student_id,$sibling_student->id]; 
            $studentSiblingInfo=StudentSiblingInfo::where('student_id',$request->student_id)->first();
            $studentSiblingGropId=StudentSiblingInfo::orderBy('student_sibling_id','DESC')->first();
            if ($studentSiblingGropId==null) {
               foreach ($arrayStudentIdSiblingIds as  $key => $arrayStudentIdSiblingId) {
                $sibling =StudentSiblingInfo::firstOrNew(['student_id' =>  $arrayStudentIdSiblingId]);
                           $sibling->student_id = $arrayStudentIdSiblingId; 
                           $sibling->student_sibling_id =1; 
                           $sibling->save(); 
                    
                     }
            }else{
                foreach ($arrayStudentIdSiblingIds as  $key => $arrayStudentIdSiblingId) {
                $sibling =StudentSiblingInfo::firstOrNew(['student_id' =>  $arrayStudentIdSiblingId]);
                           $sibling->student_id = $arrayStudentIdSiblingId;
                           if (!empty($studentSiblingInfo->student_id)) {
                             $sibling->student_sibling_id =$studentSiblingInfo->student_sibling_id;
                            } 
                            if (empty($studentSiblingInfo->student_id)) {
                             $sibling->student_sibling_id =$studentSiblingGropId->student_sibling_id+1;
                            }   
                           $sibling->save(); 
                    
                     }
            }
             
             

        return response()->json(['message'=>'add success']);






     // $siblings =StudentSiblingInfo::where('student_sibling_id',$request->student_id)->orWhere('student_id',$request->student_id)->get();

     // $sibling = new StudentSiblingInfo();
     //     $sibling->student_sibling_id = $sibling_student->id;
     //     $sibling->student_id = $request->student_id; 
     //     $sibling->save(); 
        
     //    foreach ($siblings as $key => $value) {
     //         $sibling->student_sibling_id = $sibling_student->id;
     //         $sibling->student_id = $request->student_id; 
     //         $sibling->save(); 
     //    }
        
      
 
        
 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\StudentSiblingInfo  $studentSiblingInfo
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
         // $data1 = StudentSiblingInfo::find(1)->siblings;
        
        $data2 = Student::find($student->id)->siblings;
         return $data2;
    }
    public function tableShow($student_id)
    { 
         $studentSibling=StudentSiblingInfo::where('student_id',$student_id)->count();
         if ($studentSibling!=0) {
           $studentSiblingId=StudentSiblingInfo::where('student_id',$student_id)->first();
         $studentSiblingIdFind=StudentSiblingInfo::
                                                   where('student_sibling_id',$studentSiblingId->student_sibling_id)
                                                 ->where('student_id','!=',$student_id)->get();
         }else{
            $studentSiblingIdFind=array();
         } 
        
        return view('admin.student.studentdetails.include.sibling_info_list',compact('studentSiblingIdFind'));                
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\StudentSiblingInfo  $studentSiblingInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, StudentSiblingInfo $studentSiblingInfo)
    {
         $siblingInfo = StudentSiblingInfo::where('id', $request->id)->get();
        return response()->json(['siblingInfo'=>$siblingInfo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\StudentSiblingInfo  $studentSiblingInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentSiblingInfo $studentSiblingInfo)
    {
         $sibling = StudentSiblingInfo::find($request->id);
          $sibling->student_sibling_id = $request->student_sibling_id;
        $sibling->student_id = $request->student_id;    
        $sibling->save();
        return response()->json([$sibling, 'message'=>'Update success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\StudentSiblingInfo  $studentSiblingInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, StudentSiblingInfo $studentSiblingInfo)
    {
        
          $sibling = StudentSiblingInfo::find($request->id);          

         $sibling->delete();

         return response()->json([$sibling, 'message'=>'Delete Succeefully']);
    }
}
