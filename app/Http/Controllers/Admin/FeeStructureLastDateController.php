<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\AcademicYear;
use App\Model\FeeStructure;
use App\Model\FeeStructureLastDate;
use App\Model\ForSessionMonth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FeeStructureLastDateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()    {
        $feeStructureLastDstes = FeeStructureLastDate::OrderBy('last_date')->paginate(20);         
        $acardemicYear = array_pluck(AcademicYear::get(['id','name'])->toArray(), 'name', 'id');
        $feeStructur =FeeStructure::orderBy('name','ASC')->get();
        $forSessionMonth = array_pluck(ForSessionMonth::get(['id','name'])->toArray(),'name', 'id');
        return view('admin.finance.fee_structure_last_date',compact('feeStructureLastDstes','acardemicYear','feeStructur','forSessionMonth'));
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
        
            'fee_structure_id' => 'required|max:10', 
            'academic_year_id' => 'required|max:10', 
            'for_session_month_id' => 'required|max:30', 
            'amount' => 'required|max:8|regex:/^\d*(\.\d{1,2})?$/', 
            // 'last_date' => 'required|max:10', 
             
              
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $response=array();
            $response["status"]=0;
            $response["msg"]=$errors[0];
            return response()->json($response);// response as json
        }else {
            $academicYear=AcademicYear::find($request->academic_year_id);
             $date =  date_create(date('Y-m-d',strtotime($academicYear->start_date ."+9 days")));              
            $data = ForSessionMonth::find($request->for_session_month_id)->times;
            for ($i=0; $i < $data; $i++) {  
             $feeStructureLastDate = new FeeStructureLastDate();
             $feeStructureLastDate->fee_structure_id = $request->fee_structure_id;
             $feeStructureLastDate->academic_year_id = $request->academic_year_id;
             $feeStructureLastDate->for_session_month_id = $request->for_session_month_id;
             $feeStructureLastDate->amount = $request->amount; 
                if ($data == 1) {                 
                   $feeStructureLastDate->last_date=$date;
                }elseif ($data == 4){
                   $i==0?'':date_add($date, date_interval_create_from_date_string('3 month'));                      
                   $feeStructureLastDate->last_date=date_format($date, 'Y-m-d'); 
                }
                else {
                $i==0?'':date_add($date, date_interval_create_from_date_string('1 month'));                      
                     
                $feeStructureLastDate->last_date=date_format($date, 'Y-m-d');

                }           
             
             $feeStructureLastDate->save();
            }
            $response=['status'=>1,'msg'=>'Created Successfully'];
            return response()->json($response);
           
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\FeeStructureLastDate  $feeStructureLastDate
     * @return \Illuminate\Http\Response
     */
    public function show(FeeStructureLastDate $feeStructureLastDate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\FeeStructureLastDate  $feeStructureLastDate
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $feeStructureLastDate = FeeStructureLastDate::find($id);
         $forSessionMonths =ForSessionMonth::all();
        return view('admin.finance.fee_structure_last_date_edit',compact('feeStructureLastDate','forSessionMonths'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\FeeStructureLastDate  $feeStructureLastDate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
       $rules=[
        
           
            'amount' => 'required|max:8|regex:/^\d*(\.\d{1,2})?$/', 
            'last_date' => 'required|date', 
            'for_session_month_id' => 'required|max:30', 
            // 'last_date' => 'required|max:10', 
             
              
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $response=array();
            $response["status"]=0;
            $response["msg"]=$errors[0];
            return response()->json($response);// response as json
        }else { 
             $feeStructureLastDate = FeeStructureLastDate::find($id); 
             $feeStructureLastDate->for_session_month_id = $request->for_session_month_id;
             $feeStructureLastDate->amount = $request->amount; 
             $feeStructureLastDate->last_date=$request->last_date; 
             $feeStructureLastDate->save(); 
            $response=['status'=>1,'msg'=>'Update Successfully'];
            return response()->json($response);
           
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\FeeStructureLastDate  $feeStructureLastDate
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feeStructureLastDate = FeeStructureLastDate::find($id);
        $feeStructureLastDate->delete();
       $response=['status'=>1,'msg'=>'Delete Successfully'];
            return response()->json($response);
    }
}
