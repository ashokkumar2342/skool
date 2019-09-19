<?php

namespace App\Http\Controllers\Admin\TimeTable;

use App\Helper\MyFuncs;
use App\Http\Controllers\Controller;
use App\Model\ClassType;
use App\Model\Section;
use App\Model\TimeTable\ClassPeriodSchedule;
use App\Model\TimeTable\DaysType;
use App\Model\TimeTable\PeriodTiming;
use App\Model\TimeTable\PeriodType;
use App\Model\TimeTable\TimeTableGroup;
use App\Model\TimeTable\TimeTableType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClassPeriodScheduleController extends Controller
{
     public function index(){
     	$classPeriodSchedule= ClassPeriodSchedule::all();
     	$classTypes=MyFuncs::getClassByHasUser();
        $timeTableTypes=TimeTableType::all();
    	return view('admin.timeTable.classPeriodSchedule.view',compact('classTypes','classPeriodSchedule','timeTableTypes'));
    }

    public function addForm(){
    	$timeTableGroupWises=TimeTableGroup::all();
    	$timeTableTypes=TimeTableType::all();
    	$periodTypes=PeriodType::all();
    	$classTypes=MyFuncs::getClassByHasUser();
    	$periodTimings=PeriodTiming::all();
    	$daysTypes=DaysType::all();
    	return view('admin.timeTable.classPeriodSchedule.add_form',compact('classTypes','periodTimings','daysTypes','periodTypes','timeTableTypes','timeTableGroupWises'));
    }

    public  function  scheduleShow(Request $request){
        // return $request;
        $classTypes=MyFuncs::getClassByHasUser();
        $daysTypes=DaysType::all();
        $periodTimings=PeriodTiming::where('time_table_type_id',$request->time_table_type_id)->get();
        $classPeriodSchedule=ClassPeriodSchedule::where('class_id',$request->class_id)->where('time_table_type_id',$request->time_table_type_id)->first();

         $time_table_type_id=$request->time_table_type_id;
         $class_id=$request->class_id;

        $periodTypes=PeriodType::all();
        return view('admin.timeTable.classPeriodSchedule.show',compact('periodTimings','daysTypes','periodTypes','classPeriodSchedule','classTypes','time_table_type_id','class_id'));
    }
    

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
    
             
              

                foreach ($request->period_type as $key => $period_id) {
                  

                   $classPeriodSchedule=ClassPeriodSchedule::firstOrNew(['time_table_type_id'=>$request->time_table_type,'class_id'=>$request->class,'period_timeing_id'=>$request->periodTiming[$key],'days_id'=>$request->days[$key]]);
                    $classPeriodSchedule->time_table_type_id=$request->time_table_type;
                    $classPeriodSchedule->class_id=$request->class;
                    $classPeriodSchedule->period_timeing_id=$request->periodTiming[$key];
                    $classPeriodSchedule->days_id=$request->days[$key];
                    $classPeriodSchedule->period_type=$request->period_type[$key];
                     
                    $classPeriodSchedule->save();   
                }
              
          
          $response=['status'=>1,'msg'=>'Save Successfully'];
          return response()->json($response);

        } 
    }
    public function edit($id){
      $timeTableTypes=TimeTableType::all();
     $periodTimings=PeriodTiming::findOrFail(Crypt::decrypt($id));
    	 return view('admin.timeTable.periodTiming.edit',compact('periodTimings','timeTableTypes'));	
    }
    // public function show(Request $request){
    // 	 // return $request;
    // 	$timeTableGroupWises=TimeTableGroup::all();
    // 	$timeTableTypes=TimeTableType::all();
    // 	$periodTypes=PeriodType::all();
    // 	$classTypes=MyFuncs::getClassByHasUser();
    // 	$periodTimings=PeriodTiming::all();
    // 	$daysTypes=DaysType::all();
    //    $classPeriodSchedules= ClassPeriodSchedule::where('class_id',$request->class_id)->get();
    //    $response = array();
    //   $response['status'] = 1; 
    //   $response['data'] =view('admin.timeTable.classPeriodSchedule.show',compact('classPeriodSchedules','daysTypes','periodTimings'))->render();   
		    
    //         return response()->json($response); 

    // }

    //---------------------multiple-class-period-schedule------------------------------------------------------

    public function multipleClassPeriodSchedule(){

      $classPeriodSchedule= ClassPeriodSchedule::all();
      $classTypes=MyFuncs::getClassByHasUser();
        $timeTableTypes=TimeTableType::all();
      return view('admin.timeTable.multipleClassPeriodSchedule.multiple_class_period_schedule',compact('classTypes','classPeriodSchedule','timeTableTypes'));

    }


     public function multipleClassPeriodScheduleStore(Request $request)
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
    
             
              
               foreach ($request->class as $key => $class_id) {
                foreach ($request->period_type as $key => $period_id) {
                  

                   $classPeriodSchedule=ClassPeriodSchedule::firstOrNew(['time_table_type_id'=>$request->time_table_type,'class_id'=>$class_id,'period_timeing_id'=>$request->periodTiming[$key],'days_id'=>$request->days[$key]]);
                    $classPeriodSchedule->time_table_type_id=$request->time_table_type;
                    $classPeriodSchedule->class_id=$class_id;
                    $classPeriodSchedule->period_timeing_id=$request->periodTiming[$key];
                    $classPeriodSchedule->days_id=$request->days[$key];
                    $classPeriodSchedule->period_type=$request->period_type[$key];
                     
                    $classPeriodSchedule->save();   
                }
              }
          
          $response=['status'=>1,'msg'=>'Save Successfully'];
          return response()->json($response);

        } 
    }
}
