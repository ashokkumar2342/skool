<?php

namespace App\Http\Controllers\Admin\TimeTable;

use App\Http\Controllers\Controller;
use App\Model\ClassType;
use App\Model\Section;
use App\Model\TimeTable\ClassPeriodSchedule;
use App\Model\TimeTable\DaysType;
use App\Model\TimeTable\TimeTableGroup;
use App\Model\TimeTable\PeriodTiming;
use App\Model\TimeTable\PeriodType;
use App\Model\TimeTable\TimeTableType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClassPeriodScheduleController extends Controller
{
     public function index(){
     	$classPeriodSchedule= ClassPeriodSchedule::all();
     	$classTypes=ClassType::all();
        $timeTableTypes=TimeTableType::all();
    	return view('admin.timeTable.classPeriodSchedule.view',compact('classTypes','classPeriodSchedule','timeTableTypes'));
    }

    public function addForm(){
    	$timeTableGroupWises=TimeTableGroup::all();
    	$timeTableTypes=TimeTableType::all();
    	$periodTypes=PeriodType::all();
    	$classTypes=ClassType::all();
    	$periodTimings=PeriodTiming::all();
    	$daysTypes=DaysType::all();
    	return view('admin.timeTable.classPeriodSchedule.add_form',compact('classTypes','periodTimings','daysTypes','periodTypes','timeTableTypes','timeTableGroupWises'));
    }

    public  function  scheduleShow(Request $request){
        // return $request;
        $classTypes=ClassType::all();
        $daysTypes=DaysType::all();
        $periodTimings=PeriodTiming::where('time_table_type_id',$request->time_table_type_id)->get();
        $classPeriodSchedule=ClassPeriodSchedule::where('class_id',$request->class_id)->where('time_table_type_id',$request->time_table_type_id)->first();
        $periodTypes=PeriodType::all();
        return view('admin.timeTable.classPeriodSchedule.show',compact('periodTimings','daysTypes','periodTypes','classPeriodSchedule','classTypes'));
    }
    //  public function timeTableTypeWiseTimeimg(Request $request){
         
    // 	 $periodTimings=PeriodTiming::where('time_table_type_id',$request->id)->get();
    // 	return view('admin.timeTable.classPeriodSchedule.timing_select_box',compact('periodTimings'));

    // }
    //  public function groupWise(Request $request){
    //  	  // return $request;
    //  	if ($request->id==1) {
     		 
    //  	}if ($request->id==2) {
    //  		 $classTypes=ClassType::all();
    //  		 return view('admin.timeTable.classPeriodSchedule.class_select_box',compact('classTypes'));
    //  	}if ($request->id==3) {
    //  		$classTypes=ClassType::all();
     		
    // 	return view('admin.timeTable.classPeriodSchedule.class_with_section_select_box',compact('classTypes')); 
    //  	}
    	 

    // }
    // public function classWiseSection(Request $request){
    // 	$sections=Section::where('class_id',$request->id)->get();
    // 	return view('admin.timeTable.classPeriodSchedule.section_select_box',compact('sections'));
    // }

     public function store(Request $request)
    {
    	   
    	$rules=[ 
           'class'=>'required',
           'time_table_type'=>'required',
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
    
              $classPeriodSchedule=ClassPeriodSchedule::firstOrNew(['time_table_type_id'=>$request->time_table_type]);
              $classPeriodSchedule->time_table_type_id=$request->time_table_type;
              $classPeriodSchedule->class_id=$request->class;
              $classPeriodSchedule->period_timeing_id=implode(',', $request->periodTiming);
              $classPeriodSchedule->days_id=implode(',', $request->day);
              $classPeriodSchedule->period_type=implode(',', $request->period_type);
              $classPeriodSchedule->save();   
          
          $response=['status'=>1,'msg'=>'Save Successfully'];
          return response()->json($response);

        } 
    }
    public function edit($id){
      $timeTableTypes=TimeTableType::all();
     $periodTimings=PeriodTiming::findOrFail(Crypt::decrypt($id));
    	 return view('admin.timeTable.periodTiming.edit',compact('periodTimings','timeTableTypes'));	
    }
    public function show(Request $request){
    	 // return $request;
    	$timeTableGroupWises=TimeTableGroup::all();
    	$timeTableTypes=TimeTableType::all();
    	$periodTypes=PeriodType::all();
    	$classTypes=ClassType::all();
    	$periodTimings=PeriodTiming::all();
    	$daysTypes=DaysType::all();
       $classPeriodSchedules= ClassPeriodSchedule::where('class_id',$request->class_id)->get();
       $response = array();
      $response['status'] = 1; 
      $response['data'] =view('admin.timeTable.classPeriodSchedule.show',compact('classPeriodSchedules','daysTypes','periodTimings'))->render();   
		    
            return response()->json($response); 

    }

    //---------------------multiple-class-period-schedule------------------------------------------------------

    public function multipleClassPeriodSchedule(){

      $classPeriodSchedule= ClassPeriodSchedule::all();
      $classTypes=ClassType::all();
        $timeTableTypes=TimeTableType::all();
      return view('admin.timeTable.multipleClassPeriodSchedule.multiple_class_period_schedule',compact('classTypes','classPeriodSchedule','timeTableTypes'));

    }
}
