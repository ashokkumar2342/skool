<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\SiblingGroup;
use App\Model\StudentSiblingInfo;
use App\Model\StudentAddressDetail;
use App\Model\StudentPerentDetail;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
    public function addForm()
    {
         return view('admin.student.studentdetails.include.add_sibling_info');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Student $student)
    {
          
            $StudentPerentDetail = new StudentPerentDetail();
            $StudentAddressDetail = new StudentAddressDetail();
            $sibling_student = Student::where('registration_no',$request->student_sibling_id)->first();
            $arrayStudentIdSiblingIds=array(); 
            $arrayStudentIdSiblingIds=[$request->student_id,$sibling_student->id]; 
          

            $studentSiblingInfo=SiblingGroup::where('student_id',$request->student_id)->orWhere('student_id',$sibling_student->id)->first();

            $studentSiblingGropId=SiblingGroup::orderBy('group','DESC')->first();

            if ($studentSiblingGropId==null) {
               foreach ($arrayStudentIdSiblingIds as  $key => $arrayStudentIdSiblingId) {
                $sibling =SiblingGroup::firstOrNew(['student_id' =>  $arrayStudentIdSiblingId]);
                           $sibling->student_id = $arrayStudentIdSiblingId; 
                           $sibling->group =1; 
                           $sibling->save(); 
                    
                     }
            }else{
                foreach ($arrayStudentIdSiblingIds as  $key => $arrayStudentIdSiblingId) {
                $sibling =SiblingGroup::firstOrNew(['student_id' =>  $arrayStudentIdSiblingId]);
                           $sibling->student_id = $arrayStudentIdSiblingId;
                           if (!empty($studentSiblingInfo->student_id)) {
                             $sibling->group =$studentSiblingInfo->group;
                            } 
                            if (empty($studentSiblingInfo->student_id)) {
                             $sibling->group =$studentSiblingGropId->group+1;
                            }   
                           $sibling->save(); 
                    
                     }
            }
             
           
           $StudentPerentDetailArrId =$StudentPerentDetail->getParentArrId($request->student_id,$sibling_student->id);  
           $StudentAddressDetailArrId =$StudentAddressDetail->getAddressArrId($request->student_id,$sibling_student->id);  

        return response()->json(['message'=>'add success']);






     // $siblings =SiblingGroup::where('group',$request->student_id)->orWhere('student_id',$request->student_id)->get();

     // $sibling = new StudentSiblingInfo();
     //     $sibling->group = $sibling_student->id;
     //     $sibling->student_id = $request->student_id; 
     //     $sibling->save(); 
        
     //    foreach ($siblings as $key => $value) {
     //         $sibling->group = $sibling_student->id;
     //         $sibling->student_id = $request->student_id; 
     //         $sibling->save(); 
     //    }
        
      
 
        
 
    }

    // public function parentDetailsStore($parent_arr_id,$student_arr_id)
    // {
    //     foreach ($parent_arr_id as $key => $id) {
            
    //     }
    //     $studentParentDetails=StudentPerentDetail::firstOrNew(['relation_id' => $relation_id, 'student_id' => $student_id]);
    //     $studentParentDetails->student_id=$student_id; 
    //     $studentParentDetails->perent_info_id=$perent_info_id;
    //     $studentParentDetails->relation_id=$relation_id;
    //     $studentParentDetails->save();
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\StudentSiblingInfo  $studentSiblingInfo
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
         // $data1 = SiblingGroup::find(1)->siblings;
        
        $data2 = Student::find($student->id)->siblings;
         return $data2;
    }
    public function tableShow($student_id)
    { 
         $studentSibling=SiblingGroup::where('student_id',$student_id)->count();
         if ($studentSibling!=0) {
           $studentSiblingId=SiblingGroup::where('student_id',$student_id)->first();
         $studentSiblingIdFind=SiblingGroup::
                                                   where('group',$studentSiblingId->group)
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
    public function edit(Request $request,$student_id)
    {
         
        $stidents=Student::find($student_id);
        return  view('admin.student.studentdetails.include.sibling_info_edit',compact('stidents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\StudentSiblingInfo  $studentSiblingInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$student_id)
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
        else {
        $stidents=Student::find($student_id);
         $stidents->registration_no=$request->registration_no;
         $stidents->name=$request->name;
         $stidents->save();
        $response=['status'=>1,'msg'=>'Created Successfully'];
            return response()->json($response);
        } 
         
         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\StudentSiblingInfo  $studentSiblingInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$student_id)
    {
        
           $SiblingGroup=SiblingGroup::where('student_id',$student_id)->first();
           if ($SiblingGroup!=null) {
               $SiblingGroup->delete(); 
            }
            $StudentAddressDetail=StudentAddressDetail::where('student_id',$student_id)->first();
           if ($StudentAddressDetail!=null) { 
              $StudentAddressDetail->delete();
            }
            $StudentAddressDetails=StudentPerentDetail::where('student_id',$student_id)->get();     
            if($StudentAddressDetails!=null){
            foreach ($StudentAddressDetails as   $StudentAddressDetail) {
                  $StudentAddressDetail->delete();
              }  
            }
            
           $response=['status'=>1,'msg'=>'Delete Successfully'];
            return response()->json($response);

        

    }
}
