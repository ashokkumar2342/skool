<?php

namespace App\Http\Controllers\Admin;

 
use App\Events\SmsEvent;
use App\Http\Controllers\Controller;
use App\Model\ClassType;
use App\Model\SessionDate;
use App\Model\Sms\SmsTemplate;
use App\Model\StudentAttendance;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class StudentAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
 
        $classes = array_pluck(ClassType::get(['id','name'])->toArray(),'name', 'id');
        return view('admin.attendance.student.list',compact('centers','classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {

        $students = Student::where(['class_id'=>$request->class,'section_id'=>$request->section])->get(['id','name','father_name','mother_name','class_id','section_id']);  

        foreach ($students as $student) {
            $row = '<tr><td>'.$student->id.'</td><td>'.$student->name.'</td>';
            foreach(\App\Model\AttendanceType::all() as $attendance){
                $checked = (\App\Model\StudentAttendance::where(['student_id'=>$student->id,'attendance_type_id'=>$attendance->id,'date'=>date('Y-m-d',strtotime($request->date))])->count())?'checked':'';
                      $row .='<td ><label class="radio-inline"><input type="radio" '.$checked.' name="value['.$student->id.']" class="'. str_replace(' ', '_', strtolower($attendance->name)).'" value="'. $attendance->id .'"> '. $attendance->name .' </label></td>';
            }
            $row .= '</tr>';
            $options[] = [$row];
        }   
        return response()->json($options);  
        // return view('admin.attendance.student.list',compact('students'));
    }
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         
        $this->validate($request,['date'=>'required|date','value'=>'required']);
        foreach ($request->value as $key => $value) {

           $student = StudentAttendance::where(['date'=>date('Y-m-d',strtotime($request->date)),'student_id'=>$key])->firstOrNew(['student_id'=>$key]);
           $student->student_id = $key;
           $student->attendance_type_id = $value;
           $student->date = date('Y-m-d',strtotime($request->date));
           $student->save();
        }
        return response()->json(['class'=>'success','message'=>'Attendance Mark Successfully']);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StudentAttendance  $studentAttendance
     * @return \Illuminate\Http\Response
     */
    public function show(StudentAttendance $studentAttendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StudentAttendance  $studentAttendance
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentAttendance $studentAttendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StudentAttendance  $studentAttendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentAttendance $studentAttendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StudentAttendance  $studentAttendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentAttendance $studentAttendance)
    {
        //
    }
    public function attendanceContinue($value='')
    {
        
        $studentAttendances= StudentAttendance::where('attendance_type_id',2)->where('date', '>', Carbon::now()->subDays(2))->distinct('student_id')->get(['student_id']);

          

        return  view('admin.attendance.student.absent_continue',compact('studentAttendances'));
    }
    //-------------------student-absent-------------------------------------------------//
    public function studentAbsent()
    {
        return  view('admin.attendance.student.student_absent_list');
    }
     public function studentAbsentList()
    {
        $StudentAttendances=StudentAttendance::where('date',date('Y-m-d'))->where('attendance_type_id',2)->get();
        return  view('admin.attendance.student.student_absent_list_show',compact('StudentAttendances'));
    }
    public function studentAbsentSendSms(Request $request)
    {
        return $request;
         $studentAbsentSendSms=Student::whereIn('id',$request->student_id)->get();
         foreach ($studentAbsentSendSms as  $value) {
             
         $smsTemplate = SmsTemplate::where('id',4)->first();
        event(new SmsEvent($value->father_mobile,$smsTemplate->message)); 
         }
        $response=['status'=>1,'msg'=>'Message Sent successfully'];
            return response()->json($response);
    }
//-------------------attendance-barcode------------------------------------------------//
    public function attendanceBarcode()
    {
      return  view('admin.attendance.student.barcode');   
    }
    public function attendanceBarcodeshow(Request $request)
    {
       $StudentAttendancesBarcode=Student::where('registration_no',$request->id)->first();
       return  view('admin.attendance.student.student_list_barcode',compact('StudentAttendancesBarcode'));  
    }

    public function attendanceBarcodeSave(Request $request)
    {
        
         $StudentAttendancesBarcode=Student::where('registration_no',$request->registration_no)->first();
        $date=date('d-m-Y');
        
        $rules=[];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $response=array();
            $response["status"]=0;
            $response["msg"]=$errors[0];
            return response()->json($response);// response as json
        }
        else {
         $student = StudentAttendance::where(['date'=>date('Y-m-d',strtotime($date)),'student_id'=>$StudentAttendancesBarcode->id])->firstOrNew(['student_id'=>$StudentAttendancesBarcode->id]);
           $student->student_id = $StudentAttendancesBarcode->id;
           $student->attendance_type_id =1;
           $student->date = date('Y-m-d',strtotime($date));
           $student->save();
        $response=['status'=>1,'msg'=>'Save Successfully'];
            return response()->json($response);
        } 
           
         
         
    }
}
