<?php

namespace App\Http\Controllers\Admin\Library;

use App\Http\Controllers\Controller;
use App\Model\Library\Author;
use App\Model\Library\Booktype;
use App\Model\Library\Publisher;
use App\Model\SubjectType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BooksController extends Controller
{
     public function index()
    {
    	$booktypes=Booktype::all();
    	$subjects = SubjectType::orderBy('name','asc')->get();
    	$publishers = Publisher::orderBy('name','asc')->get();
    	$authors = Author::orderBy('name','asc')->get();
    	 return view('admin.library.books.books_details',compact('subjects','publishers','authors','booktypes'));
    }

    public function store(Request $request)
    {
    	$rules=[
    	  
            'name' => 'required', 
            
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

    if ($request->hasFile('image')) { 
    	foreach ($request->image as $image) {
    		$filename=$image->getClientOriginalName(); 
            $image->storeAs('public/student/bookimage/',$filename);
            $booktype=new Booktype();
            $booktype->image=$filename;
            $booktype->code=$request->code;
            $booktype->name=$request->name;
            $booktype->subject_id=$request->subject_id;
            $booktype->publisher_id=$request->publisher_id;
            $booktype->author_id=$request->author_id;
            $booktype->feature=$request->feature;
            $booktype->save();
           $response=['status'=>1,'msg'=>'Created Successfully'];
            return response()->json($response);
        } 
             
 
            }
        }

    }

    public function edit($id)
    {
    	$booktypes= Booktype::find($id);
    	$subjects = SubjectType::orderBy('name','asc')->get();
    	$publishers = Publisher::orderBy('name','asc')->get();
    	$authors = Author::orderBy('name','asc')->get();
    	 return view('admin.library.books.books_details_edit',compact('subjects','publishers','authors','booktypes'));
    }

    public function destroy($id)
    {
    	$booktypes= Booktype::find($id);
    	$booktypes->delete();
    	 return  redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']); 
    }

}

