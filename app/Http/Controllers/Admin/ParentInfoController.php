<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Address;
use App\Model\Category;
use App\Model\GuardianRelationType;
use App\Model\IncomeRange;
use App\Model\ParentsInfo;
use App\Model\Profession;
use App\Model\Religion;
use App\Model\SiblingGroup;
use App\Model\StudentDefaultValue;
use App\Model\StudentPerentDetail;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Response;
use Auth;

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
       
      // $studentPerentDetail=StudentPerentDetail::where('student_id',$request->id)->first(); 
      // if ($studentPerentDetail==null) {
      //     $parents=ParentsInfo::where('id',$studentPerentDetail)->get(); 
      //  }else{
      //    $studentPerentDetails=StudentPerentDetail::where('student_id',$studentPerentDetail->student_id)->pluck('perent_info_id')->toArray(); 
      //      $parents=ParentsInfo::whereIn('id',$studentPerentDetails)->get();
        
      //  } 
        $st =new Student();
           $student=$st->getStudentDetailsById($request->id);
      return view('admin.student.studentdetails.include.parents_info_list',compact('student','parents'));
    }
    public function perentInfoAddForm(Request $request)
    {
         $parentsType= array_pluck(GuardianRelationType::get(['id','name'])->toArray(),'name', 'id'); 
        $professions = array_pluck(Profession::orderBy('name','ASC')->get(['id','name'])->toArray(),'name', 'id');
        $incomes = array_pluck(IncomeRange::orderBy('range','ASC')->get(['id','range'])->toArray(),'range', 'id');
        $student=$request->id;
          return view('admin.student.studentdetails.include.add_parents_info',compact('student','parentsType','incomes','documentTypes','isoptionals','sessions','subjectTypes','bloodgroups','professions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function image(Request $request,$id)
    {
          $parent_id=$id;
          return view('admin.student.studentdetails.include.add_parents_image',compact('parent_id'));
        
    }
    public function imageStore(Request $request,$parent_id)
    { 
       
         $rules=[
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
       
            // $profilePhoto=$request->image;
            // $filename='parent'.date('d-m-Y').time().'.jpg'; 
            // $path ='student/profile/parent/';
            // $profilePhoto->storeAs($path,$filename); 
            // $parentsinfo=ParentsInfo::find($request->parent_id); 
            // $parentsinfo->photo=$path.$filename; 
            // $parentsinfo->save(); 
            // $response=['status'=>1,'msg'=>'Upload Successfully'];
            // return response()->json($response); 

            $parentsinfo=ParentsInfo::find($parent_id); 
            $data = $request->image; 
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $data = base64_decode($data);
            $image_name= time().'.jpg';       
            $path = Storage_path() . "/app/student/profile/parent/" . $image_name; 
            $pathSave = "student/profile/parent/" . $image_name; 
            @mkdir(Storage_path() . "/app/student/profile/parent/", 0755, true);     
            file_put_contents($path, $data); 
            $parentsinfo->photo = $pathSave;
            $parentsinfo->save();
            return response()->json(['success'=>'done']);
      

        
    }
    public function imageShow($id)
    { 
                $parent=ParentsInfo::find($id);

                $storagePath = storage_path('app/'.$parent->photo);              
                $mimeType = mime_content_type($storagePath); 
                if( ! \File::exists($storagePath)){

                    return view('error.home');
                }
                $headers = array(
                    'Content-Type' => $mimeType,
                    'Content-Disposition' => 'inline; '
                );
                  
                if($parent->photo==null)
                {
                     ob_end_clean(); // discards the contents of the topmost output buffer
                    return Response::make(file_get_contents('profile-img/user.png'), 200, $headers);
                }
                else
                {   ob_end_clean(); // discards the contents of the topmost output buffer
                    return Response::make(file_get_contents($storagePath), 200, $headers);

                } 

    }

        
          public function imageRefresh($parent_id)
          {
               return view('admin.student.studentdetails.include.parents_image_refresh',compact('parent_id'));
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
             
        
        'profession' => 'required',              
        'income' => 'required',              
           
        'islive' => 'required',              
                   
        
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $response=array();                       
            $response["status"]=0;
            $response["msg"]=$errors[0];
            return response()->json($response);// response as json
        } 
        $parentsinfo = new ParentsInfo(); 
        $parentsinfo->name = $request->name; 
        $parentsinfo->education = $request->education;
        $parentsinfo->occupation = $request->profession;
        $parentsinfo->income_id = $request->income;
        $parentsinfo->mobile = $request->mobile;
        $parentsinfo->email = $request->email;
        $parentsinfo->dob = $request->dob == null ? $request->dob : date('Y-m-d',strtotime($request->dob));
        $parentsinfo->doa = $request->doa == null ? $request->doa : date('Y-m-d',strtotime($request->doa));
        $parentsinfo->organization_address = $request->organization_address;
        $parentsinfo->f_designation = $request->f_designation;
        $parentsinfo->office_address = $request->office_address;
        $parentsinfo->islive = $request->islive;
        $parentsinfo->save();
        $parentsinfo_id= $parentsinfo->id;

       
        $this->parentDetailsStore($request->student_id,$parentsinfo_id,$request->relation_type_id);
         $response=['status'=>1,'msg'=>'Parent Information Save Successfully'];
        return response()->json($response); 
    }
    //parentDetailsStore
    public function parentDetailsStore($student_id,$perent_info_id,$relation_id)
    {   
       $StudentSiblingInfo = new SiblingGroup();
       $StudentSiblingArrId =$StudentSiblingInfo->getStudentSiblingArrId($student_id);
       if (!empty($StudentSiblingArrId)) {
         foreach ($StudentSiblingArrId as $key => $student_id) {
           $studentParentDetails=StudentPerentDetail::firstOrNew(['relation_id' => $relation_id, 'student_id' => $student_id]);
           $studentParentDetails->student_id=$student_id; 
           $studentParentDetails->perent_info_id=$perent_info_id;
           $studentParentDetails->relation_id=$relation_id;
           $studentParentDetails->save();
          
         }
       }else{
        $studentParentDetails=StudentPerentDetail::firstOrNew(['relation_id' => $relation_id, 'student_id' => $student_id]);
        $studentParentDetails->student_id=$student_id; 
        $studentParentDetails->perent_info_id=$perent_info_id;
        $studentParentDetails->relation_id=$relation_id;
        $studentParentDetails->save();
      
       }

      
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
        $professions = array_pluck(Profession::orderBy('name','ASC')->get(['id','name'])->toArray(),'name', 'id'); 
        $incomes = array_pluck(IncomeRange::orderBy('code','ASC')->get(['id','range'])->toArray(),'range', 'id');
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
             
        'profession' => 'required',              
        'income' => 'required',              
          
        'islive' => 'required',              
        
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
        $parentsinfo->education = $request->education;
        $parentsinfo->occupation = $request->profession;
        $parentsinfo->income_id = $request->income;
        $parentsinfo->mobile = $request->mobile;
        $parentsinfo->email = $request->email;
        $parentsinfo->dob = $request->dob == null ? $request->dob : date('Y-m-d',strtotime($request->dob));
        $parentsinfo->doa = $request->doa == null ? $request->doa : date('Y-m-d',strtotime($request->doa));
        $parentsinfo->organization_address = $request->organization_address;
        $parentsinfo->f_designation = $request->f_designation;
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
        
         $studentParentDetails=StudentPerentDetail::where('perent_info_id',$id)->get();
         foreach ($studentParentDetails as $studentParentDetail) {
                  $studentParentDetail->delete();
         }
         $parents = ParentsInfo::find($id); 
         $parents->delete(); 
         $response=['status'=>1,'msg'=>'Delete Successfully'];
         return response()->json($response);
    }

    
    public function parentAddNew(Request $request)
    {     $user_id=Auth::guard('admin')->user()->id;
          $student=$request->id;
         $parentsType= array_pluck(GuardianRelationType::get(['id','name'])->toArray(),'name', 'id'); 
        $professions = array_pluck(Profession::orderBy('name','ASC')->get(['id','name'])->toArray(),'name', 'id'); 
        $incomes = array_pluck(IncomeRange::orderBy('code','ASC')->get(['id','range'])->toArray(),'range', 'id'); 
        $default = StudentDefaultValue::where('user_id',$user_id)->first(); 
          return view('admin.student.studentdetails.parent.new',compact('student','parentsType','incomes','documentTypes','isoptionals','sessions','subjectTypes','bloodgroups','professions','default'));
        
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
       
         $studentParentDetails=StudentPerentDetail::firstOrNew(['relation_id' => $request->relation_id, 'student_id' => $request->student_id]);
        $studentParentDetails->student_id=$request->student_id; 
        $studentParentDetails->perent_info_id=$request->perent_info_id;
        $studentParentDetails->relation_id=$request->relation_id;
        $studentParentDetails->save();
        $response=['status'=>1,'msg'=>'Created Successfully'];
            return response()->json($response);
          
        
        
    }
}
