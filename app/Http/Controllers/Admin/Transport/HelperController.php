<?php

namespace App\Http\Controllers\Admin\Transport;

use App\Http\Controllers\Controller;
use App\Model\Transport\DriverHelper;
use App\Model\Transport\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class HelperController extends Controller
{
     public function index()
    {
    	$vehicles = array_pluck(Vehicle::get(['id','registration_no'])->toArray(),'registration_no', 'id');
        $helpers  = DriverHelper::latest('created_at')->get();
        return view('admin.transport.helper',compact('helpers','vehicles'));
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
            $Helper = new DriverHelper();            
            $Helper->name = $request->name;
            $Helper->mobile = $request->mobile;
            $Helper->contact_no = $request->contact_no;         
            $Helper->license_number = $request->license_number;            
            $Helper->address = $request->address;
            $Helper->p_address = $request->p_address;
            $Helper->dob = $request->dob == null ? $request->dob : date('Y-m-d',strtotime($request->dob));
            $Helper->vehicle_id = $request->vehicle_id;
            $Helper->save();
             $response=['status'=>1,'msg'=>'Created Successfully'];
            return response()->json($response); 
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Helper  $Helper
     * @return \Illuminate\Http\Response
     */
    public function show(Helper $Helper)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Helper  $Helper
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $vehicles = array_pluck(Vehicle::get(['id','registration_no'])->toArray(),'registration_no', 'id');
        $driverHelper = DriverHelper::findOrFail(Crypt::decrypt($id));
        return view('admin.transport.helperedit',compact('driverHelper','vehicles'));
         
            
    }    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Helper  $Helper
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Helper $Helper)
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
            $Helper =  Helper::find($request->id);
            // return $Helper;
            $Helper->code = $request->code;
            $Helper->name = $request->name;
            $Helper->description = $request->description;
            $Helper->save();
            return response()->json([$Helper,'class'=>'success','message'=>'Fee Account Created Successfully']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Helper  $Helper
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $Helper = DriverHelper::findOrFail(Crypt::decrypt($id));
        $Helper->delete();
        return  redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);
    }
}
