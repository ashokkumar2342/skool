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
     public function addForm()
    {
         return view('admin.library.librarymembertype.library_member_type_add_form');
    }

    public function store(Request $request)
    {
        $rules=[

           'member_ship_type' => 'required', 
           'member_ship_code' => 'required|unique:library_member_types,member_ship_code', 
            
       
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
    	 $librarymembertype->member_ship_type=$request->member_ship_type;
    	 $librarymembertype->member_ship_code=$request->member_ship_code;
    	 $librarymembertype->save();
    	  $response=['status'=>1,'msg'=>'Created Successfully'];
            return response()->json($response);
        } 
    }

    public function tableShow()
    {
    	 $librarymembertypes= LibraryMemberType::orderBy('id','ASC')->get();
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
          
            'member_ship_type' => 'required', 
            'member_ship_code' => 'required|unique:library_member_types,member_ship_code,'.$id
       
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
         $librarymembertype->member_ship_type=$request->member_ship_type;
         $librarymembertype->member_ship_code=$request->member_ship_code;
         $librarymembertype->save();
          $response=['status'=>1,'msg'=>'Update Successfully'];
            return response()->json($response);
        } 
    }
}
