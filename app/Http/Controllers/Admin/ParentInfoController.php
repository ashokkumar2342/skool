<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\GuardianRelationType;
use App\Model\IncomeRange;
use App\Model\ParentsInfo;
use App\Model\Profession;
use App\Model\Category;
use App\Model\Religion;
use App\Model\Address;
use App\Model\StudentPerentDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ParentInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function perentTable(Request $request)
    {
        $student=$request->id;
          return view('admin.student.studentdetails.include.parents_info_list',compact('student'));
    }
    public function perentInfoAddForm(Request $request)
    {
         $parentsType= array_pluck(GuardianRelationType::get(['id','name'])->toArray(),'name', 'id'); 
        $professions = array_pluck(Profession::get(['id','name'])->toArray(),'name', 'id'); 
        $incomes = array_pluck(IncomeRange::get(['id','range'])->toArray(),'range', 'id');
        $student=$request->id;
          return view('admin.student.studentdetails.include.add_parents_info',compact('student','parentsType','incomes','documentTypes','isoptionals','sessions','subjectTypes','bloodgroups','professions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function image(Request $request)
    {
          $validator = Validator::make($request->all(), [
            'image' => 'required', 
              
        ]);

        if ($validator->passes())
         {
            $file = $request->file('image');
            $file->store('student/document');

            $parentsinfo = ParentsInfo::find($request->parent_id);
            // $parentsinfo->student_id = $request->student_id;
            $parentsinfo->photo = $file->hashName();
            $parentsinfo->save();
            return response()->json([$parentsinfo,'message'=>'success','class'=>'success']) ;
                
          }

        return response()->json(['message'=>$validator->errors()->all(),'class'=>'error']); 
    }
    public function imageShow($image)
    {
        $img = Storage::disk('student')->get('document/'.$image);
        return response($img)->header('Content-Type', 'image/jpeg');
                
          

    }

        
  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $rules=[
        'name' => 'required',               
        'mobile' => 'required|digits:10',              
        'education' => 'required',              
        'relation_type_id' => 'required',              
        'relation_type_id' => 'required', 
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $response=array();                       
            $response["status"]=0;
            $response["msg"]=$errors[0];
            return response()->json($response);// response as json
        }
         
          

        $parentsinfo = ParentsInfo::firstOrNew(['relation_type_id' => $request->relation_type_id, 'student_id' => $request->student_id]);
        $parentsinfo->student_id = $request->student_id;
        $parentsinfo->name = $request->name;
        $parentsinfo->relation_type_id = $request->relation_type_id;
        $parentsinfo->education = $request->education;
        $parentsinfo->occupation = $request->occupation;
        $parentsinfo->income_id = $request->income;
        $parentsinfo->mobile = $request->mobile;
        $parentsinfo->email = $request->email;
        $parentsinfo->dob = $request->dob == null ? $request->dob : date('Y-m-d',strtotime($request->dob));
        $parentsinfo->doa = $request->doa == null ? $request->doa : date('Y-m-d',strtotime($request->doa));
        $parentsinfo->office_address = $request->office_address;
        $parentsinfo->islive = $request->islive;
        $parentsinfo->save();
         $response=['status'=>1,'msg'=>'Parent Information Save Successfully'];
        return response()->json($response); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\ParentsInfo  $parentsInfo
     * @return \Illuminate\Http\Response
     */
    public function show(ParentsInfo $parentsInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\ParentsInfo  $parentsInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $parentsInfo = ParentsInfo::find($id);
         $parentsType= array_pluck(GuardianRelationType::get(['id','name'])->toArray(),'name', 'id'); 
        $professions = array_pluck(Profession::get(['id','name'])->toArray(),'name', 'id'); 
        $incomes = array_pluck(IncomeRange::get(['id','range'])->toArray(),'range', 'id');
        $student=$request->id;
          return view('admin.student.studentdetails.include.parents_info_edit',compact('student','parentsType','incomes','documentTypes','isoptionals','sessions','subjectTypes','bloodgroups','professions','parentsInfo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\ParentsInfo  $parentsInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {  
        $rules=[
        'name' => 'required',               
        'mobile' => 'required|digits:10',              
        'education' => 'required',              
        'relation_type_id' => 'required',              
        'relation_type_id' => 'required', 
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $response=array();                       
            $response["status"]=0;
            $response["msg"]=$errors[0];
            return response()->json($response);// response as json
        }
         
          

        $parentsinfo = ParentsInfo::find($id);
        $parentsinfo->name = $request->name;
        $parentsinfo->relation_type_id = $request->relation_type_id;
        $parentsinfo->education = $request->education;
        $parentsinfo->occupation = $request->occupation;
        $parentsinfo->income_id = $request->income;
        $parentsinfo->mobile = $request->mobile;
        $parentsinfo->email = $request->email;
        $parentsinfo->dob = $request->dob == null ? $request->dob : date('Y-m-d',strtotime($request->dob));
        $parentsinfo->doa = $request->doa == null ? $request->doa : date('Y-m-d',strtotime($request->doa));
        $parentsinfo->office_address = $request->office_address;
        $parentsinfo->islive = $request->islive;   
        $parentsinfo->save();
        $response=['status'=>1,'msg'=>'Parent Information Update Successfully'];
         return response()->json($response); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\ParentsInfo  $parentsInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
         $parents = ParentsInfo::find($id);
       

        $parents->delete();

        $response=['status'=>1,'msg'=>'Delete Successfully'];
        return response()->json($response);
    }

    public function address(Request $request)
    {  
       $address=Address::all(); 
      return view('admin.student.studentdetails.parent.address_list',compact('student_id','address'));   
    }
    public function addAddress(Request $request,$student_id)
    {

        $cotegorys=Category::orderBy('id','ASC')->get();
        $religions=Religion::orderBy('id','ASC')->get(); 
        return view('admin.student.studentdetails.parent.add_address',compact('cotegorys','religions','student_id'));   
    }
    public function addressStore(Request $request)
    { 
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
        
        $address = Address::firstOrNew(['student_id' => $request->student_id]);
        $address->student_id=$request->student_id;
        $address->primary_mobile=$request->primary_mobile;
        $address->primary_email=$request->primary_email;
        $address->cotegory_id=$request->cotegory_id;
        $address->religion=$request->religion_id;
        $address->state=$request->state;
        $address->city=$request->city;
        $address->p_address=$request->p_address;
        $address->c_address=$request->c_address;
        $address->p_pincode=$request->p_pincode;
        $address->c_pincode=$request->c_pincode;
        $address->nationality=$request->nationality; 
        $address->save();
         $response=['status'=>1,'msg'=>'Address Save Successfully'];
        return response()->json($response);
    }
    public function parentAddNew(Request $request)
    {
         $parentsType= array_pluck(GuardianRelationType::get(['id','name'])->toArray(),'name', 'id'); 
        $professions = array_pluck(Profession::get(['id','name'])->toArray(),'name', 'id'); 
        $incomes = array_pluck(IncomeRange::get(['id','range'])->toArray(),'range', 'id');
        $student=$request->id;
          return view('admin.student.studentdetails.parent.new',compact('student','parentsType','incomes','documentTypes','isoptionals','sessions','subjectTypes','bloodgroups','professions'));
        
    }
    public function parentSearch(Request $request)
    {  
          $relation_type_id=$request->relation_type_id;
          return view('admin.student.studentdetails.parent.search',compact('relation_type_id'));
        
    }
    public function parentSearchPost(Request $request)
    {    $relation_type_id= $request->relation_type_id;
            $parentInfos = ParentsInfo::where('mobile', 'like', '%' . $request->mobile_no . '%')->get(); 
            $response=array();                       
            $response["status"]=1;
            $response["data"]=view('admin.student.studentdetails.parent.existing',compact('parentInfos','relation_type_id'))->render();
            return $response;
        
    }
    public function parentExistingStore(Request $request)
    { 
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
         $studentParentDetails=StudentPerentDetail::firstOrNew(['relation_type_id' => $request->relation_type_id, 'student_id' => $request->student_id]);
        $studentParentDetails->student_id=$request->student_id;
        $studentParentDetails->perent_info_id=$request->perent_info_id;
        $studentParentDetails->relation_id=$request->relation_type_id;
        $studentParentDetails->save();
        $response=['status'=>1,'msg'=>'Created Successfully'];
            return response()->json($response);
        } 
        
        
    }
}
