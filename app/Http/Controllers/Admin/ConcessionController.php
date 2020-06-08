<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Concession;
use App\Model\FeeStructure;
use App\Model\FeeStructureAmount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use PDF;

class ConcessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $concessions = Concession::orderBy('name','ASC')->get();
        return view('admin.finance.concession',compact('concessions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addForm($id=null)
    {
        if ($id!=null) {
        $concessions = Concession::find(Crypt::decrypt($id));
            
        }if ($id==null) {
        $concessions = '';
            
        }
        return view('admin.finance.concession_form',compact('concessions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id=null)
    {
       $rules=[       
            
            'name' => 'required|max:30|unique:concessions,name,'.$id, 
            'amount' => 'required|max:7', 
             
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $response=array();
            $response["status"]=0;
            $response["msg"]=$errors[0];
            return response()->json($response);// response as json
        } else {
            $concession =  Concession::firstOrNew(['id'=>$id]); 
            $concession->name = $request->name;
            $concession->amount = $request->amount;
            $concession->percentage = $request->percentage;
            $concession->save();
             $response["status"]=1;
            $response["msg"]='Concession Submit Successfully';
            return response()->json($response);
            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Concession  $concession
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    { 
        $feeStructureAmounts = FeeStructureAmount::where('fee_structure_id',$request->fee_structure)->where('academic_year_id',$request->academic_year_id)->first(); 
        $concession = Concession::find($request->id);
        if (!empty($concession)) { 
            if ($concession->amount==0) { 
              $concession_amount =($concession->percentage / 100) * $feeStructureAmounts->amount;   
            }elseif($concession->amount!=0){ 
              $concession_amount =$concession->amount;  
            } 
        } 
        return view('admin.finance.include.student_fee_concession_amount',compact('concession_amount'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Concession  $concession
     * @return \Illuminate\Http\Response
     */
    public function edit(Concession $concession)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Concession  $concession
     * @return \Illuminate\Http\Response
     */
     
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Concession  $concession
     * @return \Illuminate\Http\Response
     */
   public function destroy($id)
   {
       $concession = Concession::find(Crypt::decrypt($id));
       $concession->delete();
       return  redirect()->back()->with(['message'=>'Concession Delete Successfully','class'=>'success']);
   }
   public function report($value='')
   {
        $concessions = Concession::orderBy('name','ASC')->get();
        $pdf=PDF::setOptions([
            'logOutputFile' => storage_path('logs/log.htm'),
            'tempDir' => storage_path('logs/')
        ])
        ->loadView('admin.finance.pdf.concession_pdf',compact('concessions'));
        return $pdf->stream('academicYear.pdf');
   }
}
