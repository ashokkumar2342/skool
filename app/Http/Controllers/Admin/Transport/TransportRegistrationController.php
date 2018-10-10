<?php

namespace App\Http\Controllers\Admin\Transport;

use App\Http\Controllers\Controller;
use App\Model\Transport\BoardingPoint;
use App\Model\Transport\Route;
use App\Model\Transport\Transport;
use App\Model\Transport\TransportRegistration;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class TransportRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
        $routes = array_pluck(Route::get(['id','name'])->toArray(),'name', 'id');
        $boardingPoints = array_pluck(BoardingPoint::get(['id','name'])->toArray(),'name', 'id');
        $students = array_pluck(Student::get(['id','registration_no'])->toArray(),'registration_no', 'id');
        $transportRegistrations = TransportRegistration::get();
        return view('admin.transport.transportRegistration',compact('transportRegistrations','students','routes','boardingPoints'));
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
    	'student_id' => 'required|max:30', 
            'morning_route_id' => 'required', 
            'evening_route_id' => 'required', 
            'morning_boarding_point_id' => 'required|string', 
            'evening_boarding_point_id' => 'required', 
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
            $Transport = new TransportRegistration();
            
            $Transport->student_id = $request->student_id;
            $Transport->morning_route_id = $request->morning_route_id;
            $Transport->evening_route_id = $request->evening_route_id;
            $Transport->morning_boarding_point_id = $request->morning_boarding_point_id;
            $Transport->evening_boarding_point_id = $request->evening_boarding_point_id;
             
            $Transport->save();
             $response=['status'=>1,'msg'=>'Created Successfully'];
            return response()->json($response); 
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Transport  $Transport
     * @return \Illuminate\Http\Response
     */
    public function show(Transport $Transport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Transport  $Transport
     * @return \Illuminate\Http\Response
     */
    public function edit(Transport $Transport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Transport  $Transport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transport $Transport)
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
            $Transport =  Transport::find($request->id);
            // return $Transport;
            $Transport->code = $request->code;
            $Transport->name = $request->name;
            $Transport->description = $request->description;
            $Transport->save();
            return response()->json([$Transport,'class'=>'success','message'=>'Fee Account Created Successfully']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Transport  $Transport
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
        $Transport = TransportRegistration::findOrFail(Crypt::decrypt($id));
        $Transport->delete();
        return  redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);
    }
}
