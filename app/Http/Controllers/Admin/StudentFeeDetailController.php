<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\AcademicYear;
use App\Model\Cashbook;
use App\Model\ClassFeeStructure;
use App\Model\ClassType;
use App\Model\Concession;
use App\Model\FeeStructure;
use App\Model\FeeStructureLastDate;
use App\Model\Minu;
use App\Model\StudentFeeDetail;
use App\Student;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Middleware\Auth;
use Illuminate\Http\Request;
use Validator;
 
 
class StudentFeeDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $studentFeeDetails = StudentFeeDetail::latest('created_at')->paginate(20);        
        $acardemicYear = array_pluck(AcademicYear::get(['id','name'])->toArray(), 'name', 'id');
        $concession = array_pluck(Concession::get(['id','name'])->toArray(), 'name', 'id');
        $classess = array_pluck(ClassType::get(['id','name'])->toArray(), 'name', 'id');
        $feeStructurLastDate = array_pluck(FeeStructureLastDate::get(['id','last_date'])->toArray(),'last_date', 'id'); 
        return view('admin.finance.student_fee_detail',compact('studentFeeDetails','acardemicYear','feeStructurLastDate','concession','classess'));
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
            'to_date' => 'required', 
            'from_date' => 'required', 
            'academic_year_id' => 'required', 
            'class_id' => 'required', 
           
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
                $studentFeeDetail_id= array();
                $students = Student::where('class_id',$request->class_id)->get(['id','name','registration_no']);

                $classFeeStructures = ClassFeeStructure::where('class_id',$request->class_id)->where('isapplicable_id',1)->get(['fee_structure_id']);  
                if (!$students->isEmpty()) { 
                   foreach ($students as $student) {
                       
                       foreach ($classFeeStructures as $classFeeStructure) { 
                           $FeeStructureLastDates = FeeStructureLastDate::where('academic_year_id',$request->academic_year_id)->where('fee_structure_id',$classFeeStructure->fee_structure_id)->get();
                            foreach ($FeeStructureLastDates as $FeeStructureLastDate) {
                                $studentFeeDetail = StudentFeeDetail::firstOrNew(['student_id'=>$student->id,'fee_structure_last_date_id'=>$FeeStructureLastDate->id]);  
                                $studentFeeDetail->student_id = $student->id;
                                $studentFeeDetail->fee_structure_last_date_id = $FeeStructureLastDate->id;
                                $studentFeeDetail->concession_id = 0;
                                $studentFeeDetail->fee_amount = $FeeStructureLastDate->amount;
                                $studentFeeDetail->concession_amount = 0;
                                $studentFeeDetail->last_date = $FeeStructureLastDate->last_date ;
                                $studentFeeDetail->from_date = date('Y-m-d',strtotime($request->from_date));
                                $studentFeeDetail->to_date = date('Y-m-d',strtotime($request->to_date));
                                $studentFeeDetail->paid = 0;
                                $studentFeeDetail->refundable = 0;
                                $studentFeeDetail->save();  
                                $studentFeeDetail_id[].=$studentFeeDetail->id;
                            }  
                        }
                      
                    }
                } 
               else{
                    return response()->json(['class'=>'success','message'=>'Student not found this class record']);
               }
               
                $studentFeeDetails = StudentFeeDetail::whereIn('id',$studentFeeDetail_id)->get();
                $response =array();
                $response['status'] =1;
                $response['msg'] ='Fee Student Details Created Successfully';
               $response['data'] =view('admin.finance.include.student_fee_details_table',compact('studentFeeDetails'))->render();
                return $response;
            }  
    } 

    public function feeassignlist(Request $request)
    {
                 
        $studentFeeDetails = StudentFeeDetail::latest('created_at')->paginate(20);        
        $students = array_pluck(Student::get(['id','registration_no'])->toArray(),'registration_no', 'id');
        $acardemicYear = array_pluck(AcademicYear::get(['id','name'])->toArray(), 'name', 'id');
        $concession = array_pluck(Concession::get(['id','name'])->toArray(), 'name', 'id');
        $classess = array_pluck(ClassType::get(['id','name'])->toArray(), 'name', 'id');
        $feeStructurLastDate = array_pluck(FeeStructureLastDate::get(['id','last_date'])->toArray(),'last_date', 'id'); 
        return view('admin.finance.student_fee_assign',compact('studentFeeDetails','acardemicYear','feeStructurLastDate','concession','classess','students'));   
    }


    public function feeassignstore(Request $request)
    {
       $studentFeeDetails = StudentFeeDetail::where('student_id')->get();
       return $studentFeeDetails; 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\StudentFeeDetail  $studentFeeDetail
     * @return \Illuminate\Http\Response
     */
    public function feeassignshow(Request $request,$menu_id)
    {   
        $student = Student::find($request->student_id);
        $studentFeeDetails = StudentFeeDetail::where('student_id',$request->student_id)->get();  
        
        $concession = array_pluck(Concession::get(['id','name'])->toArray(), 'name', 'id');
         
        $feeStructurLastDate = array_pluck(FeeStructureLastDate::get(['id','last_date'])->toArray(),'last_date', 'id'); 
      $menuPermission = Minu::find($menu_id);
        $response = array();
        $response['data'] = view('admin.finance.student_fee_assign_show',compact('studentFeeDetails','feeStructurLastDate','concession','student','menuPermission'))->render();
        $response['status']=1;
        return $response;   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\StudentFeeDetail  $studentFeeDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentFeeDetail $studentFeeDetail)
    {
        //
    }
    public function assignstore(Request $request,StudentFeeDetail $studentFeeDetail)
    {
        dd($request->all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\StudentFeeDetail  $studentFeeDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentFeeDetail $studentFeeDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\StudentFeeDetail  $studentFeeDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentFeeDetail $studentFeeDetail)
    {
        return $studentFeeDetail;
    }

    public function showFeeStructureModel(Request $request,$id)
    {     
            $student =Student::find($id);
            $academicYears =AcademicYear::find($request->academic_year_id);
            $feeStructures =FeeStructure::all();
            $concession = array_pluck(Concession::get(['id','name'])->toArray(), 'name', 'id');
        return view('admin.finance.include.student_fee_struture_model',compact('student','feeStructures','academicYears','concession'));
    }

    //fee st details store
    public function feeStructureStore(Request $request,$student_id){
          
        $rules=[
            'to_date' => 'required', 
            'from_date' => 'required', 
            'fee_structure' => 'required',  
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
                 
                $student = Student::find($student_id);

                $classFeeStructures = ClassFeeStructure::where('class_id',$request->class_id)->where('isapplicable_id',1)->get(['fee_structure_id']); 
                       
                       $FeeStructureLastDates = FeeStructureLastDate::where('academic_year_id',$request->academic_year_id)->where('fee_structure_id',$request->fee_structure)->get();
                        foreach ($FeeStructureLastDates as $FeeStructureLastDate) {
                            $studentFeeDetail = StudentFeeDetail::firstOrNew(['student_id'=>$student->id,'fee_structure_last_date_id'=>$FeeStructureLastDate->id]);  
                            $studentFeeDetail->student_id = $student->id;
                            $studentFeeDetail->fee_structure_last_date_id = $FeeStructureLastDate->id;
                            $studentFeeDetail->concession_id = $request->concession;
                            $studentFeeDetail->fee_amount = $FeeStructureLastDate->amount;
                            $studentFeeDetail->concession_amount = $request->concession_amount;
                            $studentFeeDetail->last_date = $FeeStructureLastDate->last_date ;
                            $studentFeeDetail->from_date = date('Y-m-d',strtotime($request->from_date));
                            $studentFeeDetail->to_date = date('Y-m-d',strtotime($request->to_date));
                            $studentFeeDetail->paid = 0;
                            $studentFeeDetail->refundable = 0;
                            $studentFeeDetail->save();  
                            
                        }  
                $response['status'] =1;
                $response['msg'] ='Fee  Details Add Successfully'; 
                return $response;
            }  
    }

    public function showFeeDetailConcessionModel(Request $request,$id)
    {     
        $studentFeeDetail =StudentFeeDetail::find($id);   
         $concession = array_pluck(Concession::get(['id','name'])->toArray(), 'name', 'id');
        return view('admin.finance.include.student_fee_concession_edit_model',compact('studentFeeDetail','concession'));
    } 
    // fee concession store
     public function feeconcessioneStore(Request $request,$studentFeeDetail_id){
         
        $rules=[
            'concession' => 'required', 
            'concession_amount' => 'required', 
             
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
         $studentFeeDetail = StudentFeeDetail::find($studentFeeDetail_id); 
         $studentFeeDetail->concession_id = $request->concession; 
         $studentFeeDetail->concession_amount = $request->concession_amount; 
         $studentFeeDetail->save();   
        $response['status'] =1;
        $response['msg'] ='Fee  Details Add Successfully'; 
        return $response;
        }  
    }

    //previous Reciept Model show
    public function previousRecieptModel(Request $request)
    { 
        if ($request->student_id=='') {
            $datas = 'student_required';
           return view('admin.finance.feecollection.previous_reciept_show_model',compact('datas'));  
        }else{
            $datas = 'student_registration';
            $cashbooks = Cashbook::where('student_id',$request->student_id)->get(); 
            return view('admin.finance.feecollection.previous_reciept_show_model',compact('datas','cashbooks'));  
        }
         
        
    }
    
}
