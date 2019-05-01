<?php

namespace App\Http\Controllers\Admin\Library;

use App\Http\Controllers\Controller;
use App\Model\Library\LibraryMemberType;
use App\Model\Library\MemberShipFacility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class MemberShipFacilityController extends Controller
{
    public function index()
    {
    	$librarymembertypes= LibraryMemberType::all();
    	 return view('admin.library.membeShipFacility.member_ship_facility',compact('librarymembertypes'));
    }

    public function store(Request $request)
    {
         $rules=[ 

             'member_ship_type' => 'required', 
             'no_of_books' => 'required', 
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
    	 $membershipfacility=new MemberShipFacility();
    	 $membershipfacility->member_ship_type_id=$request->member_ship_type;
    	 $membershipfacility->no_of_books=$request->no_of_books;
    	 $membershipfacility->no_of_days=$request->no_of_days;
    	 $membershipfacility->save();
    	  $response=['status'=>1,'msg'=>'Created Successfully'];
            return response()->json($response);
        }
    }
    public function tableShow()
    {
    	$membershipfacilitys= MemberShipFacility::all();
    	return view('admin.library.membeShipFacility.member_ship_facility_table',compact('membershipfacilitys'));
    } 

    public function edit($id)
    {
    	$librarymembertypes= LibraryMemberType::orderBy('member_ship_type','asc')->get();
    	$membershipfacilitys= MemberShipFacility::findOrFail(Crypt::decrypt($id));
    	return view('admin.library.membeShipFacility.member_ship_facility_edit',compact('membershipfacilitys','librarymembertypes'));
    }

       public function destroy($id)
       {
       	 $membershipfacilitys= MemberShipFacility::findOrFail(Crypt::decrypt($id));
       	  $membershipfacilitys->delete();
          return  redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);
       }


       public function update(Request $request,$id)
    {
    	 $rules=[ 
            'member_ship_type' => 'required', 
             'no_of_books' => 'required', 
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
         $membershipfacility= MemberShipFacility::find($id);
         $membershipfacility->member_ship_type_id=$request->member_ship_type;
         $membershipfacility->no_of_books=$request->no_of_books;
         $membershipfacility->no_of_days=$request->no_of_days;
         $membershipfacility->save();
          $response=['status'=>1,'msg'=>'Update Successfully'];
            return response()->json($response);
        }
    }

}
