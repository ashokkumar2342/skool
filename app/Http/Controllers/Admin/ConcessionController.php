<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Concession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ConcessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $concessions = Concession::latest('created_at')->paginate(20);
        return view('admin.finance.concession',compact('concessions'));
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
        $validator = Validator::make($request->all(), [       
            
            'name' => 'required|max:30|unique:fee_groups', 
            'description' => 'max:100', 
              
        ]);
        if ($validator->fails()) {                    
             return response()->json(['errors'=>$validator->errors()->all(),'class'=>'error']); 

        } else {
            $concession = new Concession();
          
            $concession->name = $request->name;
            $concession->amount = $request->amount;
            $concession->percentage = $request->percentage;
            $concession->save();
            return response()->json([$concession,'class'=>'success','message'=>'Fee Group Created Successfully']);
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
        $concession = Concession::find($request->concession);
         
        return response()->json($concession);
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
    public function update(Request $request, Concession $concession)
    {
        $validator = Validator::make($request->all(), [
        
            
            'name' => 'required|max:30',
            
              
        ]);
        if ($validator->fails()) {                    
             return response()->json(['errors'=>$validator->errors()->all(),'class'=>'error']); 

        } else {
            $concession =  Concession::find($request->id);
            
            $concession->name = $request->name;
            $concession->amount = $request->amount;
            $concession->percentage = $request->percentage;
            $concession->save();
            return response()->json([$concession,'class'=>'success','message'=>'Fee Group Created Successfully']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Concession  $concession
     * @return \Illuminate\Http\Response
     */
   public function destroy(Request $request)
   {
       $concession = Concession::findOrFail($request->id);
       $concession->delete();
       return  response()->json([$concession,'message'=>'Concession Delete Successfully','class'=>'success']);
   }
}
