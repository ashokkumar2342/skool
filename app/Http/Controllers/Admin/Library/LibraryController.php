<?php

namespace App\Http\Controllers\Admin\Library;

use App\Http\Controllers\Controller;
use App\Model\Library\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LibraryController extends Controller
{
    public function index()
    {   
    	$publishers=Publisher::all();
    	return view('admin.library.publisher.publisher_details',compact('publishers'));
    }

    public function store(Request $request)
    {
    	$rules=[
    	'code' => 'required|max:4', 
            'name' => 'required', 
            'mobile_no' => 'required', 
            'email' => 'required', 
            'dob' => 'required', 
              
       
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
    	$publisher=new Publisher(); 
    	$publisher->code=$request->code; 
    	$publisher->name=$request->name; 
    	$publisher->mobile_no=$request->mobile_no; 
    	$publisher->email=$request->email; 
    	$publisher->dob=$request->dob; 
    	$publisher->address=$request->address; 
    	$publisher->save();
    	$response=['status'=>1,'msg'=>'Created Successfully'];
            return response()->json($response); 
        }
    }


   public function destroy($id)
   {
   	 $publisher=Publisher::find($id);
   	 $publisher->delete();
   	 return  redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);

   }

    public function edit($id)
   {
   	 $publishers=Publisher::find($id);
   	  return view('admin.library.publisher.publisher_details_edit',compact('publishers'));

   }
     public function update(Request $request,$id)
     {
     	$publisher= Publisher::find($id); 
    	$publisher->code=$request->code; 
    	$publisher->name=$request->name; 
    	$publisher->mobile_no=$request->mobile_no; 
    	$publisher->email=$request->email; 
    	$publisher->dob=$request->dob; 
    	$publisher->address=$request->address; 
    	$publisher->save();
    	return redirect()->back(); 
     }
}
