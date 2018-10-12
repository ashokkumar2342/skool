<?php

namespace App\Http\Controllers\Admin\Transport;

use App\Http\Controllers\Controller;
use App\Model\Transport\Route;
use App\Model\Transport\RouteVehicle;
use App\Model\Transport\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RouteVehicleController extends Controller
{
    public function index()
    {
         $routes = Route::get(['id','name']);
    	  
        return view('admin.transport.route-vehicle',compact('routes'));
    }

    public function getVehicle(Request $request)
    {       
         $route_id  = $request->route_id;
         $vehicles  = Vehicle::get();
         $routesVehicle  = RouteVehicle::where('route_id',$route_id)->first();
           
         return view('admin.transport.vehicle-result',compact('vehicles','route_id','routesVehicle'))->render();
    }

    public function store(Request $request)
    {    
            $rules=[
            'route_id' => 'required', 
             'vehicle_id' => 'required', 
                 
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
                   $route = RouteVehicle::firstOrNew(['route_id'=>$request->route_id]);
                          
                  $route->vehicle_id = implode(',', $request->vehicle_id);
                  $route->route_id = $request->route_id; 
                  
                  $route->morning_time = $request->morning;
                  $route->evening_time = $request->evening;
                
                  $route->save();
                 $response=['status'=>1,'msg'=>'Save Successfully'];
                return response()->json($response); 
            } 
         
    }
}
