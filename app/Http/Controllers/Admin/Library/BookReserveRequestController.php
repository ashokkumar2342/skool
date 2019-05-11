<?php

namespace App\Http\Controllers\Admin\Library;

use App\Http\Controllers\Controller;
use App\Model\Library\BookReserveRequest;
use App\Model\Library\BookStatus;
use App\Model\Library\Booktype;
use App\Model\Library\LibraryMemberType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class BookReserveRequestController extends Controller
{
    public function index()
    {
    	return view('admin.library.bookReserveRequest.book_reserve_request');
    } 

    public function addForm()
    {    
    	$bookstatuss=BookStatus::all();
    	 $booktypes=Booktype::orderBy('name','asc')->get();
    	 $librarymembertypes= LibraryMemberType::all();
    	return view('admin.library.bookReserveRequest.book_reserve_request_add_form',compact('librarymembertypes','booktypes','bookstatuss'));
    }
    
     public function store(Request $request)
    {
    	// return $request;
         $rules=[
        
            
            'member_ship_type' => 'required', 
            'book_name' => 'required', 
            'upto_request_date' => 'required', 
            'request_valid_upto' => 'required', 
            'status' => 'required', 
            'issue_date' => 'required', 
       
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
    	 $bookReserveRequest= new BookReserveRequest();
    	 $bookReserveRequest->member_ship_type_id=$request->member_ship_type;
    	 $bookReserveRequest->book_name_id=$request->book_name;
    	 $bookReserveRequest->book_reserve_request=$request->upto_request_date;
    	 $bookReserveRequest->due_date=$request->request_valid_upto;
    	 $bookReserveRequest->status=$request->status;
    	 $bookReserveRequest->issue_date=$request->issue_date; 
    	 $bookReserveRequest->save();
         $response=['status'=>1,'msg'=>'Created Successfully'];
            return response()->json($response);
        } 
    }

    public function tableShow()
    {
    	 $bookReserveRequests= BookReserveRequest::all();
    	return view('admin.library.bookReserveRequest.book_reserve_request_table',compact('bookReserveRequests')); 
    } 
    public function edit($id)
    {
      $bookstatuss=BookStatus::all();
       $booktypes=Booktype::orderBy('name','asc')->get();
       $librarymembertypes= LibraryMemberType::all();
       $bookReserveRequests= BookReserveRequest::findOrFail(Crypt::decrypt($id));
      return view('admin.library.bookReserveRequest.book_reserve_request_edit',compact('bookReserveRequests','bookstatuss','booktypes','librarymembertypes')); 
    }
    public function destroy($id)
    {
       $bookReserveRequests= BookReserveRequest::findOrFail(Crypt::decrypt($id));
       $bookReserveRequests->delete();
       return  redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);
    }

    public function update(Request $request,$id)
    {
      // return $request;
         $rules=[
        
            
            'member_ship_type' => 'required', 
            'book_name' => 'required', 
            'upto_request_date' => 'required', 
            'request_valid_upto' => 'required', 
            'status' => 'required', 
            'issue_date' => 'required', 
       
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
       $bookReserveRequest= BookReserveRequest::find($id);
       $bookReserveRequest->member_ship_type_id=$request->member_ship_type;
       $bookReserveRequest->book_name_id=$request->book_name;
       $bookReserveRequest->book_reserve_request=$request->upto_request_date;
       $bookReserveRequest->due_date=$request->request_valid_upto;
       $bookReserveRequest->status=$request->status;
       $bookReserveRequest->issue_date=$request->issue_date; 
       $bookReserveRequest->save();
         $response=['status'=>1,'msg'=>'Update Successfully'];
            return response()->json($response);
        } 
    }


}
