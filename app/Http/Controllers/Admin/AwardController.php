<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Award;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class AwardController extends Controller
{
     public function index($value='')
     {
     	return view('admin.award.list');
     }
      public function addForm($value='')
     {
     	$students=Student::where('student_status_id',1)->get();
     	return view('admin.award.add_form',compact('students'));
     }
     public function store(Request $request)
    {

    	$rules=[
    	  
            'registration_no' => 'required', 
            'award_name' => 'required', 
             
       
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
              if ($request->hasFile('image')) { 
                $image=$request->image;
                $filename='award'.date('d-m-Y').time().'.jpg'; 
                $image->storeAs('public/student/bookimage/',$filename);
            	$award=new Award();
            	$award->registration_no=$request->registration_no;
            	$award->award_name=$request->award_name;
            	$award->description=$request->description;
                $award->image=$filename;
            	 
            	$award->save();
            	$response=['status'=>1,'msg'=>'Created Successfully'];
                    return response()->json($response);
                }
         else { 
                $award=new Award();
                $award->registration_no=$request->registration_no;
                $award->award_name=$request->award_name;
                $award->description=$request->description;
                 
                 
                $award->save();
                $response=['status'=>1,'msg'=>'Created Successfully'];
                    return response()->json($response);
         }
       }
    }
    public function tableShow($value='')
    {
    	$awards= Award::all();
    	 return view('admin.award.table_show',compact('awards'));
    }
    public function edit($id)
    {
    	$students=Student::where('student_status_id',1)->get(); 
    	$award= Award::findOrFail(Crypt::decrypt($id)); 
    	return view('admin.award.edit',compact('students','award'));
    }
    public function destroy($id)
    {
    	  
    	$award= Award::findOrFail(Crypt::decrypt($id)); 
    	 $award->delete();
    	 return redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);;
    }
     public function update(Request $request,$id)
    {

    	$rules=[
    	  
            'registration_no' => 'required', 
            'award_name' => 'required', 
            
       
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
        if ($request->hasFile('image')) { 
                $image=$request->image;
                $filename='award'.date('d-m-Y').time().'.jpg'; 
                $image->storeAs('public/student/bookimage/',$filename);
                $award= Award::find($id);
                $award->registration_no=$request->registration_no;
                $award->award_name=$request->award_name;
                $award->description=$request->description;
                $award->image=$filename;
                 
                $award->save();
                $response=['status'=>1,'msg'=>'Created Successfully'];
                    return response()->json($response);
                }
         else { 
                $award= Award::find($id);
                $award->registration_no=$request->registration_no;
                $award->award_name=$request->award_name;
                $award->description=$request->description;
                 
                 
                $award->save();
                $response=['status'=>1,'msg'=>'Created Successfully'];
                    return response()->json($response);
         }
       }
    }
}
