<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\AwardLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class AwardLevelController extends Controller
{
   public function index($value='')
   {
   	 return view('admin.award.awardLevel.index');
   }
   public function addForm($id=null)
   {
   	
     if ($id!=null) {
     	     $id=Crypt::decrypt($id);
             $awardLevel= AwardLevel::find($id); 
        }else{
            $awardLevel=null;
        } 
   	  
   	 return view('admin.award.awardLevel.add_form',compact('awardLevel'));
   }
   public function store(Request $request ,$id=null)
   {
   	 
   	 $rules=[
    	  
            'award_level' => 'required|max:50|unique:award_levels,name,'.$id, 
            'code' => 'required|max:5|unique:award_levels,code,'.$id, 
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
    	$awardLevel= AwardLevel::firstOrNew(['id'=>$id]); 
    	$awardLevel->name=$request->award_level; 
      $awardLevel->code=$request->code; 
    	$awardLevel->save();
    	$response=['status'=>1,'msg'=>'Submit Successfully'];
            return response()->json($response);
        }
   }
   public function list()
   { $awardLevels= AwardLevel::orderBy('id','ASC')->get(); 
   	 return view('admin.award.awardLevel.list',compact('awardLevels'));
   }
   public function destroy($id)
   {
   	$id=Crypt::decrypt($id);
    $awardLevel= AwardLevel::find($id);
    $awardLevel->delete();
    return redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);
   }
}
