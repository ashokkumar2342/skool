<?php

namespace App\Http\Controllers\Admin\SchoolDetails;

use App\Http\Controllers\Controller;
use App\School_details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SchoolDetailsController extends Controller
{
    public function index()
    {
    	 return view('schoolDetails.view');
    }
    public function addForm()
    {
    	 return view('schoolDetails.add_form');
    }
    public function store(Request $request)
    {

    	$rules=[
    	  
            // 'name' => 'required', 
            // 'mobile' => 'required|digits:10', 
            // 'contact' => 'required|digits:10', 
            // 'logo' => 'required', 
            // 'image' => 'required', 
            // 'address' => 'required', 
             
       
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

    	$request->hasFile('image');
    	$request->hasFile('logo');        
            $image=$request->image;
            $logoImage=$request->logo;
            $filename='image'.date('d-m-Y').time().'.jpg'; 
            $filelogo='logo'.date('d-m-Y').time().'.jpg'; 
            $image->storeAs('public/school/',$filename); 
            $logoImage->storeAs('public/school/',$filelogo); 
    	$schoolDetails= new School_details(); 
    	$schoolDetails->name=$request->name; 
    	$schoolDetails->mobile=$request->mobile; 
    	$schoolDetails->contact=$request->contact; 
    	$schoolDetails->logo=$filelogo; 
    	$schoolDetails->image=$filename; 
    	$schoolDetails->address=$request->address; 
    	$schoolDetails->save();
    	$response=['status'=>1,'msg'=>'Created Successfully'];
            return response()->json($response);
        

        }  
    }
    public function tableShow()
    {
         $SchoolDetails=School_details::all();
         return view('schoolDetails.table_show',compact('SchoolDetails'));
    }
}
