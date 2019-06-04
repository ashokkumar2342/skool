<?php

namespace App\Http\Controllers\Admin\Library;

use App\Http\Controllers\Controller;
use App\Model\Library\BookAccession;
use App\Model\Library\BookIssueDetails;
use App\Model\Library\BookStatus;
use App\Model\Library\Book_Reserve;
use App\Model\Library\Booktype;
use App\Model\Library\LibraryMemberType;
use App\Model\Library\LibraryStatus;
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
    	 
    	 $booktypes=Booktype::orderBy('name','desc')->get();
    	 $memberShipDetails= MemberShipDetails::all();
    	return view('admin.library.bookReserve.book_reserve_request_add_form',compact('memberShipDetails','booktypes'));
    }

    public function bookAccession(Request $request)
    {  
        $bookAccessionWiseNames=BookAccession::where('book_id',$request->id)->get();
      return view('admin.library.bookReserve.accession_no_select_box',compact('bookAccessionWiseNames'));
    }
    
     public function registrationWiseHistory(Request $request)
    {  
       $bookReserves=Book_Reserve::where('member_ship_no_id',$request->id)->get();
      return view('admin.library.bookReserve.registration_wise_history',compact('bookReserves'));
    } 

     public function bookAccessionWiseHistory(Request $request)
    {  
      // return $request;
       $bookAccessionStatus=BookAccession::where('id',$request->id)->first();
       $bookAccessionFindStatusId=BookAccession:: find($request->id);
       $libraryStatus=LibraryStatus::where('id',$bookAccessionStatus->status)->first();
       $bookReserves=Book_Reserve::where('accession_no',$request->id)->orderBy('id','asc')->get();
      return view('admin.library.bookReserve.accession_wise_history',compact('bookReserves','libraryStatus'));
    }
    
     public function store(Request $request)
    {
    	  // return $request;
         $rules=[ 
            'member_ship_registration_no' => 'required', 
            'book_name' => 'required', 
             
      ];

      $validator = Validator::make($request->all(),$rules);
      if ($validator->fails()) {
          $errors = $validator->errors()->all();
          $response=array();
          $response["status"]=0;
          $response["msg"]=$errors[0];
          return response()->json($response);// response as json
      } else{

             
            $bookAccession=BookAccession::where('book_id',$request->book_name)->where('status',1)->first();
    
              // $bookReserve=Book_Reserve::where('accession_no',$bookAccession->id)->where('member_ship_no_id',$request->member_ship_registration_no)->first();
              if ($bookAccession!=null) { 
              $this->bookAccessionStatusUpdate($bookAccession->id);
                $bookReserveRequest= new Book_Reserve();
                $bookReserveRequest->member_ship_no_id=$request->member_ship_registration_no; 
                $bookReserveRequest->book_name_id=$request->book_name;
                $bookReserveRequest->accession_no=$bookAccession->id;
                $bookReserveRequest->request_date=date('Y-m-d');
                $bookReserveRequest->reserve_date=date('Y-m-d');
                $bookReserveRequest->reserve_upto_date=date('Y-m-d',strtotime(date('Y-m-d')."+2 days")); 
                $bookReserveRequest->status=2; 
                $bookReserveRequest->save();
               
               $response=['status'=>1,'msg'=>'Reserve Successfully'];
                   return response()->json($response);
                 }
               else{   
                    
                        $bookReserveRequest= new Book_Reserve();
                        $bookReserveRequest->member_ship_no_id=$request->member_ship_registration_no; 
                        $bookReserveRequest->book_name_id=$request->book_name;                      
                        $bookReserveRequest->request_date=date('Y-m-d');
                        $bookReserveRequest->status=1; 
                        $bookReserveRequest->save();
                        $response=['status'=>1,'msg'=>'Request Successfully'];
                             return response()->json($response);
                      
                   // }else{
                   //     $response=['status'=>0,'msg'=>'Already Reserve']; 
                   //     return response()->json($response);
                   // }
                
               }
      }

        
    }

    public function bookAccessionStatusUpdate($accession_no)
    {
    	   $bookAccession=BookAccession::find($accession_no);
         $bookAccession->status=3;
         $bookAccession->save();
    } 
     


     public function tableShow()
    {
       $bookReserveRequests= Book_Reserve::all();


      return view('admin.library.bookReserve.book_reserve_request_table',compact('bookReserveRequests')); 
    } 
    public function cancelUpToDate()
    {
      
       $bookReserveRequests= Book_Reserve::where('status',2)->get();
       foreach ($bookReserveRequests as $bookReserveRequest) {
             
             if ($bookReserveRequest->reserve_upto_date < date('Y-m-d',strtotime(date('Y-m-d')."+2 days"))) {
                $bookReservesUptoDate=Book_Reserve::find($bookReserveRequest->id);
                $bookReservesUptoDate->status=3;
                $bookReservesUptoDate->save();
                 $this->reserveUpdate($bookReserveRequest->accession_no);
             }
       }
      
        return  redirect()->back()->with(['message'=>'Reserve Upto Expiry All Canceled Successfully','class'=>'success']);
       
    }
     public function cancel($id)
    {
       $bookReserveRequests= Book_Reserve::find($id);
       $bookReserveRequests->status=3;
       $bookReserveRequests->save();
       $this->accessionStatusCancelByUpdate($bookReserveRequests->accession_no);
       $this->reserveUpdate($bookReserveRequests->accession_no);
      return  redirect()->back()->with(['message'=>'Cancel Successfully','class'=>'success']);
       
    }
    public function accessionStatusCancelByUpdate($accession_no)
    {
         $bookAccession=BookAccession::find($accession_no);
         $bookAccession->status=1;
         $bookAccession->save();

    }

    public function reserveUpdate($accession_no)
    {
      $bookAccession=BookAccession::find($accession_no);
      $bookReserveUpdate=Book_Reserve::where('status',1)->where('book_name_id',$bookAccession->book_id)->first();
      $bookReserveUpdate->reserve_date=date('Y-m-d');
      $bookReserveUpdate->accession_no=$accession_no;
      $bookReserveUpdate->reserve_upto_date=date('Y-m-d',strtotime(date('Y-m-d')."+2 days"));
      $bookReserveUpdate->status=2;
      $bookReserveUpdate->save();

    }
    //  public function accessionStatusUpdate($accession_no,$status)
    // {
    //   $bookAccession=BookAccession::find($accession_no);
    //   $bookAccession->status=$status;
    //   $bookAccession->save();
      
    // }  
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
