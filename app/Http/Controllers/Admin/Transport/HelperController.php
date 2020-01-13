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
    // public function store(Request $request)
    // {
    // 	$rules=[
    // 	'name' => 'required|max:30', 
    //         'mobile' => 'required|digits:10', 
    //         'contact_no' => 'required|digits:10', 
    //         'license_number' => 'required|string', 
    //         'dob' => 'required|date', 
    //         'vehicle_id' => 'required', 
    //         'address' => 'required|string', 
            
       
    // 	];

    // 	$validator = Validator::make($request->all(),$rules);
    // 	if ($validator->fails()) {
    // 	    $errors = $validator->errors()->all();
    // 	    $response=array();
    // 	    $response["status"]=0;
    // 	    $response["msg"]=$errors[0];
    // 	    return response()->json($response);// response as json
    // 	}
    //      else {
    //         $Helper = new DriverHelper();            
    //         $Helper->name = $request->name;
    //         $Helper->mobile = $request->mobile;
    //         $Helper->contact_no = $request->contact_no;         
    //         $Helper->license_number = $request->license_number;            
    //         $Helper->address = $request->address;
    //         $Helper->p_address = $request->p_address;
    //         $Helper->dob = $request->dob == null ? $request->dob : date('Y-m-d',strtotime($request->dob));
    //         $Helper->vehicle_id = $request->vehicle_id;
    //         $Helper->save();
    //          $response=['status'=>1,'msg'=>'Created Successfully'];
    //         return response()->json($response); 
    //     }
    // }

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
    public function edit($id=null)
    {   
        $vehicles = array_pluck(Vehicle::get(['id','registration_no'])->toArray(),'registration_no', 'id');
        if ($id==null) {
         $driverHelper = '';   
        }
        if ($id!=null) {
          $driverHelper = DriverHelper::findOrFail(Crypt::decrypt($id));  
        }
        
        return view('admin.transport.helperedit',compact('driverHelper','vehicles'));
         
            
    }    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Helper  $Helper
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id=null)
    {
        $rules=[
        'name' => 'required|max:30', 
            'mobile' => 'required|digits:10', 
            'contact_no' => 'required|digits:10', 
            'license_number' => 'required|string', 
            'dob' => 'required|date', 
            'vehicle_id' => 'required', 
            'address' => 'required|string',  
       
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
            $Helper =DriverHelper::firstOrNew(['id'=>$id]);           
            $Helper->name = $request->name;
            $Helper->mobile = $request->mobile;
            $Helper->contact_no = $request->contact_no;         
            $Helper->license_number = $request->license_number;            
            $Helper->address = $request->address;
            $Helper->p_address = $request->p_address;
            $Helper->dob = $request->dob == null ? $request->dob : date('Y-m-d',strtotime($request->dob));
            $Helper->vehicle_id = $request->vehicle_id;
            $Helper->save();
             $response=['status'=>1,'msg'=>'Submit Successfully'];
            return response()->json($response); 
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
