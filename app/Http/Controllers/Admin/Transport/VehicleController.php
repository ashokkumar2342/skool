<?php

namespace App\Http\Controllers\Admin\Transport;

use App\Http\Controllers\Controller;
use App\Model\Transport\Transport;
use App\Model\Transport\Vehicle;
use App\Model\Transport\VehicleType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
class VehicleController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$transports = array_pluck(Transport::get(['id','name'])->toArray(),'name', 'id'); 
    	$vehicleTypes = array_pluck(VehicleType::get(['id','vehicle_type'])->toArray(),'vehicle_type', 'id'); 
        $Vehicles  = Vehicle::latest('created_at')->paginate(20);
        return view('admin.transport.vehicle',compact('Vehicles','vehicleTypes','transports'));
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
    	// 'name' => 'required|max:30', 
     //        'mobile' => 'required|digits:10', 
     //        'contact_no' => 'required|digits:10', 
     //        'address' => 'required|string', 
     //        'pincode' => 'required|digits:6', 
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
            $Vehicle = new Vehicle();
            
            $Vehicle->transport_id = $request->transport_id;
            $Vehicle->vehicle_type_id = $request->vehicle_type_id;
            $Vehicle->registration_no = $request->registration_no;
            $Vehicle->chassis_no = $request->chassis_no;
            $Vehicle->model_no = $request->model_no;
            $Vehicle->engine_no = $request->engine_no;
            $Vehicle->siting_capacity = $request->siting_capacity;
            $Vehicle->average = $request->average;
            
    
            $Vehicle->save();
             $response=['status'=>1,'msg'=>'Created Successfully'];
            return response()->json($response); 
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Vehicle  $Vehicle
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Vehicle  $Vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit($id)

    { 
    $transports = array_pluck(Transport::get(['id','name'])->toArray(),'name', 'id'); 
        $vehicleTypes = array_pluck(VehicleType::get(['id','vehicle_type'])->toArray(),'vehicle_type', 'id'); 
         $vehicle = Vehicle::findOrFail(Crypt::decrypt($id));
         
        return view('admin.transport.VehicleEdit',compact('vehicle','transports','vehicleTypes'));
         //return view('admin.transport.vehicle',compact('Vehicles','vehicleTypes','transports'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Vehicle  $Vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
       $rules=[

         'registration_no' => 'required|max:100', 
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
            $Vehicle =Vehicle::find($id);
            
            $Vehicle->transport_id = $request->transport_id;
            $Vehicle->vehicle_type_id = $request->vehicle_type_id;
            $Vehicle->registration_no = $request->registration_no;
            $Vehicle->chassis_no = $request->chassis_no;
            $Vehicle->model_no = $request->model_no;
            $Vehicle->engine_no = $request->engine_no;
            $Vehicle->siting_capacity = $request->siting_capacity;
            $Vehicle->average = $request->average;
            
    
            $Vehicle->save();
             $response=['status'=>1,'msg'=>'Created Successfully'];
            return response()->json($response); 
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Vehicle  $Vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $Vehicle = Vehicle::findOrFail(Crypt::decrypt($id));
        $Vehicle->delete();
        return  redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);
    }


    public function list()
    {
    	 
        $VehicleTypes  = VehicleType::latest('created_at')->get();
        return view('admin.transport.vehicletype',compact('VehicleTypes'));
    }
     public function vehicleTypestore(Request $request)
    {
    	$rules=[
    	'vehicle_type' => 'required|max:30', 
            'description' => 'string|nullable', 
            
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
            $Vehicle = new VehicleType();
            
            $Vehicle->vehicle_type = $request->vehicle_type;
            $Vehicle->description = $request->description;
             
            $Vehicle->save();
             $response=['status'=>1,'msg'=>'Created Successfully'];
            return response()->json($response); 
    	}
    }

    public function vehicleTypedestroy($id)
    {

        $Vehicle = VehicleType::findOrFail(Crypt::decrypt($id));
        $Vehicle->delete();
        return  redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);
    }

     public function vehicleTypeedit($id)
    {

        $vehicleTypes  = VehicleType::find(Crypt::decrypt($id));
        return view('admin.transport.vehicletypeEdit',compact('vehicleTypes'));   
   }
        
     public function vehicleTypeupdate(Request $request,$id)
    {
        $rules=[
        'vehicle_type' => 'required|max:30', 
            'description' => 'string|nullable', 
            
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
            $Vehicle = new VehicleType();
            
            $Vehicle->vehicle_type = $request->vehicle_type;
            $Vehicle->description = $request->description;
             
            $Vehicle->save();
             $response=['status'=>1,'msg'=>'Created Successfully'];
            return response()->json($response); 
        }
    }
}