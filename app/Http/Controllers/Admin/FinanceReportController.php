<?php

namespace App\Http\Controllers\Admin;

use App\Helper\MyFuncs;
use App\Helpers\MailHelper;
use App\Http\Controllers\Controller;
use App\Model\AcademicYear;
use App\Model\Cashbook;
use App\Model\ClassFeeStructure;
use App\Model\ClassType;
use App\Model\FeeStructure;
use App\Model\PaymentMode;
use App\Model\StudentFeeDetail;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use PDF;
class FinanceReportController extends Controller
{
  public function dateRange(Request $request)
  {
    $dateRange=$request->id;
     return view('admin.financeReport.date_range',compact('dateRange')); 
  }
   public function index($value='')
   {
    $paymentModes=PaymentMode::orderBy('id','ASC')->get();
    $cashbooks=Cashbook::orderBy('user_id','ASC')->distinct('user_id')->get(['user_id']);
    return view('admin.financeReport.view',compact('cashbooks','paymentModes'));
   }
   public function feeReport(Request $request)
   {

   	$reportWise=$request->id;

   	$registrations=Student::where('student_status_id',1)->get();
   	$classTypes=MyFuncs::getClassByHasUser();
    return view('admin.financeReport.fee_report' ,compact('classTypes','reportWise','registrations'));
   }
   public function feeReportShow(Request $request)
   {     
        $rules=array();  
        $date = date('Y-m-d',strtotime(date('Y-m-d') ."1 days"));
           $report_for='';
           $user_id='';
           $report_wise='';
           $weekMonthYear='';
          $paymentMode=$request->payment_mode;
           if ($request->has('report_for')) {
             $report_for = $request->report_for;
             if ($report_for==1) {
              $weekMonthYear=date('Y-m-d',strtotime($date ."-1 days")); 
             }elseif($report_for==2){
              $weekMonthYear=date('Y-m-d',strtotime($date ."-7 days")); 
             }elseif($report_for==3){
              $weekMonthYear=date('Y-m-d',strtotime($date ."-30 days")); 
             }elseif($report_for==4){
              $weekMonthYear=date('Y-m-d',strtotime($date ."-365 days")); 
             }elseif($report_for==5){
              $daterange  = explode('-',$request->daterange); 
              $weekMonthYear = date( 'Y-m-d', strtotime($daterange[0]));
              $date = date( 'Y-m-d', strtotime($daterange[1]));
             }
             
           }
          if ($request->has('user_id')) {
             $user_id = $request->user_id;
           }
          if ($request->has('report_wise')) {
             $report_wise = $request->report_wise;
           }
           
         
   	    if ($request->has('report_for') || $request->has('user_id') || $request->has('payment_mode') || $request->has('report_wise')) {  
            
            if ($request->report_for==$report_for && $request->has('user_id') && $request->report_wise==4 && $request->has('payment_mode')) { 
                $rules['class_id']='required';
                $rules['section_id']='required';
               $cashbooks = Cashbook::whereBetween('created_at', [$weekMonthYear,$date ])->where('user_id', $user_id)->where('class_id', $request->class_id)->where('section_id', $request->section_id)->where('payment_mode','like', '%'.$paymentMode.'%')->get();
             }elseif ($request->report_for==$report_for && $request->has('user_id') && $request->report_wise==4) {   
                $rules['class_id']='required';
                $rules['section_id']='required';
               $cashbooks = Cashbook::whereBetween('created_at', [$weekMonthYear,$date ])->where('user_id', $user_id)->where('class_id', $request->class_id)->where('section_id', $request->section_id)->get();
             } elseif ($request->report_for==$report_for && $request->has('user_id') && $request->report_wise==3) {   
                $rules['class_id']='required';
               $cashbooks = Cashbook::whereBetween('created_at', [$weekMonthYear,$date ])->where('user_id', $user_id)->where('class_id', $request->class_id)->where('payment_mode','like', '%'.$paymentMode.'%')->get();
             }elseif ($request->report_for==$report_for && $request->has('user_id') && $request->report_wise==2) { 
                $rules['registration_no']='required';
               $cashbooks = Cashbook::whereBetween('created_at', [$weekMonthYear,$date ])->where('user_id', $user_id)->where('student_id', $request->registration_no)->where('payment_mode','like', '%'.$paymentMode.'%')->get();
             }elseif ($request->report_for==$report_for && $request->has('user_id')) {
               $cashbooks = Cashbook::whereBetween('created_at', [$weekMonthYear,$date ])->where('user_id', $user_id)->where('payment_mode','like', '%'.$paymentMode.'%')->get();  
             }
             elseif ($request->report_for==$report_for && $request->report_for!='') { 
               $cashbooks = Cashbook::whereBetween('created_at', [$weekMonthYear,$date ])->where('payment_mode','like', '%'.$paymentMode.'%')->get();
             }
             elseif ($request->has('user_id')) {   
               $cashbooks = Cashbook::where('user_id', $user_id)->where('payment_mode','like', '%'.$paymentMode.'%')->get();
             }elseif ($request->has('payment_mode')) { 
               $cashbooks = Cashbook::where('payment_mode','like', '%'.$paymentMode.'%')->get();
             }elseif ($request->report_wise==1) { 
               
               $cashbooks = Cashbook::whereBetween('created_at', [$weekMonthYear,$date ])->where('payment_mode','like', '%'.$paymentMode.'%')->get();
             }elseif ($request->report_wise==2) { 
               $rules['registration_no']='required';
               $cashbooks = Cashbook::where('student_id', $request->registration_no)->where('payment_mode','like', '%'.$paymentMode.'%')->get();
             }elseif ($request->report_wise==3) {
               $rules['class_id']='required';
               $cashbooks = Cashbook::where('class_id', $request->class_id)->where('payment_mode','like', '%'.$paymentMode.'%')->get();
             }elseif ($request->report_wise==4) {  
               $rules['class_id']='required';
               $rules['section_id']='required';
               $cashbooks = Cashbook::where('class_id', $request->class_id)->where('section_id', $request->section_id)->where('payment_mode','like', '%'.$paymentMode.'%')->get();
             }
            
              
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
    $response['data'] =view('admin.financeReport.result' ,compact('cashbooks'))->render(); 
      return response()->json($response); 
   	  
   }
   public function feeDueReport($value='')
   {
     $academicYears=AcademicYear::orderBy('id','ASC')->get();
     return view('admin.financeReport.feeDue.view',compact('academicYears'));
   }
   public function feeDueReportShow(Request $request)
   {    

      $fromFullDate = StudentFeeDetail::whereMonth('last_date' , $request->month)->whereYear('last_date' , $request->year)->first()->from_date; 
       $lastFullDate = StudentFeeDetail::whereMonth('last_date' , $request->month)->whereYear('last_date' , $request->year)->first()->last_date;   
 
        $day =date('d',strtotime($lastFullDate));
        $toMonth= $request->month;
       // Specify the start date. This date can be any English textual format  
       $date_from = date('Y-m-d',strtotime($fromFullDate ."+9 days"));   

       $date_from = strtotime($date_from); // Convert date to a UNIX timestamp  
         
       // Specify the end date. This date can be any English textual format  
      $date_to =  $request->year.'-'.$request->month.'-'.$day;  
       $date_to = strtotime($date_to); // Convert date to a UNIX timestamp  
         $monthArr=array();
       // Loop from the start date to end date and output all dates inbetween  
       for ($i=$date_from; $i<=$date_to; $i+=2628000) {  
            $date_create=  date("Y", $i).'-'.date("m", $i).'-'.$day;  
            $monthArr[]=$date_create; 
       }
      $StudentFeeDetails = StudentFeeDetail::
                            join('fee_structure_last_dates', 'student_fee_details.fee_structure_last_date_id', '=', 'fee_structure_last_dates.id')
                            ->join('fee_structures', 'fee_structures.id', '=', 'fee_structure_last_dates.fee_structure_id') 
                            ->get(); 
            $FeeDetails=$StudentFeeDetails->whereIn('last_date',$monthArr)
                                  ->where('paid',0)->groupBy('name');
      $response = array();
      $response['status'] = 1; 
      $response['data'] =view('admin.financeReport.feeDue.show' ,compact('FeeDetails','siblings','request','student'))->render();
        return response()->json($response); 
   }
   public function feeDueReportReceipt(Request $request)
   {
       $student=Student::find($request->id);
       $studentFeeDetail=StudentFeeDetail::where('student_id',$request->id)->first();  
        $message = $studentFeeDetail;         
        $emailto = $student->email;         
        $subject = 'Fee Due Receipt'; 
        $up_u=array();
         
        $up_u['msg']=$message;
        $up_u['subject']=$subject; 
        $mailHelper =new MailHelper();
       
        $mailHelper->mailsend('emails.fee_due_receipt',$up_u,'No-Reply',$subject,$emailto,'noreply@domain.com',5);
        return redirect()->back()->with(['Message Sent successfully']);
        
    

   }

   //---------------new-admission-report--------------------------//////////
   public function adminssionReport()
   {
      return view('admin.financeReport.newAdmission.view');
   }
   public function adminssionReportShow(Request $request)
   {   
      if ($request->report_wise==1) {
          $students=Student::where('date_of_admission',date('Y-m-d'))->get();
     
      }
      if ($request->report_wise==3) {
          $students=Student::where('class_id',$request->class_id)->where('date_of_admission',date('Y-m-d'))->get();
     
      }
      if ($request->report_wise==4) {
          $students=Student::where('class_id',$request->class_id)->where('section_id',$request->section_id)->where('date_of_admission',date('Y-m-d'))->get(); 
      }
      $response = array();
                  $response['status'] = 1; 
                  $response['data'] =view('admin.financeReport.newAdmission.show' ,compact('students'))->render(); 
                    return response()->json($response); 
   }

   //--------------class-fee-structure-report-----------------------------------------
   public function classFeeStructureReport($condition_id)
   {
      $academicYears = AcademicYear::orderBy('start_date','DESC')->get();
      return  view('admin.financeReport.classFeeStructure.index' ,compact('academicYears','condition_id')); 
   }
   public function classFeeStructureReportShow(Request $request,$condition_id)
   {
      
      $pagebreak=$request->checked;
      if ($request->academic_year_id==null) {
       return ' Please Select Academic Year';
      }
      if ($condition_id=='fee_group') {
       $datas=DB::select(DB::raw("call up_report_feegroup_detail ('$request->academic_year_id')"));
      }else{
       $datas=DB::select(DB::raw("call up_report_class_feestructure ('$request->academic_year_id')")); 
     } 
      $classFeeStructureReports= collect($datas)->groupBy('class_id');
      $pdf=PDF::setOptions([
            'logOutputFile' => storage_path('logs/log.htm'),
            'tempDir' => storage_path('logs/')
        ])
        ->loadView('admin.financeReport.classFeeStructure.result' ,compact('classFeeStructureReports','pagebreak','condition_id'));
        return $pdf->stream('class_fee_structure.pdf');
      
      
   }
   //----------cloning-fee-all-details-------------------------------------------------------

   public function cloningFeeAllDetails()
   {
       $academicYears=AcademicYear::all();
       $classTypes=MyFuncs::getClassByHasUser();
      return  view('admin.financeReport.cloningfeealldetails.index' ,compact('academicYears','classTypes')); 
   }
   public function cloningFeeAllDetailsShow(Request $request)
   {
      $rules=array();
      $rules['reference_academic_year']='required';
      $rules['new_academic_year']='required';
      $rules['class_id']='required'; 
      $validator = Validator::make($request->all(),$rules);
      if ($validator->fails()) {
          $errors = $validator->errors()->all();
          $response=array();
          $response["status"]=0;
          $response["msg"]=$errors[0];
          return response()->json($response);// response as json
      }
      if ($request->reference_academic_year==$request->new_academic_year) {
        $response=array();
          $response["status"]=0;
          $response["msg"]='Please Select Difference Year';
          return response()->json($response);
      }
      $reference_academic_year=$request->reference_academic_year;
      $new_academic_year=$request->new_academic_year;
      $class_id=$request->class_id;
      $classFeeStructures=ClassFeeStructure::where('class_id',$request->class_id)->where('isapplicable_id',1)->orderBy('fee_structure_id','ASC')->get();
      $FeeStructures=FeeStructure::orderBy('code','ASC')->get();
      $response=array(); 
      $response['status']=1; 
      $response['data']=view('admin.financeReport.cloningfeealldetails.show' ,compact('classFeeStructures','FeeStructures','reference_academic_year','new_academic_year','class_id'))->render();  
      return  $response;
   }
   public function cloningFeeAllDetailsStore(Request $request)
   {
      $feestructureid=implode(',',$request->fee_structure_id); 
      DB::select(DB::raw("call up_clone_class_stu_fee_detail ('$request->reference_academic_year','$request->new_academic_year','$request->class_id','$feestructureid')"));
      $response=array(); 
      $response['status']=1; 
      $response['msg']='Cloning successfully';
      return  $response;
   }
}
