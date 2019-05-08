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
    	
    	// $subjects = SubjectType::orderBy('name','asc')->get();
    	// $publishers = Publisher::orderBy('name','asc')->get();
    	// $authors = Author::orderBy('name','asc')->get();
    	 return view('admin.library.books.books_details');
    } 
    public function addForm()
    {
      
      $subjects = SubjectType::orderBy('name','asc')->get();
      $publishers = Publisher::orderBy('name','asc')->get();
      $authors = Author::orderBy('name','asc')->get();
       return view('admin.library.books.books_details_add_form',compact('subjects','publishers','authors','booktypes'));
    }

    public function store(Request $request)
    {
    	 $rules=[
          
            'name' => 'required', 
            'code' => 'required', 
            'edition' => 'required', 
            'price' => 'required', 
            
            'subject_id' => 'required', 
            'publisher_id' => 'required', 
            'author_id' => 'required', 
            
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
                $image=$request->image;
                $filename='book'.date('d-m-Y').time().'.jpg'; 
                $image->storeAs('public/student/bookimage/',$filename);
                $booktype=new Booktype();
                $booktype->image=$filename;
                $booktype->code=$request->code;
                $booktype->name=$request->name;
                $booktype->edition=$request->edition;
                $booktype->price=$request->price;
                $booktype->no_of_pages=$request->no_of_pages;
                $booktype->subject_id=$request->subject_id;
                $booktype->publisher_id=$request->publisher_id;
                $booktype->author_id=$request->author_id;
                $booktype->feature=$request->feature;
                $booktype->save();
               $response=['status'=>1,'msg'=>'Created Successfully'];
                return response()->json($response);
             
            }
            else{
               $booktype= new Booktype(); 
               $booktype->code=$request->code;
               $booktype->name=$request->name;
               $booktype->edition=$request->edition;
               $booktype->price=$request->price;
               $booktype->no_of_pages=$request->no_of_pages;
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
    public function tableShow($value='')
    { 
        $booktypes=Booktype::all();
         return view('admin.library.books.books_table',compact('booktypes'));
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

    public function update(Request $request,$id)
    {
    $rules=[
          
            'name' => 'required', 
            'code' => 'required', 
            'edition' => 'required', 
            'price' => 'required', 
            
            'subject_id' => 'required', 
            'publisher_id' => 'required', 
            'author_id' => 'required', 
            
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
                $image=$request->image;
                $filename='book'.date('d-m-Y').time().'.jpg'; 
                $image->storeAs('public/student/bookimage/',$filename);
                $booktype= Booktype::find($id);
                $booktype->image=$filename;
                $booktype->code=$request->code;
                $booktype->name=$request->name;
                $booktype->edition=$request->edition;
                $booktype->price=$request->price;
                $booktype->no_of_pages=$request->no_of_pages;
                $booktype->subject_id=$request->subject_id;
                $booktype->publisher_id=$request->publisher_id;
                $booktype->author_id=$request->author_id;
                $booktype->feature=$request->feature;
                $booktype->save();
               $response=['status'=>1,'msg'=>'Update Successfully'];
                return response()->json($response);
             
            }
            else{
               $booktype= Booktype::find($id); 
               $booktype->code=$request->code;
               $booktype->name=$request->name;
               $booktype->edition=$request->edition;
               $booktype->price=$request->price;
               $booktype->no_of_pages=$request->no_of_pages;
               $booktype->subject_id=$request->subject_id;
               $booktype->publisher_id=$request->publisher_id;
               $booktype->author_id=$request->author_id;
               $booktype->feature=$request->feature;
               $booktype->save();
              $response=['status'=>1,'msg'=>'Update Successfully'];
               return response()->json($response);  
            }
    }
}
}
