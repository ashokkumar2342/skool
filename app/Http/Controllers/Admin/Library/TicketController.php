<?php

namespace App\Http\Controllers\Admin\Library;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Library\MemberTicketDetails;

class TicketController extends Controller
{
    public function index()
    {
    	$memberTicketDetails=MemberTicketDetails::orderBy('id','ASC')->get();
    	 return view('admin.library.ticket.ticket_card',compact('memberTicketDetails')); 
    }
    public function generate(Request $request)
    {
    	 return $request;
    }
}
