<?php

namespace App\Http\Controllers\Admin\Library;

use App\Http\Controllers\Controller;
use App\Model\Library\BookAccession;
use App\Model\Library\BookIssueDetails;
use App\Model\Library\LibraryMemberType;
use App\Model\Library\TicketDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class BookIssueDetailsController extends Controller
{
    public function index()
    {
    	return view('admin.library.bookIssueDetails.book_issue_details');
    } 

    public function addForm()
    {    
         $tickets=TicketDetails::all(); 
    	 $bookaccessionss=BookAccession::all();
    	 $librarymembertypes= LibraryMemberType::all();
    	return view('admin.library.bookIssueDetails.book_issue_details_add_form',compact('librarymembertypes','bookaccessionss','tickets'));
    }
    public function store(Request $request)
    {
        // return $request;
         $rules=[
        
            
            'member_ship_type' => 'required', 
            'accession_no' => 'required', 
            'no_of_ticket' => 'required', 
            'issue_date' => 'required', 
            'issue_upto_date' => 'required', 
            'return_able' => 'required', 
       
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
         $bookIssueDetails->member_ship_type_id=$request->member_ship_type;
         $bookIssueDetails->accession_no=$request->accession_no;
         $bookIssueDetails->no_of_ticket=$request->no_of_ticket;
         $bookIssueDetails->issue_date=$request->issue_date;
         $bookIssueDetails->issue_up_to_date=$request->issue_upto_date;
         $bookIssueDetails->return_able=$request->return_able;
         $bookIssueDetails->save();
         $response=['status'=>1,'msg'=>'Created Successfully'];
            return response()->json($response);
        }
    }
    public function tableShow()
    {
       $bookIssueDetails= BookIssueDetails::all();
        return view('admin.library.bookIssueDetails.book_issue_details_table',compact('bookIssueDetails'));  
    }
    public function edit($id)
    {
         
    } 
    public function destroy($id)
    {
         $bookIssueDetails= BookIssueDetails::findOrFail(Crypt::decrypt($id));
         $bookIssueDetails->delete();
       return  redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);
         
    }
}
