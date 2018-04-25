<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\FinePeriod;
use App\Model\FineScheme;
use Validator;
use Illuminate\Http\Request;

class FineSchemeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          
        $fineSchemes = FineScheme::latest('created_at')->paginate(20);
        $finePeriod = array_pluck(FinePeriod::get(['id','name'])->toArray(),'name', 'id');
        return view('admin.finance.fine_scheme',compact('fineSchemes','finePeriod'));
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
        // return $request;
        $validator = Validator::make($request->all(), [
        
            'code' => 'required|max:3|unique:fine_schemes', 
            'name' => 'required|max:30|unique:fine_schemes', 
            'fine_amount1' => 'required|max:10', 
            'day_after1' => 'required|max:10', 
            'day_after1' => 'required|max:10', 
             
              
        ]);
        if ($validator->fails()) {                    
             return response()->json(['errors'=>$validator->errors()->all(),'class'=>'error']); 

        } else {
            $fineScheme = new FineScheme();
            $fineScheme->code = $request->code;
            $fineScheme->name = $request->name;
            $fineScheme->fine_amount1 = $request->fine_amount1;
            $fineScheme->fine_amount2 = $request->fine_amount2;
            $fineScheme->fine_amount3 = $request->fine_amount3;
            $fineScheme->day_after1 = $request->day_after1;
            $fineScheme->day_after2 = $request->day_after2;
            $fineScheme->fine_period_id = $request->fine_period;
            
            $fineScheme->save();
            return response()->json([$fineScheme,'class'=>'success','message'=>'Fine Scheme Created Successfully']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\FineScheme  $fineScheme
     * @return \Illuminate\Http\Response
     */
    public function show(FineScheme $fineScheme)
    {
        //
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
    public function update(Request $request, FineScheme $fineScheme)
    {
        $validator = Validator::make($request->all(), [
        
            
            'fine_amount1' => 'required|max:10', 
            'day_after1' => 'required|max:10', 
            'day_after1' => 'required|max:10', 
             
              
        ]);
        if ($validator->fails()) {                    
             return response()->json(['errors'=>$validator->errors()->all(),'class'=>'error']); 

        } else {
            $fineScheme = FineScheme::find($request->id);
            $fineScheme->code = $request->code;
            $fineScheme->name = $request->name;
            $fineScheme->fine_amount1 = $request->fine_amount1;
            $fineScheme->fine_amount2 = $request->fine_amount2;
            $fineScheme->fine_amount3 = $request->fine_amount3;
            $fineScheme->day_after1 = $request->day_after1;
            $fineScheme->day_after2 = $request->day_after2;
            $fineScheme->fine_period_id = $request->fine_period;
            
            $fineScheme->save();
            return response()->json([$fineScheme,'class'=>'success','message'=>'Fine Scheme Created Successfully']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\FineScheme  $fineScheme
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $fineScheme =FineScheme::findOrFail($request->id);
        $fineScheme->delete();
        return  response()->json([$fineScheme,'message'=>'Fine Scheme Delete Successfully','class'=>'success']);
    }
}
