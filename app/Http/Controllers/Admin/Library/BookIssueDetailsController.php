<?php

namespace App\Http\Controllers\Admin\Library;

use App\Http\Controllers\Controller;
use App\Model\Library\BookAccession;
use App\Model\Library\BookIssueDetails;
use App\Model\Library\Book_Reserve;
use App\Model\Library\Booktype;
use App\Model\Library\LibraryMemberType;
use App\Model\Library\MemberShipDetails;
use App\Model\Library\MemberShipFacility;
use App\Model\Library\MemberTicketDetails;
use App\Model\Library\TicketDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class BookIssueDetailsController extends Controller
{
    public function index()
    {

         $memberShipRegistrationDetails=MemberShipDetails::all();
         $bookAccessions=BookAccession::all();
    	return view('admin.library.bookIssueDetails.book_issue_details',compact('memberShipRegistrationDetails','bookAccessions'));
    } 

    
    
    public function store(Request $request)
    {
          
         $rules=[ 
            'registration_no'=>'required',
            'accession_no' => 'required',
            'ticket_no' => 'required',
       
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
 
          $memberHasTicketsId=MemberTicketDetails::where('member_ship_details_id',$request->registration_no)->pluck('ticket_no')->toArray();
          
          $bookAccession=BookAccession::where('id',$request->accession_no)->first();
          if ($bookAccession->status==3) { 
            $bookReserve=Book_Reserve::where('accession_no',$request->accession_no)->where('member_ship_no_id',$request->registration_no)->where('status',2)->first();
              if ($bookReserve==null) {
                 $response=['status'=>0,'msg'=>'Book Reserved For Other User'];
               return response()->json($response);  
              }
          }elseif($bookAccession->status==2){
             $response=['status'=>0,'msg'=>'Book Already Issue'];
             return response()->json($response);  
          }elseif($bookAccession->status==4){
            $response=['status'=>0,'msg'=>'Book Invalied'];
             return response()->json($response); 
          }else{

          }

          
         
         $bookIssueDetails=new BookIssueDetails(); 
        $bookIssueDetails->registration_no=$request->registration_no;
         $bookIssueDetails->accession_no=$request->accession_no;
         $bookIssueDetails->ticket_no=$request->ticket_no;
         $bookIssueDetails->status=2;
         $bookIssueDetails->issue_date=date('Y-m-d');         
         $memberHasTicketsId=MemberTicketDetails::where('member_ship_details_id',$request->registration_no)->pluck('ticket_no')->toArray();
         // $bookIssueAccessionId=BookIssueDetails::where('accession_no',$request->accession_no)->first();
         // if (!empty($bookIssueAccessionId)) {
         //   $response=['status'=>0,'msg'=>'Book Already Issue'];
         //   return response()->json($response);
         // } 
         if (in_array($request->ticket_no,$memberHasTicketsId)) {
            $bookIssueDetailsId=BookIssueDetails::where('registration_no',$request->registration_no)->pluck('ticket_no')->toArray();
              if (in_array($request->ticket_no,$bookIssueDetailsId)) {                   
                  $response=['status'=>0,'msg'=>'Ticket Already Issue'];
                  return response()->json($response);
              }else{
                 $memberShipFacilityId=MemberTicketDetails::where('ticket_no',$request->ticket_no)->first()->member_ship_facility_id;
                 $membershipfacility= MemberShipFacility::find($memberShipFacilityId);
                  $bookIssueDetails->issue_upto_date =date('Y-m-d',strtotime(date('Y-m-d')."+".$membershipfacility->no_of_days." days"));
                  $bookIssueDetailsHistorys=BookIssueDetails::where('registration_no',$request->registration_no)->get();
                 $bookIssueDetails->save();
                 $this->accessionStatusUpdate($request->accession_no,2);
                 $response = array();
                  $response['status'] = 1;
                  $response['msg'] = 'Issue Successfully';
                  $response['data'] =view('admin.library.bookIssueDetails.book_issue_history',compact('bookIssueDetailsHistorys'))->render(); 
                    return response()->json($response); 
              }

         }else{
          $response=['status'=>0,'msg'=>'Ticket Not Match'];
            return response()->json($response);
         }       
          
         $response=['status'=>1,'msg'=>'Something Went Wrong'];
            return response()->json($response);
        }
    }
   
    public function registrationOnchange(Request $request)
    {
        $memberShipRegistrationDetails=MemberShipDetails::find($request->id);     
       return view('admin.library.bookIssueDetails.book_issue_registration_by_show',compact('memberShipRegistrationDetails'));
    }
    public function accessionOnchange(Request $request)
    {
         $bookAccession=BookAccession::where('id',$request->id)->first();
         $bookType=Booktype::where('id',$bookAccession->book_id)->first(); 
       return view('admin.library.bookIssueDetails.book_accession_by_details_show',compact('bookAccession','bookType'));
    }
    public function bookIssueHistory($id)
    { 
      $bookIssueDetailsHistorys=BookIssueDetails::where('registration_no',$id)->get(); 
       return view('admin.library.bookIssueDetails.book_issue_history',compact('bookIssueDetailsHistorys'));
    }
    public function bookReturn()
    {
      return view('admin.library.bookReturn.view');
    }
    public function bookSearch(Request $request)
    {
       $bookAccession=BookAccession::where('accession_no',$request->accession_no)->first(); 
     $bookIssueDetail=BookIssueDetails::where('accession_no',$bookAccession->id)->where('status',2)->first();
      if (!empty($bookIssueDetail)) {
        $response = array();
        $response['status'] = 1; 
        $response['data'] =view('admin.library.bookReturn.book_issue_search_table',compact('bookIssueDetail'))->render(); 
              return response()->json($response); 
      }
      $response = array();
      $response['status'] = 1; 
      $response['msg'] ='Book Not Issue'; 
            return $response; 
      
    }
    public function returnUpdate(Request $request,$id)
    { 
      //book return date and status change
      $bookIssueDetail=BookIssueDetails::find($id); 
      $bookIssueDetail->return_date=date('Y-m-d');
      $bookIssueDetail->status=1;
      $bookIssueDetail->save();
      //end return date status
      //book reserve check and status change
      $bookAccession=BookAccession::find($bookIssueDetail->accession_no);
      $bookReserveUpdate=Book_Reserve::where('status',1)->where('book_name_id',$bookAccession->book_id)->first(); 
      $bookReserveUpdateReserve=Book_Reserve::where('status',2)->where('accession_no',$bookIssueDetail->accession_no)->where('book_name_id',$bookAccession->book_id)->first(); 
       if (!empty($bookReserveUpdateReserve)) { 
          $bookReserveUpdateReserve->status=5;
          $bookReserveUpdateReserve->save();   
       }
       if (!empty($bookReserveUpdate) ) {
        $bookReserveUpdate->reserve_date=date('Y-m-d');
        $bookReserveUpdate->accession_no=$bookIssueDetail->accession_no;
        $bookReserveUpdate->reserve_upto_date=date('Y-m-d',strtotime(date('Y-m-d')."+2 days"));
        $bookReserveUpdate->status=2;
        $bookReserveUpdate->save();   
       $this->accessionStatusUpdate($bookIssueDetail->accession_no,3); 
       }else{
         $this->accessionStatusUpdate($bookIssueDetail->accession_no,1);

       }
 
       return redirect()->back()->with(['message'=>'Book Return Successfully','class'=>'success']);

             
    
 
 

    }
     public function accessionStatusUpdate($accession_no,$status)
    {
      $bookAccession=BookAccession::find($accession_no);
      $bookAccession->status=$status;
      $bookAccession->save();
      
    }  
    // public function reserveBookStatusUpdate($accession_no,$status)
    // {
    //   $bookAccession=BookAccession::find($accession_no);
    //   $bookAccession->status=$status;
    //   $bookAccession->save();
      
    // }
}
