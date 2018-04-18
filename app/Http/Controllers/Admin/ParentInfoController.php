<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\ParentsInfo;
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
        return response($img);
                
          

    }

        
  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         
         $validator = Validator::make($request->all(), [
            'name' => 'required',               
        ]);

        if ($validator->passes()) {

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
        return response()->json([$parentsinfo,'message'=>'success','class'=>'success']);
        }

        return response()->json(['message'=>$validator->errors()->all(),'class'=>'error']); 
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
    public function edit(Request $request,ParentsInfo $parentsInfo)
    {
        $parentsInfo = ParentsInfo::where('id', $request->id)->get();
        return response()->json(['parentsInfo'=>$parentsInfo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\ParentsInfo  $parentsInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ParentsInfo $parentsInfo)
    {
       
         $validator = Validator::make($request->all(), [
            'name' => 'required',               
        ]);

        if ($validator->passes()) {

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
        return response()->json([$parentsinfo,'message'=>'success','class'=>'success']);
        }

        return response()->json(['message'=>$validator->errors()->all(),'class'=>'error']); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\ParentsInfo  $parentsInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ParentsInfo $parentsInfo)
    {
         $parents = ParentsInfo::find($request->id);
          

        $parents->delete();

        return response()->json([$parents,'class'=>'success','message'=>'Delete success']);
    }
}
