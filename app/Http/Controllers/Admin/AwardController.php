<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\AwardType;
use App\Model\AwardFor;
use App\Model\AwardPhoto;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

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
        $admin=Auth::guard('admin')->user()->id;
    	$rules=[
    	  
            'award_name' => 'required', 
            'rank_position' => 'required', 
            'award_date' => 'required', 
            'last_date' => 'required', 
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
                $awardType=new AwardType();
                $awardType->award_name=$request->award_name;
                $awardType->rank_position=$request->rank_position;
                $awardType->award_date=$request->award_date;
                $awardType->last_date=$request->last_date;
                $awardType->description=$request->description;
                $awardType->last_updated_by=$admin; 
                $awardType->save();
                $response=['status'=>1,'msg'=>'Created Successfully'];
                    return response()->json($response); 
            }
    }
    public function tableShow($value='')
    {
    	$awardTypes= AwardType::orderBy('id','ASC')->get();
    	 return view('admin.award.table_show',compact('awardTypes'));
    }
    public function edit($id)
    { 
    	$AwardType= AwardType::findOrFail(Crypt::decrypt($id)); 
    	return view('admin.award.edit',compact('AwardType'));
    }
    public function destroy($id)
    {   
    	$AwardType= AwardType::findOrFail(Crypt::decrypt($id)); 
    	 $AwardType->delete();
    	 return redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);;
    }
     public function update(Request $request,$id)
    { 
    	$admin=Auth::guard('admin')->user()->id;
        $rules=[
          
            'award_name' => 'required', 
            'rank_position' => 'required', 
            'award_date' => 'required', 
            'last_date' => 'required', 
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
                $awardType= AwardType::find($id);
                $awardType->award_name=$request->award_name;
                $awardType->rank_position=$request->rank_position;
                $awardType->award_date=$request->award_date;
                $awardType->last_date=$request->last_date;
                $awardType->description=$request->description;
                $awardType->last_updated_by=$admin; 
                $awardType->save();
                $response=['status'=>1,'msg'=>'Update Successfully'];
                    return response()->json($response);
          
            }
    }

     public function awardFor($value='')
     {
        return view('admin.award.awardFor.list');
     }
      public function awardForAddForm($value='')
     {
        $awardTypes= AwardType::orderBy('award_name','ASC')->get();
        $students=Student::where('student_status_id',1)->get();
        return view('admin.award.awardFor.add_form',compact('students','awardTypes'));
     }
     public function awardForStore(Request $request)
    { 
        $admin=Auth::guard('admin')->user()->id;
        $rules=[
          
            'award_name' => 'required', 
            'rank_position' => 'required', 
            'student_name' => 'required', 
             
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
                foreach ($request->student_name as $student_id) {
                $awardFor=new AwardFor();
                $awardFor->award_id=$request->award_name;
                $awardFor->student_id=$student_id;
                $awardFor->rank_position=$request->rank_position; 
                $awardFor->description=$request->description;
                $awardFor->last_updated_by=$admin; 
                $awardFor->save(); 
                }
                $response=['status'=>1,'msg'=>'Created Successfully'];
                    return response()->json($response);
          
            }
    }
    public function awardForTableShow($student_id=null)
    {
         
        if ($student_id==null) {
         $awardfors= AwardFor::orderBy('id','ASC')->get(); 
        }else{
         $awardfors= AwardFor::where('student_id',$student_id)->orderBy('id','ASC')->get(); 
        }
         return view('admin.award.awardFor.table_show',compact('awardfors'));
    }
    public function awardForEdit($id)
    {
        $awardfors= AwardFor::findOrFail(crypt::decrypt($id));
        $awardTypes= AwardType::orderBy('award_name','ASC')->get();
        $students=Student::where('student_status_id',1)->get(); 
         return view('admin.award.awardFor.edit',compact('awardfors','awardTypes','students'));
    }
    public function awardForUpdate(Request $request,$id)
    { 
        $admin=Auth::guard('admin')->user()->id;
        $rules=[
          
            'award_name' => 'required', 
            'rank_position' => 'required', 
            'student_name' => 'required', 
             
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
                $awardFor=AwardFor::find($id);
                $awardFor->award_id=$request->award_name;
                $awardFor->student_id=$request->student_name;
                $awardFor->rank_position=$request->rank_position; 
                $awardFor->description=$request->description;
                $awardFor->last_updated_by=$admin; 
                $awardFor->save();
                $response=['status'=>1,'msg'=>'Update Successfully'];
                    return response()->json($response);
          
            }
    }
    public function awardForDelete($id){
      $awardfors= AwardFor::findOrFail(crypt::decrypt($id));
       $awardfors->delete();
         return redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);;
    }

    //-----------award-photo-----------------------------------award-Photo--------------------
    public function awardPhotoIndex($value='')
    {
        return view('admin.award.photo.list');
    }
    public function awardPhotoAddForm($value='')
    {
         $awardTypes= AwardType::orderBy('award_name','ASC')->get(); 
         return view('admin.award.photo.add_form',compact('awardTypes'));
    }
    public function awardPhotoStore(Request $request)
    { 
        $admin=Auth::guard('admin')->user()->id;
        $rules=[
          
            'award_name' => 'required',  
            'image' => 'required',  
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
                $awardPhoto=new AwardPhoto(); 
                $awardPhoto->award_id=$request->award_name; 
                $awardPhoto->award_photo=$filename;
                $awardPhoto->last_updated_by=$admin; 
                $awardPhoto->save();
                $response=['status'=>1,'msg'=>'Created Successfully'];
                    return response()->json($response);
                }
         }
         
    }
    public function awardPhotoTableShow($value='')
    {
       $awardPhotos= AwardPhoto::orderBy('id','ASC')->get();
       return view('admin.award.photo.table_show',compact('awardPhotos')); 
    }
    public function awardPhotoEdit($id)
    {
       $awardTypes= AwardType::orderBy('award_name','ASC')->get();
       $awardPhotos= AwardPhoto::findOrFail(crypt::decrypt($id));
       return view('admin.award.photo.edit',compact('awardPhotos','awardTypes')); 
    }
    public function awardPhotoUpdate(Request $request,$id)
    { 
        $admin=Auth::guard('admin')->user()->id;
        $rules=[
          
            'award_name' => 'required',  
            'image' => 'required',  
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
                $awardPhoto= AwardPhoto::find($id); 
                $awardPhoto->award_id=$request->award_name; 
                $awardPhoto->award_photo=$filename;
                $awardPhoto->last_updated_by=$admin; 
                $awardPhoto->save();
                $response=['status'=>1,'msg'=>'Update Successfully'];
                    return response()->json($response);
                }
         }
         
    }
    public function awardPhotoDelete($id)
    {
        
       $awardPhotos= AwardPhoto::findOrFail(crypt::decrypt($id));
       $awardPhotos->delete(); 
       return redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);; 
    }
}
