<?php

namespace App\Http\Controllers\Admin\Library;

use App\Http\Controllers\Controller;
use App\Model\Library\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
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
            'name' => 'required|max:199', 
            'mobile_no' =>'required|digits:10', 
            'email' => "required|max:50|email", 
            "address" => 'max:1000|nullable',
            "email" => 'max:50|nullable',
              
       
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
    	  
    	$publisher->address=$request->address; 
    	$publisher->save();
    	$response=['status'=>1,'msg'=>'Created Successfully'];
            return response()->json($response); 
        }
    }


   public function destroy($id)
   {
   	 $publisher=Publisher::findOrFail(Crypt::decrypt($id));
   	 $publisher->delete();
   	 return  redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);

   }

    public function edit($id)
   {
   	 $publishers=Publisher::findOrFail(Crypt::decrypt($id));
   	  return view('admin.library.publisher.publisher_details_edit',compact('publishers'));

   }
     public function update(Request $request,$id)
     {
     	$rules=[
        'code' => 'required|max:4', 
            'name' => 'required|max:50', 
            'mobile_no' => 'required|digits:10', 
            'email' => 'required|max:50|email', 
              
            'address' => 'required|max:1000', 
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
        $publisher= Publisher::find($id); 
        $publisher->code=$request->code; 
        $publisher->name=$request->name; 
        $publisher->mobile_no=$request->mobile_no; 
        $publisher->email=$request->email; 
         
        $publisher->address=$request->address; 
        $publisher->save();
        $response=['status'=>1,'msg'=>'Update Successfully'];
            return response()->json($response); 
        }
    }
}
