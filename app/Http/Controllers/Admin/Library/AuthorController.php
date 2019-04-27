<?php

namespace App\Http\Controllers\Admin\Library;

use App\Http\Controllers\Controller;
use App\Model\Library\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
     public function index()
    {
    	$authors=Author::all();
    	 return view('admin.library.author.author_details',compact('authors'));
    }

    public function store(Request $request)
    {

    	$rules=[
    	  
            'name' => 'required', 
            'mobile_no' => 'required', 
            'email' => 'required', 
       
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
    	$author=new Author();
    	$author->name=$request->name;
    	$author->email=$request->email;
    	$author->mobile_no=$request->mobile_no;
    	$author->address=$request->address;
    	$author->save();
    	$response=['status'=>1,'msg'=>'Created Successfully'];
            return response()->json($response);
        } 
    }

    public function destroy($id)
    {
    	 $author=Author::findOrFail(Crypt::decrypt($id));
    	 $author->delete();
    	 return  redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);
    }


    public function edit($id)
    {   
        $authors=Author::findOrFail(Crypt::decrypt($id));
    	return view('admin.library.author.author_details_edit',compact('authors'));
    }


    public function update(Request $request,$id)
    {
    	$rules=[
    	  
            'name' => 'required', 
            'mobile_no' => 'required', 
            'email' => 'required', 
       
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
    	$author= Author::find($id);
    	$author->name=$request->name;
    	$author->email=$request->email;
    	$author->mobile_no=$request->mobile_no;
    	$author->address=$request->address;
    	$author->save();
    	$response=['status'=>1,'msg'=>'Update Successfully'];
            return response()->json($response);
        } 
    }
}
