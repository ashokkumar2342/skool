<?php

namespace App\Http\Controllers\Admin\Transport;

use App\Http\Controllers\Controller;
use App\Model\Transport\BoardingPoint;
use App\Model\Transport\Route;
use App\Model\Transport\RouteDetails;
use App\Model\Transport\Transport;
use App\Model\Transport\Vehicle;
use App\Model\Transport\VehicleType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
class  BoardingPointController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	 
        $BoardingPoints  = BoardingPoint::latest('created_at')->paginate(20);
        return view('admin.transport.boarding-point',compact('BoardingPoints'));
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
    	'name' => 'required|max:100', 
        'address' => 'required|string', 
        'single_side_fee_amount' => 'required|numeric', 
        'single_side_fee_amount' => 'required|numeric', 
         
          
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
            $BoardingPoint = new BoardingPoint(); 
            $BoardingPoint->name = $request->name;
            $BoardingPoint->address = $request->address; 
            $BoardingPoint->single_side_fee_amount = $request->single_side_fee_amount; 
            $BoardingPoint->both_side_fee_amount = $request->both_side_fee_amount; 
    
            $BoardingPoint->save();
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
    public function show(Vehicle $Vehicle)
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


          $boardingPoint = BoardingPoint::findOrFail(Crypt::decrypt($id));
       
         return view('admin.transport.boarding-point-edit',compact('boardingPoint'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Vehicle  $Vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request ,$id )
    {
        $rules=[
        'name' => 'required|max:100', 
           'address' => 'required|string', 
           'single_side_fee_amount' => 'required|numeric', 
           'single_side_fee_amount' => 'required|numeric', 
            
             
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
               $BoardingPoint =BoardingPoint::find($id);
               $BoardingPoint->name = $request->name;
               $BoardingPoint->address = $request->address; 
               $BoardingPoint->single_side_fee_amount = $request->single_side_fee_amount; 
               $BoardingPoint->both_side_fee_amount = $request->both_side_fee_amount; 
       
               $BoardingPoint->save();
                $response=['status'=>1,'msg'=>'update Successfully'];
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

        $BoardingPoint = BoardingPoint::findOrFail(Crypt::decrypt($id));
        $BoardingPoint->delete();
        return  redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);
    }


     
}