<?php

namespace App\Http\Controllers\Admin\Library;

use App\Http\Controllers\Controller;
use App\Model\Library\LibraryMemberType;
use App\Model\Library\MemberShipDetails;
use App\Model\Library\MemberShipFacility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class MemberShipDetailsController extends Controller
{
	public function index()
	{
	   
	   $librarymembertypes=LibraryMemberType::orderBy('member_ship_type','asc')->get();
	   $membershipfacilitys=MemberShipFacility::orderBy('member_ship_type_id','asc')->get();
		return view('admin.library.memberShipDetails.member_ship_details',compact('librarymembertypes','membershipfacilitys')); 
	}
	public function store(Request $request)
	{      
		 $rules=[
              
              'mobile_no' => 'required|digits:10', 
              'member_ship_type' => 'required', 
              'member_ship_facility' => 'required', 
             
       
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
		  $membershipdetails=new MemberShipDetails();
		  $membershipdetails->member_ship_id=$request->member_ship_facility;
		  $membershipdetails->member_ship_type_id=$request->member_ship_type;
		  $membershipdetails->member_ship_no=$request->member_ship_no;
		  $membershipdetails->name=$request->name;
		  $membershipdetails->father=$request->father_name;
		  $membershipdetails->mobile=$request->mobile_no;
		  $membershipdetails->email=$request->email;
		  $membershipdetails->address=$request->address;
		  $membershipdetails->save();
		   $response=['status'=>1,'msg'=>'Created Successfully'];
            return response()->json($response);
        }
	}
    
    public function tableShow()
    {
    	$membershipdetails= MemberShipDetails::all();
    	return view('admin.library.memberShipDetails.member_ship_details_table',compact('membershipdetails'));
    }
    public function edit($id)
    {
    	 $membershipdetails= MemberShipDetails::findOrFail(Crypt::decrypt($id));
    	 $librarymembertypes=LibraryMemberType::orderBy('member_ship_type','asc')->get();
	   $membershipfacilitys=MemberShipFacility::orderBy('member_ship_type_id','asc')->get();
		return view('admin.library.memberShipDetails.member_ship_details_edit',compact('librarymembertypes','membershipfacilitys','membershipdetails')); 

    }
    public function destroy($id)
    {
    	 $membershipdetails= MemberShipDetails::findOrFail(Crypt::decrypt($id));
    	 $membershipdetails->delete();
    	 return  redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);
    }

   public function update(Request $request,$id)
	{      
		 $rules=[
              
              'mobile_no' => 'required|digits:10', 
              'member_ship_type' => 'required', 
              'member_ship_facility' => 'required', 
             
       
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
		  $membershipdetails= MemberShipDetails::find($id);
		  $membershipdetails->member_ship_id=$request->member_ship_facility;
		  $membershipdetails->member_ship_type_id=$request->member_ship_type;
		  $membershipdetails->member_ship_no=$request->member_ship_no;
		  $membershipdetails->name=$request->name;
		  $membershipdetails->father=$request->father_name;
		  $membershipdetails->mobile=$request->mobile_no;
		  $membershipdetails->email=$request->email;
		  $membershipdetails->address=$request->address;
		  $membershipdetails->save();
		   $response=['status'=>1,'msg'=>'Update Successfully'];
            return response()->json($response);
        }
	}
}
