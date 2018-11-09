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
class RouteDetailsController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $routes = Route::get(['id','name']);
    	 $boardingPoints = array_pluck(BoardingPoint::get(['id','name'])->toArray(),'name', 'id'); 
         $vehicles = array_pluck(Vehicle::get(['id','registration_no'])->toArray(),'registration_no', 'id'); 
        $routesDetails  = RouteDetails::latest('created_at')->paginate(20);
        return view('admin.transport.route-details',compact('routesDetails','routes','vehicles','boardingPoints'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getBoardingPoint(Request $request)
    {       
         $route_id  = $request->route_id;
         $boardingPoints  = BoardingPoint::get();
         $routesDetail  = RouteDetails::where('route_id',$route_id)->first();
           
         return view('admin.transport.boarding-point-result',compact('boardingPoints','route_id','routesDetail'))->render();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    return $reqeust;
            $rules=[
            'route_id' => 'required', 
             'boarding_point_id' => 'required', 
                 
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
                   $route = RouteDetails::firstOrNew(['route_id'=>$request->route_id]);
                          
                  $route->boarding_point_id = implode(',', $request->boarding_point_id);
                  $route->route_id = $request->route_id; 
                  
                  $route->morning_time = implode(',', $request->morning_time);
                  $route->evening_time = implode(',', $request->evening_time);                
                  $route->save();
                 $response=['status'=>1,'msg'=>'Save Successfully'];
                return response()->json($response); 
            }

           
        //  foreach ($request->value as $key => $value) {
          
        //    $route = RouteDetails::where(['route_id'=>$request->route_id,'boarding_point_id'=>$key])->firstOrNew(['boarding_point_id'=>$key]);
           
        //    $route->boarding_point_id = $key;
        //    $route->route_id = $request->route_id; 
           
        //    $route->morning_time = $value;
         
        //    $route->save();

        // }
              
          
         
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Vehicle  $Vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
      $route_id  = $request->route_id; 
      $boardingPoints  = BoardingPoint::get();
      $routesDetail   = RouteDetails::where('route_id',$route_id)->first();
        
      return view('admin.transport.route-details-view',compact('boardingPoints','route_id','routesDetail'))->render();  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Vehicle  $Vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle $Vehicle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Vehicle  $Vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicle $Vehicle)
    {
        // return $request;
        $validator = Validator::make($request->all(), [
        
            
            'name' => 'required|max:30|unique:fee_accounts', 
            'description' => 'max:100', 
              
        ]);
        if ($validator->fails()) {                    
             return response()->json(['errors'=>$validator->errors()->all(),'class'=>'error']); 

        } else {
           $route = new Route(); 
         $route->name = $request->name;
         $route->description = $request->description;  
         $route->save();
           return response()->json([$Vehicle,'class'=>'success','message'=>'Update Successfully']);
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

        $Vehicle = RouteDetails::findOrFail(Crypt::decrypt($id));
        $Vehicle->delete();
        return  redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);
    }


     
}