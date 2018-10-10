<?php

namespace App\Http\Controllers\Admin\Transport;

use App\Http\Controllers\Controller;
use App\Model\Transport\Driver;
use App\Model\Transport\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class DriverController extends Controller
{
     public function index()
    {
    	$vehicles = array_pluck(Vehicle::get(['id','registration_no'])->toArray(),'registration_no', 'id');
        $drivers  = Driver::latest('created_at')->paginate(20);
        return view('admin.transport.driver',compact('drivers','vehicles'));
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
    	'name' => 'required|max:30', 
            'mobile' => 'required|digits:10', 
            'contact_no' => 'required|digits:10', 
            'address' => 'required|string', 
            'p_address' => 'required|string', 
       
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
            $Driver = new Driver();            
            $Driver->name = $request->name;
            $Driver->mobile = $request->mobile;
            $Driver->contact_no = $request->contact_no;         
            $Driver->license_number = $request->license_number;            
            $Driver->address = $request->address;
            $Driver->p_address = $request->p_address;
            $Driver->dob = $request->dob == null ? $request->dob : date('Y-m-d',strtotime($request->dob));
            $Driver->vehicle_id = $request->vehicle_id;
            $Driver->save();
             $response=['status'=>1,'msg'=>'Created Successfully'];
            return response()->json($response); 
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Driver  $Driver
     * @return \Illuminate\Http\Response
     */
    public function show(Driver $Driver)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Driver  $Driver
     * @return \Illuminate\Http\Response
     */
    public function edit(Driver $Driver)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Driver  $Driver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Driver $Driver)
    {
        // return $request;
        $validator = Validator::make($request->all(), [
        
            'code' => 'required|max:3', 
            // 'name' => 'required|max:30|unique:fee_accounts', 
            // 'description' => 'max:100', 
              
        ]);
        if ($validator->fails()) {                    
             return response()->json(['errors'=>$validator->errors()->all(),'class'=>'error']); 

        } else {
            $Driver =  Driver::find($request->id);
            // return $Driver;
            $Driver->code = $request->code;
            $Driver->name = $request->name;
            $Driver->description = $request->description;
            $Driver->save();
            return response()->json([$Driver,'class'=>'success','message'=>'Fee Account Created Successfully']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Driver  $Driver
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $Driver = Driver::findOrFail(Crypt::decrypt($id));
        $Driver->delete();
        return  redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);
    }
}
