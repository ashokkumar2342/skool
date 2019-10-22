<?php

namespace App\Http\Controllers\Admin\Library;

use App\Http\Controllers\Controller;
use App\Model\Library\LibraryMemberType;
use App\Model\Library\MemberShipDetails;
use App\Model\Library\MemberShipFacility;
use App\Model\Library\MemberTicketDetails;
use App\Model\Library\Othertype;
use App\Model\Library\TeacherFaculty;
use App\Model\Library\TicketDetails;
use App\Model\StudentAddressDetail;
use App\Model\StudentPerentDetail;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class MemberShipDetailsController extends Controller
{
	public function index()
	{
	    $memberShipFacilitys=MemberShipFacility::all();
	   $librarymembertypes=LibraryMemberType::orderBy('id','ASC')->get();
	  $students = Student::all();
		return view('admin.library.memberShipDetails.member_ship_details',compact('librarymembertypes','students','memberShipFacilitys')); 
	}
	public function store(Request $request)
	{   
           
		 $rules=[ 
       'member_ship_type'=>'required',
       'member_ship_no' => 'required',
        
       
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
       
		  $memberShipDetail=new MemberShipDetails();
		  $memberShipDetail->member_ship_type_id=$request->member_ship_type;
		  $memberShipDetail->member_ship_no=$request->member_ship_no;
		  $memberShipDetail->name=$request->name; 
		  $memberShipDetail->mobile=$request->mobile;
		  $memberShipDetail->email=$request->email;
		  $memberShipDetail->address=$request->address; 
          $memberShipDetail->member_ship_registration_no=$request->registration_no;
		  $memberShipDetail->save();
      $memberShipFacilitys=MemberShipFacility::where('member_ship_type_id',$memberShipDetail->member_ship_type_id)->get();
      $memberTicketDetails=MemberTicketDetails::where('member_ship_details_id',$memberShipDetail->id)->get();
      $response = array();
      $response['status'] = 1;
      $response['msg'] = 'Created Successfully';
      $response['data'] =view('admin.library.memberShipDetails.member_ship_type_ticket_details',compact('memberShipFacilitys','memberShipDetail','memberTicketDetails'))->render();   
		    
            return response()->json($response); 
      }
	}
    public function ticketDetailsStore(Request $request)
    {  
          
         $rules=[ 
           'no_of_days'=>'required',
           'ticket_no'=>'required|max:6|unique:member_ticket_details,ticket_no',
            
           
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
        $memberTicketDetail= new MemberTicketDetails();
        $memberTicketDetail->member_ship_details_id=$request->member_ship_details_id;
        $memberTicketDetail->ticket_no=$request->ticket_no;
        $memberTicketDetail->member_ship_facility_id=$request->no_of_days; 
        $memberTicketDetail->status=1;
        $memberShipFacility=MemberShipFacility::find($request->no_of_days);
         $memberShipDetail=MemberShipDetails::find($request->member_ship_details_id);
        $memberTicketDetailsCount= MemberTicketDetails::where('member_ship_details_id',$request->member_ship_details_id)->where('member_ship_facility_id',$request->no_of_days)->count(); 

          if ( $memberShipFacility->no_of_ticket == $memberTicketDetailsCount) {
            $response=['status'=>1,'msg'=>$memberTicketDetailsCount.' Ticket Already Issue'];
               return response()->json($response); 
          }

         $memberTicketDetail->save();
         $memberTicketDetails= MemberTicketDetails::where('member_ship_details_id',$request->member_ship_details_id)->get();
          $response = array();
          $response['status'] = 1;
          $response['msg'] = 'Ticket Save Successfully';
          $response['data'] =view('admin.library.memberShipDetails.member_ship_ticket_table',compact('memberShipFacilitys','memberShipDetail','memberTicketDetails'))->render(); 
            return response()->json($response); 
        
      }
    }
  
    public function studentSearch(Request $request)
    {
      // return $request;
      if ($request->id==1) {
    	 $data =new Student();
       $datas =$data->getAllStudents();
       $memberShipFacilitys=MemberShipFacility::where('member_ship_type_id',$request->id)->get(); 
      }if ($request->id==2) {
       $datas = TeacherFaculty::all();
        $memberShipFacilitys=MemberShipFacility::where('member_ship_type_id',$request->id)->get(); 
      }if ($request->id==3) {
       $datas = Othertype::all();
        $memberShipFacilitys=MemberShipFacility::where('member_ship_type_id',$request->id)->get(); 
      }
      return view('admin.library.memberShipDetails.member_ship_select_box',compact('datas','memberShipFacilitys')); 
    }
    public function studentShow(Request $request)
    {
         
          
       $memberShipDetail=MemberShipDetails::where('member_ship_no',$request->id)->where('member_ship_type_id',$request->library_member_ship)->first();
          if ( $request->library_member_ship==1) {
             $student=1;  
              $st=new Student();
          $datas=$st->getStudentDetailsById($request->id); 
          }
          if ( $request->library_member_ship==2) {
               $datas = TeacherFaculty::find($request->id);
          }
           if ( $request->library_member_ship==3) {
               $datas = Othertype::find($request->id);
          }
        $memberShipFacilitys=MemberShipFacility::where('member_ship_type_id',$request->library_member_ship)->get();  
        if (!empty($memberShipDetail)) {                
            $memberTicketDetails=MemberTicketDetails::where('member_ship_details_id',$memberShipDetail->id)->get();
          }      
         
         
         return view('admin.library.memberShipDetails.registration_no_by_details',compact('datas','memberShipDetail','memberShipFacilitys','memberTicketDetails','student')); 
       
    } 
}
