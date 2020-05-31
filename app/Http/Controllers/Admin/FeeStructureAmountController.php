<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\AcademicYear;
use App\Model\FeeStructure;
use App\Model\FeeStructureAmount;
use App\Model\FeeStructureLastDate;
use App\Model\ForSessionMonth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use PDF;

class FeeStructureAmountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feeStructureAmounts = FeeStructureAmount::OrderBy('created_at')->paginate(20); 
       $acardemicYears = AcademicYear::orderBy('start_date','DESC')->get();
        $feeStructur = array_pluck(FeeStructure::get(['id','name'])->toArray(),'name', 'id'); 
        return view('admin.finance.fee_structure_amount',compact('feeStructureAmounts','acardemicYears','feeStructur','acardemicYearsSet'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function onchange(Request $request)
    {
        $academic_year_id=$request->id;
        $feeStructurs = FeeStructure::OrderBy('name','ASC')->get();
        return view('admin.finance.fee_structure_amount_table',compact('academic_year_id','feeStructurs'));
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
          
           'academic_year_id' => 'required', 
            'amount' => 'required',
       
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
        foreach ($request->amount as $key => $value) {
           $feeStructureamount = FeeStructureAmount::firstOrNew(['academic_year_id'=>$request->academic_year_id,'fee_structure_id'=>$key]);             
            $feeStructureamount->academic_year_id = $request->academic_year_id;
            $feeStructureamount->fee_structure_id = $key;
            $feeStructureamount->amount = $value;             
            $feeStructureamount->save();   
        }
        $response=['status'=>1,'msg'=>'Created Successfully'];
            return response()->json($response);
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\FeeStructureAmount  $feeStructureAmount
     * @return \Illuminate\Http\Response
     */
    public function show(FeeStructureAmount $feeStructureAmount)
    {
        //
    }
    public function search(Request $request)
    { 
        $feeStructureAmount = FeeStructureAmount::where('fee_structure_id',$request->fee_structure_id)->first()->amount;
        $feeStructureLastDstes = FeeStructureLastDate::where('fee_structure_id',$request->fee_structure_id)->where('academic_year_id',$request->academic_year_id)->OrderBy('fee_structure_id','ASC')->OrderBy('due_year','ASC')->OrderBy('due_month','ASC')->get(); 
        $forSessionMonths =ForSessionMonth::OrderBy('name','ASC')->get();
        return view('admin.finance.fee_structure_last_date_table',compact('feeStructureLastDstes','feeStructureAmount','forSessionMonths'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\FeeStructureAmount  $feeStructureAmount
     * @return \Illuminate\Http\Response
     */
    public function edit(FeeStructureAmount $feeStructureAmount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\FeeStructureAmount  $feeStructureAmount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FeeStructureAmount $feeStructureAmount)
    {

        $validator = Validator::make($request->all(), [
        'academic_year_id' => 'required',    
            'fee_structure_id' => 'required',    
            'amount' => 'required|max:7',
           
        ]);
        if ($validator->fails()) {                    
             return response()->json(['errors'=>$validator->errors()->all(),'class'=>'error']); 

        } else {
            $$feeStructureAmount = $feeStructureAmount::findOrFail($request->id);
            
            $$feeStructureAmount->academic_year_id = $request->academic_year_id;
            $$feeStructureAmount->fee_structure_id = $request->fee_structure_id;
            $$feeStructureAmount->amount = $request->amount; 
            $$feeStructureAmount->save();
            return response()->json([$$feeStructureAmount,'class'=>'success','message'=>'Fee Account Updeted Successfully']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\FeeStructureAmount  $feeStructureAmount
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,FeeStructureAmount $feeStructureAmount)
    {
         $$feeStructureAmount = FeeStructureAmount::findOrFail($request->id);
        $$feeStructureAmount->delete();
        return  response()->json([$$feeStructureAmount,'message'=>'Fee Structure Amount Delete Successfully','class'=>'success']);
    }

//-----------clone-------------------------------------
    public function clone($condition_id)
    {  
        $acardemicYears=AcademicYear::all();
        return view('admin.finance.fee_structure_amount_clone',compact('acardemicYears','condition_id'));
    }
    public function cloneStore(Request $request,$condition_id)
    {  
        $rules=[
          
           'for_academic_year_id' => 'required', 
            'new_academic_year_id' => 'required',
       
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $response=array();
            $response["status"]=0;
            $response["msg"]=$errors[0];
            return response()->json($response);// response as json
        }
        if ($condition_id=='feestrutureAmount_clone') {
            
         DB::select(DB::raw("call up_clone_fee_amt ('$request->for_academic_year_id', '$request->new_academic_year_id')")); 
        }
        else if ($condition_id=='feestruturelassdate_clone') {
             
         DB::select(DB::raw("call up_clone_fee_lastdate ('$request->for_academic_year_id', '$request->new_academic_year_id')")); 
        }
         $response=['status'=>1,'msg'=>'Cloning Successfully'];
         return response()->json($response);
   }
   public function pdfReport($academic_year_id){
    $FeeStructureAmount = FeeStructureAmount::where('academic_year_id',$academic_year_id)->get();
        $pdf=PDF::setOptions([
            'logOutputFile' => storage_path('logs/log.htm'),
            'tempDir' => storage_path('logs/')
        ])
        ->loadView('admin.finance.pdf.fee_structure_amount',compact('FeeStructureAmount'));
        return $pdf->stream('academicYear.pdf');  
      
   }
         
       
}
