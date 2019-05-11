<?php

namespace App\Http\Controllers\Admin\Library;

use App\Http\Controllers\Controller;
use App\Model\Library\TicketDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class TicketDetailsController extends Controller
{
    public function index()
    { 
    	 
    	return view('admin.library.ticket.ticket_details'); 
    }
    public function tableShow()
    { 
    	 $tickets=TicketDetails::all();
    	return view('admin.library.ticket.ticket_details_table',compact('tickets')); 
    }
    public function addForm()
    {
    	return view('admin.library.ticket.ticket_details_add_form'); 
    }

     public function store(Request $request)
    {

    	$rules=[
    	  
            'ticket_name' => 'required', 
            'no_of_days' => 'required', 
              
       
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
    	 $tickets=new TicketDetails();
    	 $tickets->name=$request->ticket_name;
    	 $tickets->days=$request->no_of_days;
    	 $tickets->save();
    	$response=['status'=>1,'msg'=>'Created Successfully'];
            return response()->json($response);
        } 
    }

    public function edit($id)
    {
    	 $tickets=TicketDetails::findOrFail(Crypt::decrypt($id));
    	return view('admin.library.ticket.ticket_details_edit',compact('tickets'));  
    }
     public function update(Request $request,$id)
    {

    	$rules=[
    	  
            'ticket_name' => 'required', 
            'no_of_days' => 'required', 
              
       
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
    	 $tickets= TicketDetails::find($id);
    	 $tickets->name=$request->ticket_name;
    	 $tickets->days=$request->no_of_days;
    	 $tickets->save();
    	$response=['status'=>1,'msg'=>'Update Successfully'];
            return response()->json($response);
        } 
    }

}
