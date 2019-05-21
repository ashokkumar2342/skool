<?php

namespace App\Http\Controllers\Admin\Library;

use App\Http\Controllers\Controller;
use App\Model\Library\MemberShipDetails;
use App\Model\Library\MemberShipFacility;
use App\Model\Library\TicketDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class TicketDetailsController extends Controller
{
    public function index()
    { 
    	 
    	return view('admin.library.ticketIssue.ticket_Issue'); 
    }
    

    public function ticketAdd(Request $request,$id)
    {  
         // return $request;
         $MemberShipDetail=MemberShipDetails::find($id);
         $memberShipFacilitys=MemberShipFacility::where('member_ship_type_id',$MemberShipDetail->member_ship_type_id)->get();
        return view('admin.library.ticketIssue.ticket_details_add',compact('memberShipFacilitys','MemberShipDetail')); 
    }
    public function search(Request $request)
    { 
        $memberShipDetails=MemberShipDetails::orWhere('name','LIKE','%'.$request->id.'%')->orWhere('member_ship_registration_no','LIKE','%'.$request->id.'%')->orWhere('father','LIKE','%'.$request->id.'%')->orWhere('mobile','LIKE','%'.$request->id.'%')->get();
    	return view('admin.library.ticketIssue.ticket_issue_details_search_table',compact('memberShipDetails')); 
    }

     public function store(Request $request)
    {
          // return $$request;
    	// $rules=[
    	  
     //        'ticket_name' => 'required', 
     //        'no_of_days' => 'required', 
              
       
    	// ];

    	// $validator = Validator::make($request->all(),$rules);
    	// if ($validator->fails()) {
    	//     $errors = $validator->errors()->all();
    	//     $response=array();
    	//     $response["status"]=0;
    	//     $response["msg"]=$errors[0];
    	//     return response()->json($response);// response as json
    	// }
     //    else {
    	//  $tickets=new TicketDetails();
    	//  $tickets->name=$request->ticket_name;
    	//  $tickets->days=$request->no_of_days;
    	//  $tickets->save();
    	// $response=['status'=>1,'msg'=>'Created Successfully'];
     //        return response()->json($response);
     //    } 
    }

    // public function edit($id)
    // {
    // 	 $tickets=TicketDetails::findOrFail(Crypt::decrypt($id));
    // 	return view('admin.library.ticket.ticket_details_edit',compact('tickets'));  
    // }
     public function update(Request $request,$id)
    {
              // return $request;
    	$rules=[     
    	  
            'member_ship_facility_id' => 'required',  
       
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
    	 $tickets= MemberShipDetails::find($id);
    	 $tickets->member_ship_facility_id=$request->member_ship_facility_id;
    	 
    	 $tickets->save();
    	$response=['status'=>1,'msg'=>'Update Successfully'];
            return response()->json($response);
        } 
    }

}
