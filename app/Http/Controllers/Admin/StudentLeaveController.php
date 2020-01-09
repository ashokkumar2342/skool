<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\AcademicYear;
use App\Model\LeaveRecord;
use App\Model\leaveTypeStudent;
use App\Student;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentLeaveController extends Controller
{
   public function index()
   {

     $student=new Student();
     $students=$student->getAllStudents();
       $academicYears=AcademicYear::orderBy('id','ASC')->get();
       $leaveTypes=LeaveTypeStudent::orderBy('name','ASC')->get();
   	 return view('admin.attendance.leave.index',compact('students','leaveTypes','academicYears','leaveRecord'));
   } 
   public function show(Request $request)
   {   
     $leaveRecords=LeaveRecord::where('student_id',$request->id)->orderBy('apply_date','ASC')->get();
   	 return view('admin.attendance.leave.list',compact('leaveRecords'));
   }
   public function leaveApply($id=null)
   {
    if ($id!=null) {
      $leaveRecord=LeaveRecord::find($id);
    }
    if ($id==null) {
      $leaveRecord='';
    }
   	 $student=new Student();
   	 $students=$student->getAllStudents();
       $academicYears=AcademicYear::orderBy('id','ASC')->get();
       $leaveTypes=LeaveTypeStudent::orderBy('name','ASC')->get();
   	 return view('admin.attendance.leave.apply_form',compact('students','leaveTypes','academicYears','leaveRecord'));
   }
   public function store(Request $request ,$id=null)
   {
       $rules=[
        
             
            'year_id' => 'required', 
            'leave_id' => 'required', 
            'student_id' => 'required', 
            'apply_date' => 'required', 
            'from_date' => 'required', 
            'to_date' => 'required', 
           
       
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
       $leaveType= LeaveRecord::firstOrNew(['id'=>$id]);
       $leaveType->year_id=$request->year_id;
       $leaveType->leave_id=$request->leave_id;
       $leaveType->student_id=$request->student_id;
       $leaveType->apply_date=date('Y-m-d',strtotime($request->apply_date));
       $leaveType->from_date=$request->from_date;
       $leaveType->to_date=$request->to_date;
       $leaveType->remark=$request->remark;
       $leaveType->status=0;
       if ($request->hasFile('attachment')) { 
                $attachment=$request->attachment;
                $filename=$request->student_id.'attech'.date('d-m-Y').time().'.pdf'; 
                $attachment->storeAs('student/leave/',$filename);
                $leaveType->attachment=$filename; 
                $leaveType->save();
                $response=['status'=>1,'msg'=>'Created Successfully'];
                return response()->json($response);
        } 

      }
      $leaveType->save();
                $response=['status'=>1,'msg'=>'Created Successfully'];
                return response()->json($response);
   }


  public function destroy($id)
  {
        $documentUrl = Storage_path() . '/app/student/leave/'.$id; 
        return response()->file($documentUrl); 
  }

   //----------------leave-type-----------------------------//

   public function LeaveType($value='')
   {
       $leaveTypes=LeaveTypeStudent::orderBy('name','ASC')->get();
      return view('admin.attendance.LeaveType.index',compact('leaveTypes'));
   }public function AddForm($id=null)
   {
      if ($id!=null) {
         $leaveType=LeaveTypeStudent::find($id);
      }
      if ($id==null) {
         $leaveType='';
      }
      return view('admin.attendance.LeaveType.add_form',compact('leaveType'));
   }
   public function leaveTypeStore(Request $request,$id=null)
   {

      $rules=[
        
            'name' => 'required|max:50|unique:leave_type_student,name,'.$id, 
            'leave_code' => 'required|max:50|unique:leave_type_student,leave_code,'.$id, 
            'total_days' => 'required', 
           
       
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
       $leaveType=leaveTypeStudent::firstOrNew(['id'=>$id]);
       $leaveType->name=$request->name;
       $leaveType->leave_code=$request->leave_code;
       $leaveType->total_days=$request->total_days;
       $leaveType->save();
      $response=['status'=>1,'msg'=>'Created Successfully'];
            return response()->json($response);
        } 
       
   }
   public function leaveTypeDelete($id)
   {
       $leaveType=LeaveTypeStudent::find($id);
       $leaveType->delete();
       return redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);
   }


   //--------------------verify-----------------------------------------------------------------//

   public function verify($value='')
   {
      $leaveRecords=LeaveRecord::where('status',0)->orderBy('apply_date','ASC')->get();
      return view('admin.attendance.verify.list',compact('leaveRecords'));
   }
    
   public function verifyForm($id=null)
   {
     $user_id=Auth::guard('admin')->user()->id; 
      $leaveRecord=LeaveRecord::find($id);
      $leaveRecord->status=1;
      $leaveRecord->action_by=$user_id;
      $leaveRecord->action_date=date('Y-m-d');
      $leaveRecord->save();
       return redirect()->back()->with(['message'=>'Approval Successfully','class'=>'success']);
    
     
   }

   public function LeaveverifyStore($id=null){
     $user_id=Auth::guard('admin')->user()->id; 
      $leaveRecord=LeaveRecord::find($id);
      $leaveRecord->status=2;
      $leaveRecord->action_by=$user_id;
      $leaveRecord->action_date=date('Y-m-d');
      $leaveRecord->save();
       return redirect()->back()->with(['message'=>'Reject Successfully','class'=>'success']);
   }
}
