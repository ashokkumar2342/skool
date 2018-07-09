<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\AcademicYear;
use App\Model\ClassFeestructure;
use App\Model\ClassType;
use App\Model\Concession;
use App\Model\FeeStructureLastDate;
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
        $validator = Validator::make($request->all(), [
        
            'to_date' => 'required', 
            'from_date' => 'required', 
            'academic_year_id' => 'required', 
            'class_id' => 'required', 
             
              
        ]);
        if ($validator->fails()) {                    
             return response()->json(['errors'=>$validator->errors()->all(),'class'=>'error']); 

        } 
        else {       
        
                $students = Student::where('class_id',$request->class_id)->get(['id','name','registration_no']);

                $classFeeStructures = ClassFeestructure::where('class_id',$request->class_id)->where('isapplicable_id',1)->get(['fee_structure_id']);  
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
                            }  
                        }
                      
                    }
                } 
               else{
                    return response()->json(['class'=>'success','message'=>'Student not found this class record']);
               }
            return response()->json(['class'=>'success','message'=>'Fee Student Details Created Successfully']);
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
    public function feeassignshow(Request $request,StudentFeeDetail $studentFeeDetail)
    {   
        $student = Student::find($request->student_id);
        $studentFeeDetails = StudentFeeDetail::where('student_id',$request->student_id)->get();  
        
        $concession = array_pluck(Concession::get(['id','name'])->toArray(), 'name', 'id');
         
        $feeStructurLastDate = array_pluck(FeeStructureLastDate::get(['id','last_date'])->toArray(),'last_date', 'id'); 
        return view('admin.finance.student_fee_assign_show',compact('studentFeeDetails','feeStructurLastDate','concession','student'));  
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

    
}
