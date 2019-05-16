<?php

namespace App\Http\Controllers\Admin\Library;

use App\Http\Controllers\Controller;
use App\Model\Library\LibraryMemberType;
use App\Model\Library\MemberShipDetails;
use App\Model\Library\MemberShipFacility;
use App\Model\Library\Othertype;
use App\Model\Library\TeacherFaculty;
use App\Model\Library\TicketDetails;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class MemberShipDetailsController extends Controller
{
	public function index()
	{
	    $memberShipFacilitys=MemberShipFacility::all();
	   $librarymembertypes=LibraryMemberType::orderBy('member_ship_type','asc')->get();
	  $students = Student::all();
		return view('admin.library.memberShipDetails.member_ship_details',compact('librarymembertypes','students','memberShipFacilitys')); 
	}
	public function store(Request $request)
	{   
        // return $request;
		 $rules=[ 
       
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
      if ($request->member_ship_type==1) {
		  $membershipdetails=new MemberShipDetails();
		  $membershipdetails->member_ship_type_id=$request->member_ship_type;
		  $membershipdetails->member_ship_no=$request->student_id;
		  $membershipdetails->name=$request->name; 
		  $membershipdetails->father=$request->father_name;
		  $membershipdetails->mobile=$request->father_mobile;
		  $membershipdetails->email=$request->email;
		  $membershipdetails->address=$request->address;
      $membershipdetails->member_ship_facility_id=$request->member_ship_facility_id;
      $membershipdetails->member_ship_registration_no=$request->registration_no;
		  $membershipdetails->save();
		   $response=['status'=>1,'msg'=>'Created Successfully'];
            return response()->json($response);
        }
         if ($request->member_ship_type==2) {
      $membershipdetails=new MemberShipDetails();
      $membershipdetails->member_ship_type_id=$request->member_ship_type;
      $membershipdetails->member_ship_no=$request->teacher;
      $membershipdetails->name=$request->name; 
      $membershipdetails->father=$request->father_name;
      $membershipdetails->mobile=$request->mobile;
      $membershipdetails->email=$request->email;
      $membershipdetails->address=$request->address;
      $membershipdetails->member_ship_facility_id=$request->member_ship_facility_id;
      $membershipdetails->member_ship_registration_no=$request->code;
      $membershipdetails->save();
       $response=['status'=>1,'msg'=>'Created Successfully'];
            return response()->json($response);
        }
        if ($request->member_ship_type==3) {
      $membershipdetails=new MemberShipDetails();
      $membershipdetails->member_ship_type_id=$request->member_ship_type;
      $membershipdetails->member_ship_no=$request->other;
      $membershipdetails->name=$request->name; 
      $membershipdetails->father=$request->father_name;
      $membershipdetails->mobile=$request->mobile_no;
      $membershipdetails->email=$request->email;
      $membershipdetails->address=$request->address;
      $membershipdetails->member_ship_facility_id=$request->member_ship_facility_id;
      $membershipdetails->member_ship_registration_no=$request->code;
      $membershipdetails->save();
       $response=['status'=>1,'msg'=>'Created Successfully'];
            return response()->json($response);
        }
      }
	}
  public function tableShow()
  {
    $memberShipDetails=MemberShipDetails::all();
     return view('admin.library.memberShipDetails.member_ship_registration_table_show',compact('memberShipDetails'));
  }
    
    public function studentSearch(Request $request)
    {
      // return $request;
      if ($request->id==1) {
    	 $students = Student::all();
       $memberShipFacilitys=MemberShipFacility::where('member_ship_type_id',$request->id)->get();
         return view('admin.library.memberShipDetails.member_ship_details_table',compact('students','memberShipFacilitys'));
      }if ($request->id==2) {
       $teachers = TeacherFaculty::all();
        $memberShipFacilitys=MemberShipFacility::where('member_ship_type_id',$request->id)->get();
         return view('admin.library.memberShipDetails.member_ship_details_teacher_table',compact('teachers','memberShipFacilitys'));
      }if ($request->id==3) {
       $others = Othertype::all();
        $memberShipFacilitys=MemberShipFacility::where('member_ship_type_id',$request->id)->get();
        return view('admin.library.memberShipDetails.member_ship_details_others_table',compact('others','memberShipFacilitys'));
         
      }
      
    	// return view('admin.library.memberShipDetails.member_ship_details_table',compact('students'));
    }
    public function studentShow(Request $request)
    {

      $students = Student::find($request->id);
       return view('admin.library.onchange.student',compact('students'));
    }
    public function teacherShow(Request $request)
    {
      $teachers = TeacherFaculty::find($request->id);
       return view('admin.library.onchange.teacher',compact('teachers'));
    }
     public function othersShow(Request $request)
    {
      $others = Othertype::find($request->id);
       return view('admin.library.onchange.other',compact('others'));
    }
 //    public function edit($id)
 //    {
 //    	 $membershipdetails= MemberShipDetails::findOrFail(Crypt::decrypt($id));
 //    	 $librarymembertypes=LibraryMemberType::orderBy('member_ship_type','asc')->get();
	//    $membershipfacilitys=MemberShipFacility::orderBy('member_ship_type_id','asc')->get();
	// 	return view('admin.library.memberShipDetails.member_ship_details_edit',compact('librarymembertypes','membershipfacilitys','membershipdetails')); 

 //    }
 //    public function destroy($id)
 //    {
 //    	 $membershipdetails= MemberShipDetails::findOrFail(Crypt::decrypt($id));
 //    	 $membershipdetails->delete();
 //    	 return  redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);
 //    }

 //   public function update(Request $request,$id)
	// {      
	// 	 $rules=[
              
 //              'mobile_no' => 'required|digits:10', 
 //              'member_ship_type' => 'required', 
 //              'member_ship_facility' => 'required', 
             
       
 //      ];

 //      $validator = Validator::make($request->all(),$rules);
 //      if ($validator->fails()) {
 //          $errors = $validator->errors()->all();
 //          $response=array();
 //          $response["status"]=0;
 //          $response["msg"]=$errors[0];
 //          return response()->json($response);// response as json
 //      }
 //        else {
	// 	  $membershipdetails= MemberShipDetails::find($id);
	// 	  $membershipdetails->member_ship_id=$request->member_ship_facility;
	// 	  $membershipdetails->member_ship_type_id=$request->member_ship_type;
	// 	  $membershipdetails->member_ship_no=$request->member_ship_no;
	// 	  $membershipdetails->name=$request->name;
	// 	  $membershipdetails->father=$request->father_name;
	// 	  $membershipdetails->mobile=$request->mobile_no;
	// 	  $membershipdetails->email=$request->email;
	// 	  $membershipdetails->address=$request->address;
	// 	  $membershipdetails->save();
	// 	   $response=['status'=>1,'msg'=>'Update Successfully'];
 //            return response()->json($response);
 //        }
	// }
}
