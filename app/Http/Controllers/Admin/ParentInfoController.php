<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\GuardianRelationType;
use App\Model\IncomeRange;
use App\Model\ParentsInfo;
use App\Model\Profession;
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
          return view('admin.student.studentdetails.include.parents_info_list',compact('student','parentsType','incomes','documentTypes','isoptionals','sessions','subjectTypes','bloodgroups','professions'));
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
}
