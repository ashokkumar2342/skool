<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\FinePeriod;
use App\Model\FineScheme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Validator;
use PDF;
class FineSchemeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          
        $fineSchemes = FineScheme::orderBy('code','ASC')->get();
        $finePeriod = array_pluck(FinePeriod::get(['id','name'])->toArray(),'name', 'id');
        return view('admin.finance.fine_scheme',compact('fineSchemes','finePeriod'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addForm($id=null)
    {
        if ($id!=null) {
          $fineSchemes = FineScheme::find(Crypt::decrypt($id));
        }
        if ($id==null) {
          $fineSchemes = '';  
        }
       
        $finePeriod = array_pluck(FinePeriod::get(['id','name'])->toArray(),'name', 'id');
        return view('admin.finance.fine_scheme_form',compact('fineSchemes','finePeriod'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id=null)
    {
        // return $request;
        $rules= [
        
            'code' => 'required|max:3|unique:fine_schemes,code,'.$id, 
            'name' => 'required|max:30|unique:fine_schemes,name,'.$id, 
            'fine_amount1' => 'required|max:10', 
            'fine_amount2' => 'required|max:10', 
            'fine_amount3' => 'required|max:10', 
            'day_after1' => 'required|max:10', 
            'day_after2' => 'required|max:10', 
            'fine_period' => 'required', 
             
              
        ];
       $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $response=array();
            $response["status"]=0;
            $response["msg"]=$errors[0];
            return response()->json($response);// response as json
        } else {
            $fineScheme =  FineScheme::firstOrNew(['id'=>$id]);
            $fineScheme->code = $request->code;
            $fineScheme->name = $request->name;
            $fineScheme->fine_amount1 = $request->fine_amount1;
            $fineScheme->fine_amount2 = $request->fine_amount2;
            $fineScheme->fine_amount3 = $request->fine_amount3;
            $fineScheme->day_after1 = $request->day_after1;
            $fineScheme->day_after2 = $request->day_after2;
            $fineScheme->fine_period_id = $request->fine_period;
            
            $fineScheme->save();
            $response["status"]=1;
            $response["msg"]='Fine Scheme Submit Successfully';
            return response()->json($response);
            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\FineScheme  $fineScheme
     * @return \Illuminate\Http\Response
     */
    public function pdfReport(FineScheme $fineScheme)
    {
        $fineSchemes = FineScheme::orderBy('code','ASC')->get();
        $pdf=PDF::setOptions([
            'logOutputFile' => storage_path('logs/log.htm'),
            'tempDir' => storage_path('logs/')
        ])
        ->loadView('admin.finance.pdf.fine_schemes',compact('fineSchemes'));
        return $pdf->stream('academicYear.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\FineScheme  $fineScheme
     * @return \Illuminate\Http\Response
     */
    public function edit(FineScheme $fineScheme)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\FineScheme  $fineScheme
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\FineScheme  $fineScheme
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $fineScheme =FineScheme::find(Crypt::decrypt($id));
        $fineScheme->delete();
        return  redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);
    }
}
