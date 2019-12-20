<?php

namespace App\Http\Controllers\Admin;

use App\Helper\MyFuncs;
use App\Http\Controllers\Controller;
use App\Model\AcademicYear;
use App\Model\Cashbook;
use App\Model\ClassFeeStructure;
use App\Model\ClassType;
use App\Model\Concession;
use App\Model\FeeStructure;
use App\Model\FeeStructureAmount;
use App\Model\FeeStructureLastDate;
use App\Model\Minu;
use App\Model\StudentAddressDetail;
use App\Model\StudentFeeDetail;
use App\Model\StudentPerentDetail;
use App\Student;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Middleware\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $classess = MyFuncs::getClassByHasUser();
        // $feeStructurLastDate = array_pluck(FeeStructureLastDate::get(['id','last_date'])->toArray(),'last_date', 'id'); 
        return view('admin.finance.student_fee_detail',compact('studentFeeDetails','acardemicYear','feeStructurLastDate','concession','classess'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request,$condition_id)
    {
      if ($request->id!=0) { 
       if ($condition_id==1) {
        $sections = MyFuncs::getSections($request->id); 
        return view('admin.finance.student_fee_detail_filter',compact('sections'));
       }
      }
     if ($request->section_id!=0) {  
      if ($condition_id==2) {
        $st =new Student();
        $students=$st->getStudentByClassSection($request->class_id,$request->section_id); 
        return view('admin.finance.student_fee_detail_student_select',compact('students'));
       }
     }
   }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=array(); 
        if ($request->academic_year_id!=null && $request->class_id!=null && $request->section_id!=null && $request->student_id!=null) { 
            $rules['academic_year_id']='required';
            $rules['class_id']='required';
            $rules['section_id']='required';
            $rules['student_id']='required';
            $datas=DB::select(DB::raw("call up_assign_fee_classwise ('$request->academic_year_id','$request->class_id','$request->section_id','$request->student_id')")); 
        }
        elseif ($request->academic_year_id!=null && $request->class_id!=null && $request->section_id!=null) { 
            $rules['academic_year_id']='required';
            $rules['class_id']='required';
            $rules['section_id']='required';
            $student_id='0';
            $datas=DB::select(DB::raw("call up_assign_fee_classwise ('$request->academic_year_id','$request->class_id','$request->section_id','$student_id')")); 
        }
        elseif ($request->academic_year_id!=null && $request->class_id!=null) { 
            $rules['academic_year_id']='required';
            $rules['class_id']='required';
            $student_id='0';
            $section_id='0';
            $datas=DB::select(DB::raw("call up_assign_fee_classwise ('$request->academic_year_id','$request->class_id','$section_id','$student_id')"));
             
        }
        elseif ($request->academic_year_id==null && $request->class_id==null) { 
            $rules['academic_year_id']='required';
            $rules['class_id']='required'; 
        }
        elseif ($request->class_id==null) { 
            $rules['class_id']='required'; 
        }
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
          $errors = $validator->errors()->all();
          $response=array();
          $response["status"]=0;
          $response["msg"]=$errors[0];
          return response()->json($response);// response as json
        } 
        $response = array();
        $response['status'] = 1; 
        $response['msg'] ='Fee Student Details Created Successfully'; 
          return $response; 
      
         
            
         
    } 

    public function feeassignlist(Request $request)
    {
                 
        $studentFeeDetails = StudentFeeDetail::latest('created_at')->paginate(20);        
        $students = array_pluck(Student::get(['id','registration_no'])->toArray(),'registration_no', 'id');
        $acardemicYear = array_pluck(AcademicYear::get(['id','name'])->toArray(), 'name', 'id');
        $concession = array_pluck(Concession::get(['id','name'])->toArray(), 'name', 'id');
        $classess = MyFuncs::getClasses();
        // $feeStructurLastDate = array_pluck(FeeStructureLastDate::get(['id','last_date'])->toArray(),'last_date', 'id'); 
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
    {   $stuents=Student::where('registration_no',$request->student_id)->first();
        if (empty($stuents)) {
          $response = array();
          $response['status']=0;
          $response['msg']='Registration No Invalid'; 
          return $response;  
        }
        $st=new Student();
        $student=$st->getStudentDetailsById($stuents->id);
        $studentFeeDetails=DB::select(DB::raw("call up_show_student_fee_detail ('$stuents->id','$request->academic_year_id')"));
        $menuPermission = Minu::find($menu_id);
        $response = array();
        $response['data'] = view('admin.finance.student_fee_assign_show',compact('studentFeeDetails','feeStructurLastDate','concession','student','menuPermission','fatherDetail','motherDetail','address'))->render();
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
    public function destroy($id)
    {
         $studentFeeDetail = StudentFeeDetail::find($id); 
         $studentFeeDetail->delete(); 
         $response['status'] =1;
                $response['msg'] ='Delete Successfully'; 
                return $response;
        
    }

    public function showFeeStructureModel(Request $request,$id)
    {
            $student =Student::find($id);
            $academicYears =AcademicYear::find($request->academic_year_id);
            $feeStructures =FeeStructure::all();
            $concession = array_pluck(Concession::get(['id','name'])->toArray(), 'name', 'id');
        return view('admin.finance.include.student_fee_struture_model',compact('student','feeStructures','academicYears','concession'));
    }
    public function showFeeStructureAmount(Request $request)
    {
        $FeeStructureAmount=FeeStructureAmount::where('fee_structure_id',$request->id)->first();
        return view('admin.finance.include.student_fee_struture_amount',compact('FeeStructureAmount'));
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

                 $datas=DB::select(DB::raw("call up_assign_fee_student_fee_structure ('$request->academic_year_id','$student_id','$request->fee_structure','$request->from_date','$request->to_date','$request->concession','$request->concession_amount')"));  
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
        $response['msg'] ='Update Successfully'; 
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
