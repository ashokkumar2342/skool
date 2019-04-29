<?php

namespace App\Http\Controllers\Admin\Library;

use App\Http\Controllers\Controller;
use App\Model\Library\LibraryMemberType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class LibraryMemberTypeController extends Controller
{
    public function index()
    {
    	 return view('admin.library.librarymembertype.library_member_type');
    }

    public function store(Request $request)
    {
        $rules=[
          
            
       
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $response=array();
            $response["status"]=0;
            $response["msg"]=$errors[0];
            return response()->json($response);
           // response as json
        }
        else {
    	 $librarymembertype=new LibraryMemberType();
    	 $librarymembertype->member_ship_type=$request->m_ship_type;
    	 $librarymembertype->member_ship_code=$request->m_ship_code;
    	 $librarymembertype->save();
    	  $response=['status'=>1,'msg'=>'Created Successfully'];
            return response()->json($response);
        } 
    }

    public function tableShow()
    {
    	 $librarymembertypes= LibraryMemberType::all();
    	  return view('admin.library.librarymembertype.library_member_type_table',compact('librarymembertypes'));
    }
    public function edit($id)
    {
    	 $librarymembertypes=LibraryMemberType::findOrFail(Crypt::decrypt($id));
    	return view('admin.library.librarymembertype.library_member_type_edit',compact('librarymembertypes'));
    }

    public function destroy($id)
    {
    	$librarymembertypes=LibraryMemberType::findOrFail(Crypt::decrypt($id));
    	$librarymembertypes->delete();
    }

     public function update(Request $request,$id)
    {
    	  $rules=[
          
            
       
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $response=array();
            $response["status"]=0;
            $response["msg"]=$errors[0];
            return response()->json($response);
           // response as json
        }
        else {
         $librarymembertype=LibraryMemberType::find($id);
         $librarymembertype->member_ship_type=$request->m_ship_type;
         $librarymembertype->member_ship_code=$request->m_ship_code;
         $librarymembertype->save();
          $response=['status'=>1,'msg'=>'Created Successfully'];
            return response()->json($response);
        } 
    }
}