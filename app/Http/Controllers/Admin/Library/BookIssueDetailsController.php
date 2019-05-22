<?php

namespace App\Http\Controllers\Admin\Library;

use App\Http\Controllers\Controller;
use App\Model\Library\BookAccession;
use App\Model\Library\BookIssueDetails;
use App\Model\Library\Booktype;
use App\Model\Library\LibraryMemberType;
use App\Model\Library\MemberShipDetails;
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
         $bookIssueDetails=new BookIssueDetails(); 
         $bookIssueDetails->registration_no=$request->registration_no;
         $bookIssueDetails->accession_no=$request->accession_no;
         $bookIssueDetails->ticket_no=$request->ticket_no;
         $bookIssueDetails->issue_date=$request->issue_date;
         $bookIssueDetails->issue_up_to_date=$request->issue_upto_date;
         $bookIssueDetails->return_able=$request->return_able;
         $bookIssueDetails->save();
         $response=['status'=>1,'msg'=>'Issue Successfully'];
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
}
