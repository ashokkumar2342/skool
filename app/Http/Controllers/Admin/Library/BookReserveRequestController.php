<?php

namespace App\Http\Controllers\Admin\Library;

use App\Http\Controllers\Controller;
 
use App\Model\Library\BookStatus;
use App\Model\Library\Book_Reserve;
use App\Model\Library\Booktype;
use App\Model\Library\LibraryMemberType;
use App\Model\Library\MemberShipDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class BookReserveRequestController extends Controller
{
    public function index()
    {
    	return view('admin.library.bookReserve.book_reserve_request');
    } 

    public function addForm()
    {    
    	 
    	 $booktypes=Booktype::orderBy('name','asc')->get();
    	 $memberShipDetails= MemberShipDetails::all();
    	return view('admin.library.bookReserve.book_reserve_request_add_form',compact('memberShipDetails','booktypes'));
    }
    
     public function store(Request $request)
    {
    	// return $request;
         $rules=[
        
            
            'member_ship_registration_no' => 'required', 
            'book_name' => 'required', 
            'request_date' => 'required', 
             
            
       
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
    	 $bookReserveRequest= new Book_Reserve();
    	 $bookReserveRequest->member_ship_no_id=$request->member_ship_registration_no;
       $bookReserve=Book_Reserve::where('book_name_id',$request->book_name)->first();
       if (empty($bookReserve)){
    	 $bookReserveRequest->book_name_id=$request->book_name;
       }else{ 
         $response=['status'=>0,'msg'=>'Book Already Reserve'];
        return response()->json($response);
            }
    	 $bookReserveRequest->reserve_date=$request->request_date == null ? $request->request_date : date('Y-m-d',strtotime($request->request_date));
    	 $bookReserveRequest->status=1; 
    	 $bookReserveRequest->save();
         $response=['status'=>1,'msg'=>'Created Successfully'];
            return response()->json($response);
        } 
    }

    public function tableShow()
    {
    	 $bookReserveRequests= Book_Reserve::all();
    	return view('admin.library.bookReserve.book_reserve_request_table',compact('bookReserveRequests')); 
    } 
    // public function edit($id)
    // {
    //   $bookstatuss=BookStatus::all();
    //    $booktypes=Booktype::orderBy('name','asc')->get();
    //    $librarymembertypes= LibraryMemberType::all();
    //    $bookReserveRequests= Book_Reserve::findOrFail(Crypt::decrypt($id));
    //   return view('admin.library.bookReserve.book_reserve_request_edit',compact('bookReserveRequests','bookstatuss','booktypes','librarymembertypes')); 
    // }
     public function destroy($id)
    {
       $bookReserveRequests= Book_Reserve::findOrFail(Crypt::decrypt($id));
       $bookReserveRequests->delete();
       return  redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);
    }

    public function update(Request $request,$id)
    {
      // return $request;
        $rules=[
        
            
            'member_ship_registration_no' => 'required', 
            'book_name' => 'required', 
            'request_date' => 'required', 
             
            
       
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
       $bookReserveRequest= new Book_Reserve();
       $bookReserveRequest->member_ship_no_id=$request->member_ship_registration_no;
       $bookReserveRequest->book_name_id=$request->book_name;
       $bookReserveRequest->reserve_date=$request->request_date;
       $bookReserveRequest->status=$request->status; 
       $bookReserveRequest->save();
         $response=['status'=>1,'msg'=>'Created Successfully'];
            return response()->json($response);
        } 
         
    }


}
